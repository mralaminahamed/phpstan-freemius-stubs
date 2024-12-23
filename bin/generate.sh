#!/usr/bin/env bash
#
# Generate Freemius (WordPress SDK) stubs from the source directory.
#

HEADER=$'/**\n * Generated stub declarations for freemius.\n * @see https://freemius.com\n * @see https://github.com/mralaminahamed/phpstan-freemius-stubs\n */'

FILE="freemius-stubs.php"
FILE_CONSTANTS="freemius-constants-stubs.php"

set -e

test -f "$FILE" || touch "$FILE"
test -f "$FILE_CONSTANTS" || touch "$FILE_CONSTANTS"
test -d "source/vendor/freemius/wordpress-sdk"

# Exclude globals, constants.
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

# Exclude functions, classes, interfaces, traits and globals.
"$(dirname "$0")/vendor/bin/generate-stubs" \
    --include-inaccessible-class-nodes \
    --force \
    --finder=finder-constants.php \
    --header="$HEADER" \
    --constants \
    --out="$FILE_CONSTANTS"
