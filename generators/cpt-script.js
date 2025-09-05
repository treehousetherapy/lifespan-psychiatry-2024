#!/usr/bin/env node
/**
 * Custom Post Type Registration Script
 * 
 * Automatically registers all required custom post types for Lifespan Psychiatry
 * Based on Geode Health structure but simplified for a two-provider practice
 */

const fs = require('fs');
const path = require('path');

// Configuration
const cptDefinitions = [
  {
    name: 'service',
    label: 'Service',
    pluralLabel: 'Services',
    description: 'Mental health services offered by Lifespan Psychiatry',
    icon: 'dashicons-heart',
    supports: ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    hasArchive: true,
    taxonomies: ['service_category'],
    menuPosition: 5
  },
  {
    name: 'condition',
    label: 'Condition',
    pluralLabel: 'Conditions',
    description: 'Mental health conditions treated by Lifespan Psychiatry',
    icon: 'dashicons-clipboard',
    supports: ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    hasArchive: true,
    taxonomies: ['condition_category'],
    menuPosition: 6
  },
  {
    name: 'provider',
    label: 'Provider',
    pluralLabel: 'Providers',
    description: 'Healthcare providers at Lifespan Psychiatry',
    icon: 'dashicons-businessperson',
    supports: ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    hasArchive: true,
    taxonomies: ['provider_specialty'],
    menuPosition: 7
  },
  {
    name: 'testimonial',
    label: 'Testimonial',
    pluralLabel: 'Testimonials',
    description: 'Client testimonials for Lifespan Psychiatry',
    icon: 'dashicons-format-quote',
    supports: ['title', 'editor', 'custom-fields'],
    hasArchive: false,
    menuPosition: 8
  },
  {
    name: 'insurance',
    label: 'Insurance',
    pluralLabel: 'Insurance',
    description: 'Insurance plans accepted by Lifespan Psychiatry',
    icon: 'dashicons-money-alt',
    supports: ['title', 'editor', 'thumbnail', 'custom-fields'],
    hasArchive: true,
    menuPosition: 9
  }
];

// Create taxonomy definitions
const taxonomyDefinitions = [
  {
    name: 'service_category',
    label: 'Service Category',
    pluralLabel: 'Service Categories',
    postType: 'service',
    hierarchical: true
  },
  {
    name: 'condition_category',
    label: 'Condition Category',
    pluralLabel: 'Condition Categories',
    postType: 'condition',
    hierarchical: true
  },
  {
    name: 'provider_specialty',
    label: 'Specialty',
    pluralLabel: 'Specialties',
    postType: 'provider',
    hierarchical: true
  }
];

// Path to output file
const themePath = path.join(__dirname, '../wp/wp-content/themes/lifespan-psychiatry-2024');
const cptFilePath = path.join(themePath, 'inc/custom-post-types.php');
const incDir = path.join(themePath, 'inc');

// Ensure the inc directory exists
if (!fs.existsSync(incDir)) {
  fs.mkdirSync(incDir, { recursive: true });
  console.log(`Created directory: ${incDir}`);
}

// Generate CPT registration code
function generateCPTCode() {
  let code = `<?php
/**
 * Custom Post Types for Lifespan Psychiatry
 *
 * This file registers all custom post types needed for the site.
 * Generated automatically by cpt-script.js
 *
 * @package LifespanPsychiatry
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

`;

  // Add CPT registration functions
  cptDefinitions.forEach(cpt => {
    const supportsArray = cpt.supports.map(item => `'${item}'`).join(', ');
    const taxonomiesArray = cpt.taxonomies ? cpt.taxonomies.map(item => `'${item}'`).join(', ') : '';
    
    code += `
/**
 * Register Custom Post Type: ${cpt.label}
 */
function register_${cpt.name}_post_type() {
    $labels = array(
        'name'               => __('${cpt.pluralLabel}', 'lifespan-psychiatry'),
        'singular_name'      => __('${cpt.label}', 'lifespan-psychiatry'),
        'menu_name'          => __('${cpt.pluralLabel}', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New ${cpt.label}', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit ${cpt.label}', 'lifespan-psychiatry'),
        'new_item'           => __('New ${cpt.label}', 'lifespan-psychiatry'),
        'view_item'          => __('View ${cpt.label}', 'lifespan-psychiatry'),
        'search_items'       => __('Search ${cpt.pluralLabel}', 'lifespan-psychiatry'),
        'not_found'          => __('No ${cpt.pluralLabel.toLowerCase()} found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No ${cpt.pluralLabel.toLowerCase()} found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent ${cpt.label}:', 'lifespan-psychiatry'),
        'all_items'          => __('All ${cpt.pluralLabel}', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('${cpt.description}', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => '${cpt.name}'),
        'capability_type'     => 'post',
        'has_archive'         => ${cpt.hasArchive ? 'true' : 'false'},
        'hierarchical'        => false,
        'menu_position'       => ${cpt.menuPosition},
        'supports'            => array(${supportsArray}),
        'menu_icon'           => '${cpt.icon}',
        'show_in_rest'        => true,
        ${cpt.taxonomies ? `'taxonomies'          => array(${taxonomiesArray}),` : ''}
    );

    register_post_type('${cpt.name}', $args);
}
add_action('init', 'register_${cpt.name}_post_type');
`;
  });

  // Add taxonomy registration functions
  taxonomyDefinitions.forEach(tax => {
    code += `
/**
 * Register Taxonomy: ${tax.label}
 */
function register_${tax.name}_taxonomy() {
    $labels = array(
        'name'              => __('${tax.pluralLabel}', 'lifespan-psychiatry'),
        'singular_name'     => __('${tax.label}', 'lifespan-psychiatry'),
        'search_items'      => __('Search ${tax.pluralLabel}', 'lifespan-psychiatry'),
        'all_items'         => __('All ${tax.pluralLabel}', 'lifespan-psychiatry'),
        'parent_item'       => __('Parent ${tax.label}', 'lifespan-psychiatry'),
        'parent_item_colon' => __('Parent ${tax.label}:', 'lifespan-psychiatry'),
        'edit_item'         => __('Edit ${tax.label}', 'lifespan-psychiatry'),
        'update_item'       => __('Update ${tax.label}', 'lifespan-psychiatry'),
        'add_new_item'      => __('Add New ${tax.label}', 'lifespan-psychiatry'),
        'new_item_name'     => __('New ${tax.label} Name', 'lifespan-psychiatry'),
        'menu_name'         => __('${tax.label}', 'lifespan-psychiatry'),
    );

    $args = array(
        'hierarchical'      => ${tax.hierarchical ? 'true' : 'false'},
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => '${tax.name}'),
        'show_in_rest'      => true,
    );

    register_taxonomy('${tax.name}', array('${tax.postType}'), $args);
}
add_action('init', 'register_${tax.name}_taxonomy');
`;
  });

  return code;
}

// Generate and write the PHP code for CPTs
const cptCode = generateCPTCode();
fs.writeFileSync(cptFilePath, cptCode);

console.log(`✅ Generated custom post types file at ${cptFilePath}`);
console.log('\n🔍 Created the following custom post types:');
cptDefinitions.forEach(cpt => {
  console.log(`  - ${cpt.label} (${cpt.name})`);
});

console.log('\n🔍 Created the following taxonomies:');
taxonomyDefinitions.forEach(tax => {
  console.log(`  - ${tax.label} (${tax.name}) for ${tax.postType}`);
});

console.log('\n✨ Custom post types registration complete!');

