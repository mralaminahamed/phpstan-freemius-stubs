#!/usr/bin/env bash
#
# Generate Freemius stubs from all the latest versions.
#

set -e

# Fetch package information from Packagist.
PKG_JSON="$(wget -q -O- "https://packagist.org/packages/freemius/wordpress-sdk.json")"

# Prepare output file.
OUTPUT_FILE="freemius_versions.txt"
> "$OUTPUT_FILE"

# Extract and filter versions, excluding "dev" versions.
VERSIONS=$(jq -r '.package.versions | keys[]' <<<"$PKG_JSON" | grep -v "dev-" | sort -V)

# Collect all versions.
for VERSION in $VERSIONS; do
    echo "$VERSION" >> "$OUTPUT_FILE"
done

# Read the collected versions and process each one.
while IFS= read -r VERSION; do
    echo "Processing version ${VERSION} ..."

    if git rev-parse "refs/tags/v${VERSION}" >/dev/null 2>&1; then
        echo "Tag exists for version ${VERSION}!"
        continue
    fi

    # Clean up source/ directory, keeping composer.json and .gitignore
    find source/ -mindepth 1 ! -name 'composer.json' ! -name '.gitignore' -exec rm -rf {} +

    # Try downloading and processing the version, handle errors
    {
        # Update the version in composer.json
        printf -v SED_EXP 's#\\("freemius/wordpress-sdk"\\): "[0-9]\\+\\.[0-9]\\+\\.[0-9]\\+"#\\1: "%s"#' "${VERSION}"
        sed -i -e "$SED_EXP" source/composer.json

        # Run post-install commands
        composer run-script post-install-cmd

        # Generate stubs
        echo "Generating stubs ..."
        ./generate.sh

        # Add files
        echo "Adding files ..."
        git add .

        # Tag version
        echo "Tagging version ${VERSION} ..."
        git commit --all -m "Generate stubs for Freemius WordPress SDK ${VERSION}"
        git tag "v${VERSION}"
    } || {
        echo "Failed to process version ${VERSION}. Skipping..."
    }

    # Clean up downloaded files to prevent conflicts
    echo "Cleaning up source/ directory ..."
    find source/ -mindepth 1 ! -name 'composer.json' ! -name '.gitignore' -exec rm -rf {} +
done < "$OUTPUT_FILE"

echo "All versions processed."
