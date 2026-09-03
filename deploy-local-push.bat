@echo off
setlocal enabledelayedexpansion

echo.
echo ==========================================================
echo     NAVAGRUHA INFRA -- LOCAL GIT DEPLOY PUSH SCRIPT        
echo ==========================================================
echo.

cd /d "%~dp0"

if not exist ".git" (
    echo  [ERROR] Not a git repository!
    pause
    exit /b 1
)

for /f "tokens=*" %%a in ('git rev-parse --abbrev-ref HEAD') do set BRANCH=%%a
if "%BRANCH%"=="" set BRANCH=main

echo  Active Git Branch : %BRANCH%
echo  Remote Target     : origin/%BRANCH%
echo.

echo --- Current Git Status ---
git status --short
echo --------------------------
echo.

set CHANGES=
for /f "tokens=*" %%a in ('git status --porcelain') do set CHANGES=1
if "%CHANGES%"=="" (
    echo  [INFO] No changes to commit. Working tree is clean.
    pause
    exit /b 0
)

set /p USER_MSG="Enter commit message (or press ENTER for default): "
if "%USER_MSG%"=="" (
    set COMMIT_MSG=Deploy updates: authentic master layout, admin inline status changer, and UI enhancements
) else (
    set COMMIT_MSG=%USER_MSG%
)

echo.
echo  Staging all changes (respecting .gitignore)...
git add -A

echo  Committing changes...
git commit -m "%COMMIT_MSG%"

echo.
echo  Pushing changes to origin/%BRANCH%...
git push origin %BRANCH%

if %ERRORLEVEL% equ 0 (
    echo.
    echo ==========================================================
    echo  [SUCCESS] All changes pushed to GitHub successfully!
    echo ==========================================================
    echo.
    echo  Next step on LIVE SERVER:
    echo  Run: bash deploy-live-pull.sh
    echo.
) else (
    echo.
    echo  [ERROR] Git push failed. Please check error output above.
    echo.
)

pause
