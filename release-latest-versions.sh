#!/usr/bin/env bash
#
# Generate Freemius stubs from all the latest versions.
#

set -e

# Fetch plugin information from Packagist.
PKG_JSON="$(wget -q -O- "https://packagist.org/packages/freemius/wordpress-sdk.json")"

# Versions to process
VERSIONS=(
    2.7
    # Add more versions here if needed
)

# Loop through all specified versions
for V in "${VERSIONS[@]}"; do
    # Find the latest version matching the major.minor pattern
    printf -v JQ_FILTER '.package.versions | keys[] | select(test("^%s\\\\.%s\\\\.\\\\d+$"))' "${V%.*}" "${V#*.}"
    LATEST=$(jq -r "$JQ_FILTER" <<< "$PKG_JSON" | sort -V | tail -n 1)

    if [ -z "$LATEST" ]; then
        echo "No version found for ${V}!"
        continue
    fi

    echo "Releasing version ${LATEST} ..."

    # Check if the tag already exists
    if git rev-parse "refs/tags/v${LATEST}" >/dev/null 2>&1; then
        echo "Tag v${LATEST} already exists!"
        continue
    fi

    # Clean up source/ directory
    git status --ignored --short -- source/ | sed -n -e 's#^!! ##p' | xargs --no-run-if-empty rm -rf

    # Get new version
    composer run-script post-install-cmd

    # Generate stubs
    echo "Generating stubs ..."
    ./generate.sh

    # Check if there are changes to commit
    if [ -n "$(git status --porcelain)" ]; then
        git add .
        git commit -m "Generate stubs for Freemius (WordPress SDK) ${LATEST}"
        git tag "v${LATEST}"
    else
        echo "No changes to commit for version ${LATEST}"
    fi
done

echo "All specified versions processed."
