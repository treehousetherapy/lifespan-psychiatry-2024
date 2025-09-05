#!/usr/bin/env node
/**
 * Custom Post Type Generator
 * 
 * Generates a new custom post type based on configuration
 * Usage: node cpt-generator.js PostTypeName "Post Type Label" "Post Type Description"
 */

const fs = require('fs');
const path = require('path');

// Get post type info from command line
const postTypeName = process.argv[2];
const postTypeLabel = process.argv[3] || postTypeName;
const postTypeDesc = process.argv[4] || `${postTypeLabel} custom post type`;

if (!postTypeName) {
  console.error('Please provide a post type name');
  process.exit(1);
}

// Format post type name
const formattedName = postTypeName.toLowerCase().replace(/\s+/g, '_');
const pluralLabel = `${postTypeLabel}s`; // Simple pluralization, customize as needed

// CPT registration function
const cptFunction = `
/**
 * Register Custom Post Type: ${postTypeLabel}
 */
function register_${formattedName}_post_type() {
    $labels = array(
        'name'               => __('${pluralLabel}', 'lifespan-psychiatry'),
        'singular_name'      => __('${postTypeLabel}', 'lifespan-psychiatry'),
        'menu_name'          => __('${pluralLabel}', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New ${postTypeLabel}', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit ${postTypeLabel}', 'lifespan-psychiatry'),
        'new_item'           => __('New ${postTypeLabel}', 'lifespan-psychiatry'),
        'view_item'          => __('View ${postTypeLabel}', 'lifespan-psychiatry'),
        'search_items'       => __('Search ${pluralLabel}', 'lifespan-psychiatry'),
        'not_found'          => __('No ${pluralLabel} found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No ${pluralLabel} found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent ${postTypeLabel}:', 'lifespan-psychiatry'),
        'all_items'          => __('All ${pluralLabel}', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('${postTypeDesc}', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => '${formattedName}'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-admin-post',
        'show_in_rest'        => true,
    );

    register_post_type('${formattedName}', $args);
}
add_action('init', 'register_${formattedName}_post_type');
`;

// Read the existing file
const cptFilePath = path.join(
  __dirname, 
  '../wp/wp-content/themes/lifespan-psychiatry-2024/inc/custom-post-types.php'
);

// Append the new CPT function
fs.appendFileSync(cptFilePath, cptFunction);
console.log(`✅ Custom Post Type ${postTypeLabel} added to custom-post-types.php`);

// Create template files
const archiveTemplate = `<?php
/**
 * The template for displaying ${pluralLabel} archive
 *
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">${pluralLabel}</h1>
    
    <?php if (have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while (have_posts()) : the_post(); ?>
          <div class="card bg-white rounded-lg shadow-md overflow-hidden">
            <?php if (has_post_thumbnail()) : ?>
              <div class="aspect-w-16 aspect-h-9">
                <?php the_post_thumbnail('medium_large', array('class' => 'object-cover w-full h-full')); ?>
              </div>
            <?php endif; ?>
            <div class="p-6">
              <h2 class="text-xl font-semibold mb-2">
                <a href="<?php the_permalink(); ?>" class="text-primary hover:underline">
                  <?php the_title(); ?>
                </a>
              </h2>
              <div class="text-gray-700 mb-4">
                <?php the_excerpt(); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="inline-block px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark transition">
                Learn More
              </a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      
      <div class="pagination mt-8">
        <?php the_posts_pagination(); ?>
      </div>
    <?php else : ?>
      <p>No ${pluralLabel} found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
`;

const singleTemplate = `<?php
/**
 * The template for displaying single ${postTypeLabel}
 *
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container mx-auto px-4 py-12">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header mb-8">
          <h1 class="text-4xl font-bold"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
          <div class="featured-image mb-8">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content prose max-w-none">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
`;

// Create the template directories if they don't exist
const templatesDir = path.join(__dirname, '../wp/wp-content/themes/lifespan-psychiatry-2024/template-parts', formattedName);
if (!fs.existsSync(templatesDir)) {
  fs.mkdirSync(templatesDir, { recursive: true });
}

// Write the template files
fs.writeFileSync(path.join(templatesDir, 'archive.php'), archiveTemplate);
fs.writeFileSync(path.join(templatesDir, 'single.php'), singleTemplate);

console.log(`✅ Created archive and single templates for ${formattedName}`);
