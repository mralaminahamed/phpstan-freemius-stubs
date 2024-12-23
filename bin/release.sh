#!/usr/bin/env bash

# Script to generate Freemius stubs for all versions and manage git releases
set -euo pipefail

# Constants
PACKAGE_URL="https://packagist.org/packages/freemius/wordpress-sdk.json"
OUTPUT_FILE="freemius_versions.txt"
MAIN_BRANCH="main"

# Functions
log() {
    echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1"
}

error() {
    log "ERROR: $1" >&2
    exit 1
}

cleanup_source() {
    log "Cleaning up source/ directory..."
    find source/ -mindepth 1 ! -name 'composer.json' ! -name '.gitignore' -exec rm -rf {} +
}

update_composer_version() {
    local version=$1
    printf -v SED_EXP 's#\\("freemius/wordpress-sdk"\\): "[0-9]\\+\\.[0-9]\\+\\.[0-9]\\+"#\\1: "%s"#' "${version}"
    sed -i -e "$SED_EXP" source/composer.json
}

process_version() {
    local version=$1

    log "Processing version ${version}..."

    # Check if tag already exists
    if git rev-parse "refs/tags/v${version}" >/dev/null 2>&1; then
        log "Tag exists for version ${version}! Skipping..."
        return 0
    fi

    # Store current branch
    local current_branch=$(git rev-parse --abbrev-ref HEAD)

    # Create and checkout feature branch
    local feature_branch="feature/freemius-${version}"
    log "Creating feature branch: ${feature_branch}"
    git checkout -b "${feature_branch}"

    # Clean up source directory
    cleanup_source

    # Process version
    {
        # Update composer.json version
        update_composer_version "${version}"

        # Install dependencies
        log "Installing Freemius SDK version ${version}..."
        composer --working-dir=source/ require "freemius/wordpress-sdk:${version}"

        # Generate stubs
        log "Generating stubs..."
        ./bin/generate.sh

        # Stage changes
        log "Staging changes..."
        git add .

        # Commit changes
        log "Committing changes..."
        git commit -m "Generate stubs for Freemius WordPress SDK ${version}"

        # Switch to main branch and merge
        log "Switching to ${MAIN_BRANCH} and merging changes..."
        git checkout "${MAIN_BRANCH}"
        git pull origin "${MAIN_BRANCH}"
        git merge --no-ff "${feature_branch}" -m "Merge feature/freemius-${version}"

        # Create and push tag
        log "Creating and pushing tag v${version}..."
        git tag -a "v${version}" -m "Release version ${version}"
        git push origin "${MAIN_BRANCH}" "v${version}"

        # Clean up feature branch
        log "Cleaning up feature branch..."
        git branch -D "${feature_branch}"

        # Clean up downloaded files
        cleanup_source

        return 0
    }

    # If we get here, something failed
    local exit_code=$?
    log "Failed to process version ${version}"
    # Cleanup and return to original branch on failure
    git checkout "${current_branch}"
    git branch -D "${feature_branch}" 2>/dev/null || true
    return ${exit_code}
}

main() {
    # Ensure we're in a git repository
    if ! git rev-parse --git-dir > /dev/null 2>&1; then
        error "Not in a git repository"
    fi

    # Fetch package information from Packagist
    log "Fetching package information..."
    PKG_JSON=$(wget -q -O- "${PACKAGE_URL}" || error "Failed to fetch package information")

    # Prepare output file
    > "${OUTPUT_FILE}"

    # Extract and filter versions
    log "Extracting versions..."
    jq -r '.package.versions | keys[]' <<<"${PKG_JSON}" | grep -v "dev-" | sort -V > "${OUTPUT_FILE}"

    # Process each version
    while IFS= read -r VERSION; do
        process_version "${VERSION}"
    done < "${OUTPUT_FILE}"

    log "All versions processed successfully"
}

# Execute main function
main "$@"
