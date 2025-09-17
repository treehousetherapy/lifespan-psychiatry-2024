@echo off
echo ===================================================
echo Lifespan Psychiatry Theme Setup
echo ===================================================
echo This script will set up the theme with proper build tools
echo and compile the necessary assets.
echo.

cd "%~dp0"

echo Installing NPM dependencies...
call npm install

echo.
echo Building CSS assets...
call npm run build

echo.
echo Creating placeholder directories...
if not exist "assets\images" mkdir "assets\images"

echo.
echo Copying placeholder image...
echo ^<svg xmlns="http://www.w3.org/2000/svg" width="800" height="450" viewBox="0 0 800 450"^>^<rect width="800" height="450" fill="#0055B7" fill-opacity="0.2"/^>^<text x="400" y="225" font-family="Arial" font-size="24" fill="#333" text-anchor="middle"^>Placeholder Image^</text^>^</svg^> > "assets\images\placeholder.svg"

echo.
echo ===================================================
echo Setup complete!
echo ===================================================
echo.
echo Your theme is now ready. Please activate it in WordPress
echo and navigate to Appearance ^> Theme Setup to configure
echo the theme with default pages and content.
echo.

pause



















