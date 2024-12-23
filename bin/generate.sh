#!/usr/bin/env bash
#
# Generate Freemius stubs
# Author: phpstan-freemius-stubs maintainers
# Version: 2.0.0

# Load shared library
# shellcheck source=lib/shared.sh
source "$(dirname "${BASH_SOURCE[0]}")/../lib/shared.sh"

# Generate main stubs
generate_main_stubs() {
    log_message "info" "Generating main stubs..."

    "${GENERATE_STUBS_BIN}" \
        --include-inaccessible-class-nodes \
        --force \
        --finder="${PROJECT_ROOT}/configs/finder.php" \
        --header="${HEADER}" \
        --functions \
        --classes \
        --interfaces \
        --traits \
        --out="${STUBS_FILE}"

    if [[ ! -s "${STUBS_FILE}" ]]; then
        log_message "error" "Generated main stubs file is empty"
        return 1
    fi
}

# Generate constants stubs
generate_constants_stubs() {
    log_message "info" "Generating constants stubs..."

    "${GENERATE_STUBS_BIN}" \
        --include-inaccessible-class-nodes \
        --force \
        --finder="${PROJECT_ROOT}/configs/finder-constants.php" \
        --header="${HEADER}" \
        --constants \
        --out="${CONSTANTS_FILE}"

    if [[ ! -s "${CONSTANTS_FILE}" ]]; then
        log_message "error" "Generated constants stubs file is empty"
        return 1
    fi
}

# Verify generated files
verify_stubs() {
    log_message "info" "Verifying generated stubs..."
    local status=0

    # Verify main stubs file
    if ! php -l "${STUBS_FILE}" > /dev/null 2>&1; then
        log_message "error" "Syntax validation failed for main stubs file"
        status=1
    fi

    # Verify constants file
    if ! php -l "${CONSTANTS_FILE}" > /dev/null 2>&1; then
        log_message "error" "Syntax validation failed for constants stubs file"
        status=1
    fi

    return "${status}"
}

# Main execution
main() {
    log_message "info" "Starting stubs generation..."

    if ! validate_environment; then
        log_message "error" "Environment validation failed"
        exit 1
    fi

    : > "${STUBS_FILE}" || exit 1
    : > "${CONSTANTS_FILE}" || exit 1

    if ! generate_main_stubs; then
        exit 1
    fi

    if ! generate_constants_stubs; then
        exit 1
    fi

    if ! verify_stubs; then
        exit 1
    fi

    log_message "success" "Stubs generation completed successfully"
}

# Error handling
trap 'log_message "error" "An error occurred in $(basename "$0") at line $LINENO"' ERR

# Execute main
main "$@"
