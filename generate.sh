#!/usr/bin/env bash
#
# Generate WooCommerce stubs from the source directory.
#

HEADER=$'/**\n * Generated stub declarations for freemius.\n * @see https://freemius.com\n * @see https://github.com/mralaminahamed/freemius-stubs\n */'

FILE="freemius-stubs.php"

set -e

test -f "$FILE" || touch "$FILE"
test -d "source/vendor/freemius/wordpress-sdk"

# Exclude globals.
"$(dirname "$0")/vendor/bin/generate-stubs" \
    --include-inaccessible-class-nodes \
    --force \
    --finder=finder.php \
    --header="$HEADER" \
    --functions \
    --classes \
    --interfaces \
    --traits \
    --out="$FILE"
