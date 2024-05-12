#!/usr/bin/env bash
#
# Generate Freemius stubs from all the latest versions.
#

# Watch current release on Packagist.
wget -qO- https://packagist.org/packages/freemius/wordpress-sdk.json | jq '.package.versions[] | select(.version_normalized=="4.4.0.0")'

set -e

PKG_JSON="$(wget -q -O- "https://packagist.org/packages/freemius/wordpress-sdk.json")"

# Loop through all versions
for V in                     2.7; do
    # Find latest version
    printf -v JQ_FILTER '."package"."versions"[]."version" | select(test("^%s\\\\.%s\\\\.\\\\d+$"))' "${V%.*}" "${V#*.}"
    LATEST="$(jq -r "$JQ_FILTER" <<<"$PKG_JSON" | sort -t "." -k 3 -g | tail -n 1)"
    if [ -z "$LATEST" ]; then
        echo "No version for ${V}!"
        continue
    fi

    echo "Releasing version ${LATEST} ..."

    if git rev-parse "refs/tags/v${LATEST}" >/dev/null 2>&1; then
        echo "Tag exists!"
        continue
    fi

    # Clean up source/ directory
    git status --ignored --short -- source/ | sed -n -e 's#^!! ##p' | xargs --no-run-if-empty -- rm -rf
    # Get new version
    composer run-script post-install-cmd

    # Generate stubs
    echo "Generating stubs ..."
    ./generate.sh

    # Tag version
    git commit --all -m "Generate stubs for Freemius (WordPress SDK) ${LATEST}"
    git tag "v${LATEST}"
done
