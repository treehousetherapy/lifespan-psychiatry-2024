#!/usr/bin/env node
/**
 * ACF Fields Generator
 * 
 * Automatically generates ACF field groups for all custom post types
 * Based on Geode Health structure but simplified for a two-provider practice
 */

const fs = require('fs');
const path = require('path');
const fieldDefinitions = require('./acf-field-definitions.js');

// Path to output file
const themePath = path.join(__dirname, '../wp/wp-content/themes/lifespan-psychiatry-2024');
const acfFilePath = path.join(themePath, 'inc/custom-fields.php');
const incDir = path.join(themePath, 'inc');

// Ensure the inc directory exists
if (!fs.existsSync(incDir)) {
  fs.mkdirSync(incDir, { recursive: true });
  console.log(`Created directory: ${incDir}`);
}

// Generate ACF registration code
function generateACFCode() {
  let code = `<?php
/**
 * Custom Fields for Lifespan Psychiatry
 *
 * This file registers all ACF field groups needed for the site.
 * Generated automatically by acf-generator.js
 *
 * @package LifespanPsychiatry
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register options page for site settings
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Site Options',
        'menu_title' => 'Site Options',
        'menu_slug'  => 'site-options',
        'capability' => 'manage_options',
        'position'   => '60',
        'icon_url'   => 'dashicons-admin-settings',
        'redirect'   => false
    ));
}

`;

  // Generate field group registration code
  fieldDefinitions.fieldGroups.forEach(group => {
    code += `
/**
 * Register Field Group: ${group.title}
 */
function register_${group.name}_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_${group.name}',
            'title' => '${group.title}',
            'fields' => array(
`;
    
    // Add fields to the group
    group.fields.forEach(field => {
      code += `                array(
                    'key' => 'field_${group.name}_${field.name}',
                    'label' => '${field.label}',
                    'name' => '${field.name}',
                    'type' => '${field.type}',
                    'instructions' => '${field.instructions || ''}',
`;
      
      // Add field-specific settings
      if (field.type === 'relationship') {
        code += `                    'post_type' => ${JSON.stringify(field.post_type)},
                    'return_format' => 'object',
`;
      }
      
      if (field.type === 'taxonomy') {
        code += `                    'taxonomy' => '${field.taxonomy}',
                    'field_type' => 'multi_select',
                    'return_format' => 'object',
`;
      }
      
      if (field.type === 'repeater') {
        code += `                    'layout' => 'block',
                    'sub_fields' => array(
`;
        
        // Add sub fields to repeater
        field.sub_fields.forEach(subField => {
          code += `                        array(
                            'key' => 'field_${group.name}_${field.name}_${subField.name}',
                            'label' => '${subField.label}',
                            'name' => '${subField.name}',
                            'type' => '${subField.type}',
`;
          
          // Add choices for select fields
          if (subField.type === 'select' && subField.choices) {
            code += `                            'choices' => array(
`;
            
            for (const [value, label] of Object.entries(subField.choices)) {
              code += `                                '${value}' => '${label}',
`;
            }
            
            code += `                            ),
`;
          }
          
          code += `                        ),
`;
        });
        
        code += `                    ),
`;
      }
      
      if (field.type === 'group') {
        code += `                    'layout' => 'block',
                    'sub_fields' => array(
`;
        
        // Add sub fields to group
        field.sub_fields.forEach(subField => {
          code += `                        array(
                            'key' => 'field_${group.name}_${field.name}_${subField.name}',
                            'label' => '${subField.label}',
                            'name' => '${subField.name}',
                            'type' => '${subField.type}',
`;
          
          // Add default value if specified
          if (subField.default_value) {
            if (typeof subField.default_value === 'string') {
              code += `                            'default_value' => '${subField.default_value.replace(/'/g, "\\'")}',
`;
            } else {
              code += `                            'default_value' => ${JSON.stringify(subField.default_value)},
`;
            }
          }
          
          code += `                        ),
`;
        });
        
        code += `                    ),
`;
      }
      
      // Add default value if specified
      if (field.default_value) {
        if (typeof field.default_value === 'string') {
          code += `                    'default_value' => '${field.default_value.replace(/'/g, "\\'")}',
`;
        } else {
          code += `                    'default_value' => ${JSON.stringify(field.default_value)},
`;
        }
      }
      
      // Add min/max values for number fields
      if (field.type === 'number') {
        if (field.min !== undefined) {
          code += `                    'min' => ${field.min},
`;
        }
        if (field.max !== undefined) {
          code += `                    'max' => ${field.max},
`;
        }
      }
      
      code += `                ),
`;
    });
    
    // Add location rules
    code += `            ),
            'location' => array(
`;
    
    group.location.forEach(andRule => {
      code += `                array(
`;
      
      andRule.forEach(rule => {
        code += `                    array(
                        'param' => '${rule.param}',
                        'operator' => '${rule.operator}',
                        'value' => '${rule.value}',
                    ),
`;
      });
      
      code += `                ),
`;
    });
    
    code += `            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => true,
        ));
    }
}
add_action('acf/init', 'register_${group.name}_fields');
`;
  });

  return code;
}

// Generate and write the PHP code for ACF field groups
const acfCode = generateACFCode();
fs.writeFileSync(acfFilePath, acfCode);

console.log(`✅ Generated ACF field groups file at ${acfFilePath}`);
console.log('\n🔍 Created field groups for:');
fieldDefinitions.fieldGroups.forEach(group => {
  console.log(`  - ${group.title} (${group.fields.length} fields)`);
});

console.log('\n✨ ACF field groups registration complete!');