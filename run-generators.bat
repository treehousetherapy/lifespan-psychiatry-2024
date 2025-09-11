@echo off
echo ===================================================
echo Lifespan Psychiatry Site Generator Master Script
echo ===================================================
echo This script will run all generators in sequence to set up the complete site.
echo.

cd C:/Users/treeh/lifespan-psychiatry

echo.
echo ===================================================
echo Step 1: Running CPT Generator to create custom post types
echo ===================================================
echo.
node generators/cpt-script.js

echo.
echo ===================================================
echo Step 2: Running ACF Generator to create custom fields
echo ===================================================
echo.
node generators/acf-generator.js

echo.
echo ===================================================
echo Step 3: Running Content Importer to create demo content
echo ===================================================
echo.
node generators/content-importer.js

echo.
echo ===================================================
echo Step 4: Generating site components and pages
echo ===================================================
echo.
call generate-site.bat

echo.
echo ===================================================
echo All generators have been run successfully!
echo The website structure is now complete.
echo ===================================================

pause











