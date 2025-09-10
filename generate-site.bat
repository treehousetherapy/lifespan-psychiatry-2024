@echo off
echo ===================================================
echo Lifespan Psychiatry Site Generator
echo ===================================================
echo This script will generate all components and pages needed
echo for the Lifespan Psychiatry website based on Geode Health design.
echo.

cd C:/Users/treeh/lifespan-psychiatry

echo.
echo ===================================================
echo Generating Core Components...
echo ===================================================
echo.

call node generators/component-generator.js Hero
call node generators/component-generator.js TrustStrip
call node generators/component-generator.js ServiceCard
call node generators/component-generator.js ConditionCard
call node generators/component-generator.js ProviderCard
call node generators/component-generator.js Testimonial
call node generators/component-generator.js CtaSection
call node generators/component-generator.js CrisisInfo
call node generators/component-generator.js InsuranceStrip
call node generators/component-generator.js Button
call node generators/component-generator.js Navigation

echo.
echo ===================================================
echo Generating Condition Pages...
echo ===================================================
echo.

call node generators/page-generator.js "Depression" condition
call node generators/page-generator.js "Anxiety" condition
call node generators/page-generator.js "ADHD" condition
call node generators/page-generator.js "Trauma" condition
call node generators/page-generator.js "Disordered Eating" condition
call node generators/page-generator.js "Addiction" condition

echo.
echo ===================================================
echo Generating Service Pages...
echo ===================================================
echo.

call node generators/page-generator.js "Talk Therapy" service
call node generators/page-generator.js "Psychiatry" service
call node generators/page-generator.js "Medication Management" service

echo.
echo ===================================================
echo Generating Standard Pages...
echo ===================================================
echo.

call node generators/page-generator.js "Home"
call node generators/page-generator.js "About"
call node generators/page-generator.js "Contact"
call node generators/page-generator.js "Insurance"
call node generators/page-generator.js "Location"
call node generators/page-generator.js "Resources"
call node generators/page-generator.js "For Clinicians"

echo.
echo ===================================================
echo Site generation complete!
echo All components and pages have been created.
echo ===================================================

pause








