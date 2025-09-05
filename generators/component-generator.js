#!/usr/bin/env node
/**
 * Component Generator
 * 
 * Generates a new component from templates based on Geode Health design system
 * Usage: node component-generator.js ComponentName
 */

const fs = require('fs');
const path = require('path');

// Get component name from command line
const componentName = process.argv[2];

if (!componentName) {
  console.error('Please provide a component name');
  process.exit(1);
}

// Format component name
const formattedName = componentName.charAt(0).toLowerCase() + componentName.slice(1);
const className = `component-${formattedName}`;

// Component template
const componentTemplate = `<?php
/**
 * Component: ${componentName}
 * 
 * @package LifespanPsychiatry
 */

// Extract parameters with defaults
$title = $args['title'] ?? '';
$content = $args['content'] ?? '';
?>

<div class="${className}">
  <?php if ($title): ?>
    <h2 class="component-title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>
  
  <?php if ($content): ?>
    <div class="component-content">
      <?php echo wp_kses_post($content); ?>
    </div>
  <?php endif; ?>
</div>
`;

// Create the component file
const componentPath = path.join(
  __dirname, 
  '../wp/wp-content/themes/lifespan-psychiatry-2024/template-parts/components', 
  `${formattedName}.php`
);

fs.writeFileSync(componentPath, componentTemplate);
console.log(`✅ Component ${componentName} created at ${componentPath}`);
