#!/usr/bin/env bash
#
# Shared library for Freemius stubs scripts
# Author: phpstan-freemius-stubs maintainers
# Version: 2.0.0

# Strict mode
set -euo pipefail

# Base constants
readonly SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
readonly PROJECT_ROOT="$(cd "${SCRIPT_DIR}/.." && pwd)"

# Shared file paths
readonly SOURCE_DIR="${PROJECT_ROOT}/source/vendor/freemius/wordpress-sdk"
readonly STUBS_FILE="${PROJECT_ROOT}/freemius-stubs.stub"
readonly CONSTANTS_FILE="${PROJECT_ROOT}/freemius-constants-stubs.stub"
readonly GENERATE_STUBS_BIN="${PROJECT_ROOT}/vendor/bin/generate-stubs"
readonly VERSIONS_FILE="${PROJECT_ROOT}/freemius_versions.txt"
readonly PACKAGIST_URL="https://packagist.org/packages/freemius/wordpress-sdk.json"

# File header
readonly HEADER=$'/**\n * Generated stub declarations for freemius.\n * @see https://freemius.com\n * @see https://github.com/mralaminahamed/phpstan-freemius-stubs\n */'

# Logging function
log_message() {
    local severity="$1"
    local message="$2"
    echo "[$(date +'%Y-%m-%d %H:%M:%S')] [${severity^^}] ${message}" >&2
}

# Function to validate environment
validate_environment() {
    local missing_requirements=0

    # Check for required commands
    for cmd in git jq wget composer php; do
        if ! command -v "$cmd" >/dev/null 2>&1; then
            log_message "error" "Required command not found: $cmd"
            missing_requirements=1
        fi
    done

    # Check source directory
    if [[ ! -d "${SOURCE_DIR}" ]]; then
        log_message "error" "Source directory not found: ${SOURCE_DIR}"
        missing_requirements=1
    fi

    # Check stub generator
    if [[ ! -x "${GENERATE_STUBS_BIN}" ]]; then
        log_message "error" "Stub generator not found or not executable"
        missing_requirements=1
    fi

    return "${missing_requirements}"
}

# Function to cleanup source directory
cleanup_source() {
    log_message "info" "Cleaning up source directory..."
    find "${SOURCE_DIR}" -mindepth 1 ! -name 'composer.json' ! -name '.gitignore' -exec rm -rf {} +
}

# Function to fetch available versions
fetch_versions() {
    log_message "info" "Fetching package versions..."
    local pkg_json

    if ! pkg_json=$(wget -q -O- "${PACKAGIST_URL}"); then
        log_message "error" "Failed to fetch package information"
        return 1
    fi

    # Extract and filter versions
    > "${VERSIONS_FILE}"
    if ! jq -r '.package.versions | keys[]' <<<"${pkg_json}" | grep -v "dev-" | sort -V > "${VERSIONS_FILE}"; then
        log_message "error" "Failed to extract versions"
        return 1
    fi

    if [[ ! -s "${VERSIONS_FILE}" ]]; then
        log_message "error" "No versions found"
        return 1
    fi
}
