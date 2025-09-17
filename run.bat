@echo off
echo Starting LifespanPsychiatryMN.com setup...

REM Check for Node.js
where node >nul 2>nul
if %ERRORLEVEL% neq 0 (
  echo Node.js is required but not installed.
  echo Please install Node.js from https://nodejs.org/
  exit /b 1
)

echo Running project initialization script...
node C:/Users/treeh/lifespan-psychiatry/init-project.js

if %ERRORLEVEL% neq 0 (
  echo Error running initialization script.
  exit /b 1
)

echo Installing dependencies...
cd C:/Users/treeh/lifespan-psychiatry
call npm install

if %ERRORLEVEL% neq 0 (
  echo Error installing dependencies.
  exit /b 1
)

echo.
echo Setup complete! You can now run development server with:
echo cd C:/Users/treeh/lifespan-psychiatry
echo npm run dev
echo.

echo Press any key to exit...
pause >nul




















