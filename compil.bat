@echo off
setlocal

echo ==============================
echo Building PHP project (Windows)
echo ==============================

REM Composer: install dependencies if available
where composer >nul 2>&1
if ERRORLEVEL 1 (
  echo Composer not found in PATH. Skipping composer install.
) else (
  composer install --no-interaction --no-progress
  composer dump-autoload -o
)

REM PHPUnit: run tests if available
if exist vendor\bin\phpunit (
  echo Running vendor\bin\phpunit...
  vendor\bin\phpunit --colors=always
) else (
  where phpunit >nul 2>&1
  if ERRORLEVEL 0 (
    echo Running phpunit from PATH...
    phpunit --colors=always
  ) else (
    echo PHPUnit not found. Skipping tests.
  )
)

echo Build finished.
endlocal
pause
