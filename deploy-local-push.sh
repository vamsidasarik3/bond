#!/usr/bin/env bash
# ==============================================================================
# Navagruha Infra Developers — Local Push Script (Git Bash / Linux / macOS)
# ==============================================================================
set -e

# Change to repository root
cd "$(dirname "$0")"

echo ""
echo "=========================================================="
echo "    NAVAGRUHA INFRA — LOCAL GIT DEPLOY PUSH SCRIPT        "
echo "=========================================================="
echo ""

# Verify git repository
if [ ! -d ".git" ]; then
    echo " [ERROR] Not a git repository! Run this script from the project root."
    exit 1
fi

# Detect current branch (default to main)
BRANCH=$(git rev-parse --abbrev-ref HEAD)
if [ -z "$BRANCH" ]; then
    BRANCH="main"
fi

echo " Active Git Branch : $BRANCH"
echo " Remote Target     : origin/$BRANCH"
echo ""

# Show current status
echo "--- Current Git Status ---"
git status --short
echo "--------------------------"
echo ""

# Check if there are any changes
if [ -z "$(git status --porcelain)" ]; then
    echo " [INFO] No changes to commit. Working tree is clean."
    exit 0
fi

# Prompt for commit message
DEFAULT_MSG="Deploy updates: authentic master layout, admin inline status changer, and UI enhancements ($(date '+%Y-%m-%d %H:%M'))"
echo "Enter commit message (or press ENTER to use default):"
echo "Default: \"$DEFAULT_MSG\""
read -r USER_MSG

if [ -z "$USER_MSG" ]; then
    COMMIT_MSG="$DEFAULT_MSG"
else
    COMMIT_MSG="$USER_MSG"
fi

echo ""
echo " Staging all changes (respecting .gitignore)..."
git add -A

echo " Committing changes..."
git commit -m "$COMMIT_MSG"

echo ""
echo " Pushing changes to origin/$BRANCH..."
git push origin "$BRANCH"

echo ""
echo "=========================================================="
echo " [SUCCESS] All changes pushed to GitHub successfully!    "
echo " Commit Hash : $(git rev-parse --short HEAD)              "
echo " Branch      : $BRANCH                                    "
echo "=========================================================="
echo ""
echo " Next step on LIVE SERVER:"
echo " Run: bash deploy-live-pull.sh"
echo ""
