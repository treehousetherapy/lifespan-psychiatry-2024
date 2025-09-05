#!/usr/bin/env node
/**
 * Page Template Generator
 * 
 * Generates a new page template based on Geode Health design system
 * Usage: node page-generator.js PageName
 */

const fs = require('fs');
const path = require('path');

// Get page name from command line
const pageName = process.argv[2];

if (!pageName) {
  console.error('Please provide a page name');
  process.exit(1);
}

// Format page name
const formattedName = pageName.toLowerCase().replace(/\s+/g, '-');
const pageTitle = pageName
  .replace(/-/g, ' ')
  .replace(/\b\w/g, c => c.toUpperCase());

// Page template
const pageTemplate = `<?php
/**
 * Template Name: ${pageTitle} Page
 * 
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">${pageTitle}</h1>
    
    <!-- Page content will be populated here -->
    <div class="page-content">
      <?php the_content(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
`;

// Create the page template file
const templatePath = path.join(
  __dirname, 
  '../wp/wp-content/themes/lifespan-psychiatry-2024/page-templates', 
  `page-${formattedName}.php`
);

fs.writeFileSync(templatePath, pageTemplate);
console.log(`✅ Page template ${pageTitle} created at ${templatePath}`);

