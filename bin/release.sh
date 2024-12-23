#!/usr/bin/env bash
#
# Release Freemius stubs
# Author: phpstan-freemius-stubs maintainers
# Version: 2.0.0

# Load shared library
# shellcheck source=lib/shared.sh
source "$(dirname "${BASH_SOURCE[0]}")/../lib/shared.sh"

# Update composer version
update_composer_version() {
    local version="$1"
    local composer_file="${SOURCE_DIR}/composer.json"

    log_message "info" "Updating composer.json to version ${version}"
    printf -v SED_EXP 's#\\("freemius/wordpress-sdk"\\): "[0-9]\\+\\.[0-9]\\+\\.[0-9]\\+"#\\1: "%s"#' "${version}"
    sed -i -e "$SED_EXP" "${composer_file}"
}

# Process single version
process_version() {
    local version="$1"
    local current_branch feature_branch exit_code=0

    log_message "info" "Processing version ${version}..."

    # Check if tag exists
    if git rev-parse "refs/tags/v${version}" >/dev/null 2>&1; then
        log_message "info" "Tag exists for version ${version}! Skipping..."
        return 0
    fi

    # Store current branch
    current_branch=$(git rev-parse --abbrev-ref HEAD)
    feature_branch="feature/freemius-${version}"

    # Create feature branch
    git checkout -b "${feature_branch}"

    {
        cleanup_source
        update_composer_version "${version}"
        composer --working-dir=source/ require "freemius/wordpress-sdk:${version}"
        "bash ./generate.sh"

        # Git operations
        git add .
        git commit -m "Generate stubs for Freemius WordPress SDK ${version}"
        git checkout "main"
        git pull origin "main" --force
        git merge --no-ff "${feature_branch}" -m "Merge feature/freemius-${version}"
        git tag -a "v${version}" -m "Release version ${version}"
        git push origin "main" "v${version}"
        git branch -D "${feature_branch}"

        cleanup_source
    } || {
        exit_code=$?
        log_message "error" "Failed to process version ${version}"
        git checkout "${current_branch}"
        git branch -D "${feature_branch}" 2>/dev/null || true
    }

    return "${exit_code}"
}

# Main execution
main() {
    log_message "info" "Starting release process..."
    local failed_versions=()

    if ! validate_environment; then
        log_message "error" "Environment validation failed"
        exit 1
    fi

    if ! fetch_versions; then
        exit 1
    fi

    while IFS= read -r version; do
        if ! process_version "${version}"; then
            failed_versions+=("${version}")
        fi
    done < "${VERSIONS_FILE}"

    if ((${#failed_versions[@]} > 0)); then
        log_message "error" "Failed versions: ${failed_versions[*]}"
        exit 1
    fi

    log_message "success" "Release process completed successfully"
}

# Error handling
trap 'log_message "error" "An error occurred in $(basename "$0") at line $LINENO"' ERR

# Execute main
main "$@"
