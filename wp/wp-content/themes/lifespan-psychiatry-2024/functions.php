<?php
/**
 * Lifespan Psychiatry Theme functions and definitions
 */

// Define constants
define('LIFESPAN_VERSION', '1.0.0');
define('LIFESPAN_THEME_DIR', get_stylesheet_directory());
define('LIFESPAN_THEME_URI', get_stylesheet_directory_uri());

/**
 * Theme setup
 */
function lifespan_psychiatry_setup() {
    // Add theme support for automatic feed links
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'lifespan-psychiatry'),
        'footer'  => esc_html__('Footer Menu', 'lifespan-psychiatry'),
    ));

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'lifespan_psychiatry_setup');

/**
 * Enqueue styles and scripts
 */
function lifespan_enqueue_assets() {
    // Enqueue Google Fonts
    wp_enqueue_style('lifespan-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap', array(), null);
    
    // Enqueue compiled Tailwind CSS
    $style_path = get_template_directory() . '/assets/css/style.css';
    if (file_exists($style_path)) {
        wp_enqueue_style('lifespan-tailwind', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime($style_path));
    }
    
    // Enqueue Alpine.js for interactivity
    wp_enqueue_script('alpinejs', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', array(), '3.13.0', false);
    wp_script_add_data('alpinejs', 'defer', true);
}
add_action('wp_enqueue_scripts', 'lifespan_enqueue_assets');

/**
 * Add preconnect for Google Fonts
 */
function lifespan_psychiatry_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'lifespan_psychiatry_preconnect', 1);

/**
 * Add basic Tailwind styles for the theme
 */
function lifespan_add_inline_styles() {
    echo '<style>
        /* Basic Tailwind Utility Classes */
        .container { width: 100%; margin-right: auto; margin-left: auto; padding-right: 1rem; padding-left: 1rem; }
        @media (min-width: 640px) { .container { max-width: 640px; } }
        @media (min-width: 768px) { .container { max-width: 768px; } }
        @media (min-width: 1024px) { .container { max-width: 1024px; } }
        @media (min-width: 1280px) { .container { max-width: 1280px; } }
        
        .mx-auto { margin-left: auto; margin-right: auto; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
        .py-16 { padding-top: 4rem; padding-bottom: 4rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mb-12 { margin-bottom: 3rem; }
        .mt-12 { margin-top: 3rem; }
        .pt-8 { padding-top: 2rem; }
        .max-w-2xl { max-width: 42rem; }
        .max-w-3xl { max-width: 48rem; }
        .max-w-md { max-width: 28rem; }
        
        .text-center { text-align: center; }
        .text-white { color: white; }
        .text-primary { color: #0055B7; }
        .bg-primary { background-color: #0055B7; }
        .bg-white { background-color: white; }
        .bg-gray-100 { background-color: #f3f4f6; }
        
        .grid { display: grid; }
        .gap-4 { gap: 1rem; }
        .gap-8 { gap: 2rem; }
        @media (min-width: 768px) {
            .md\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        }
        .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
        
        .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
        .text-2xl { font-size: 1.5rem; line-height: 2rem; }
        .text-3xl { font-size: 1.875rem; line-height: 2.25rem; }
        .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
        @media (min-width: 768px) {
            .md\\:text-5xl { font-size: 3rem; line-height: 1; }
        }
        
        .font-medium { font-weight: 500; }
        .font-semibold { font-weight: 600; }
        .font-bold { font-weight: 700; }
        
        .rounded-md { border-radius: 0.375rem; }
        .rounded-lg { border-radius: 0.5rem; }
        .shadow-md { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        
        .inline-block { display: inline-block; }
        .p-8 { padding: 2rem; }
        .hover\\:underline:hover { text-decoration: underline; }
        .hover\\:bg-gray-100:hover { background-color: #f3f4f6; }
        .transition { transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        
        .flex { display: flex; }
        .flex-wrap { flex-wrap: wrap; }
        .border-t { border-top-width: 1px; }
        .border-white { border-color: white; }
        .border-opacity-30 { border-opacity: 0.3; }
    </style>';
}
add_action('wp_head', 'lifespan_add_inline_styles');

/**
 * Create a home page on theme activation
 */
function lifespan_create_home_page() {
    // Check if the home page exists
    $home = get_page_by_path('home');
    
    if (!$home) {
        // Create home page
        $home_id = wp_insert_post(array(
            'post_title' => 'Home',
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
        ));
        
        // Set as front page
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_id);
    } else {
        // Set existing home page as front page
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home->ID);
    }
}
add_action('after_switch_theme', 'lifespan_create_home_page');

/**
 * Include custom functionality
 */
// Load theme setup automation
require_once LIFESPAN_THEME_DIR . '/setup-theme.php';

/**
 * Add theme setup admin page
 */
function lifespan_add_setup_menu() {
    add_theme_page(
        'Lifespan Theme Setup',
        'Theme Setup',
        'manage_options',
        'lifespan-theme-setup',
        'lifespan_theme_setup_page'
    );
}
add_action('admin_menu', 'lifespan_add_setup_menu');

// Load custom functionality if files exist
$inc_files = array(
    '/inc/custom-post-types.php',
    '/inc/custom-fields.php',
    '/inc/template-functions.php',
    '/inc/plugin-activator.php',
    '/inc/theme-setup.php'
);

foreach ($inc_files as $file) {
    if (file_exists(LIFESPAN_THEME_DIR . $file)) {
        require_once LIFESPAN_THEME_DIR . $file;
    }
}

// Force setup to run on next page load
delete_option('lifespan_setup_complete');

// Direct setup function that runs on theme load
function lifespan_force_setup() {
    // Only run once per page load to prevent recursion
    static $has_run = false;
    if ($has_run) return;
    $has_run = true;
    
    if (function_exists('lifespan_setup_theme')) {
        lifespan_setup_theme();
    }
    
    // Flush rewrite rules to ensure proper permalinks
    flush_rewrite_rules();
}

// Run the setup on every page load until it works
add_action('wp_loaded', 'lifespan_force_setup');

// Also try to run in admin context
add_action('admin_init', 'lifespan_force_setup');