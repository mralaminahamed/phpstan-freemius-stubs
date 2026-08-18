#!/usr/bin/env bash
#
# Release stubs for every upstream version newer than this repository's newest
# tag, for packages whose source comes from Packagist rather than
# WordPress.org.
#
# Forward-only by design: versions at or below the newest existing tag are
# history we deliberately leave alone, so a run can never insert an older
# release on top of the current one, and a repository that has fallen behind
# does not suddenly publish its entire back catalogue.
#
# Nothing is pushed here. The release workflow pushes what this produces.

set -euo pipefail

# --- per-repository configuration -------------------------------------------
PACKAGE="freemius/wordpress-sdk"
DISPLAY_NAME="Freemius"
VERSIONS_FILE_NAME="freemius_versions.txt"
# ----------------------------------------------------------------------------

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
ROOT_DIR="$(dirname "$SCRIPT_DIR")"
SOURCE_DIR="$ROOT_DIR/source"
GENERATE_SCRIPT="$SCRIPT_DIR/generate.sh"
VERSIONS_FILE="$ROOT_DIR/$VERSIONS_FILE_NAME"

log()  { echo "==> $*"; }
step() { echo "  - $*"; }
fail() { echo "ERROR: $*" >&2; exit 1; }

for cmd in curl jq git composer; do
    command -v "$cmd" >/dev/null 2>&1 || fail "required command not found: $cmd"
done
[[ -f "$GENERATE_SCRIPT" ]] || fail "generate script not found: $GENERATE_SCRIPT"
[[ -f "$SOURCE_DIR/composer.json" ]] || fail "no source/composer.json in $ROOT_DIR"

log "Fetching $DISPLAY_NAME versions from Packagist..."
API_JSON="$(curl -sf "https://repo.packagist.org/p2/${PACKAGE}.json")" \
    || fail "could not reach the Packagist API"

# Stable releases only.
ALL_VERSIONS="$(jq -r '.packages[][].version' <<<"$API_JSON" \
    | sed 's/^v//' \
    | grep -E '^[0-9]' \
    | grep -viE '(alpha|beta|-rc|_rc|\.rc|dev)' \
    | sort -V)"
[[ -n "$ALL_VERSIONS" ]] || fail "no versions returned for $PACKAGE"

printf '%s\n' "$ALL_VERSIONS" > "$VERSIONS_FILE"

# Forward-only: keep just what sorts strictly above the newest existing tag.
LATEST_TAG="$(git -C "$ROOT_DIR" tag --list 'v*' | sed 's/^v//' \
    | grep -E '^[0-9]' | sort -V | tail -1 || true)"
if [[ -n "$LATEST_TAG" ]]; then
    log "Newest existing tag: v$LATEST_TAG"
    ALL_VERSIONS="$(while IFS= read -r v; do
        if [[ "$v" != "$LATEST_TAG" ]] &&
           [[ "$(printf '%s\n%s\n' "$LATEST_TAG" "$v" | sort -V | tail -1)" == "$v" ]]; then
            echo "$v"
        fi
    done <<<"$ALL_VERSIONS" || true)"
else
    log "No tags yet; releasing the newest upstream version only."
    ALL_VERSIONS="$(tail -1 <<<"$ALL_VERSIONS")"
fi

PENDING="$(grep -v '^$' <<<"$ALL_VERSIONS" || true)"
if [[ -z "$PENDING" ]]; then
    log "Already up to date, nothing to release."
    exit 0
fi

TOTAL="$(grep -c '' <<<"$PENDING")"
log "$TOTAL version(s) to release: $(tr '\n' ' ' <<<"$PENDING")"

RELEASED=0
SKIPPED=0
N=0
while IFS= read -r VERSION; do
    N=$((N + 1))
    log "[$N/$TOTAL] $DISPLAY_NAME $VERSION"

    # Repin the source package, then let Composer fetch it into source/vendor/.
    step "pinning $PACKAGE to $VERSION..."
    jq --arg pkg "$PACKAGE" --arg ver "$VERSION" '.require[$pkg] = $ver' \
        "$SOURCE_DIR/composer.json" > "$SOURCE_DIR/composer.json.tmp" \
        && mv "$SOURCE_DIR/composer.json.tmp" "$SOURCE_DIR/composer.json"

    if ! composer --working-dir="$SOURCE_DIR" update --no-interaction \
        --no-progress --ignore-platform-reqs >/dev/null 2>&1; then
        step "Composer could not resolve $VERSION, skipping"
        SKIPPED=$((SKIPPED + 1))
        continue
    fi

    # The finder configs use paths relative to the repository root.
    step "generating stubs..."
    if ! (cd "$ROOT_DIR" && bash "$GENERATE_SCRIPT"); then
        step "stub generation failed, skipping"
        SKIPPED=$((SKIPPED + 1))
        continue
    fi

    # source/composer.json carries the pin and belongs in the commit. Naming
    # source/vendor or source/composer.lock in an exclude pathspec would fail --
    # both are already covered by source/.gitignore.
    git -C "$ROOT_DIR" add -A -- . || fail "git add failed"

    if git -C "$ROOT_DIR" diff --cached --quiet; then
        step "identical to the previous version, no tag"
    else
        git -C "$ROOT_DIR" commit -q -m "Generate stubs for $DISPLAY_NAME $VERSION"
        git -C "$ROOT_DIR" tag "v${VERSION}"
        step "tagged v${VERSION}"
        RELEASED=$((RELEASED + 1))
    fi
done <<<"$PENDING"

log "Done: $RELEASED released, $SKIPPED skipped."
