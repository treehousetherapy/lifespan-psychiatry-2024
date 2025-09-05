<?php
/**
 * Lifespan Psychiatry Theme Setup Script
 *
 * This file contains functions to automatically set up the theme with proper pages,
 * navigation, and initial content - based on the Treehouse Therapy implementation.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main setup function - creates all necessary pages and sets theme options
 */
function lifespan_setup_theme() {
    // Only run once to prevent duplicate content
    if (get_option('lifespan_setup_complete')) {
        return;
    }
    
    echo '<div class="wrap"><h1>Setting up Lifespan Psychiatry Theme...</h1>';
    
    // Create main pages
    lifespan_create_pages();
    
    // Set up navigation menus
    lifespan_setup_navigation();
    
    // Configure theme settings
    lifespan_configure_theme();
    
    // Mark setup as complete
    update_option('lifespan_setup_complete', true);
    
    echo '<p>Theme setup complete! Refresh the page to see your new site.</p></div>';
}

/**
 * Create all necessary pages for the site
 */
function lifespan_create_pages() {
    echo '<h2>Creating Pages...</h2>';
    
    // Define the pages to create with their content, template, and menu position
    $pages = array(
        'home' => array(
            'title' => 'Home',
            'template' => 'front-page.php',
            'content' => '',
            'menu_position' => 1,
            'parent' => 0,
            'is_home' => true
        ),
        'what-we-treat' => array(
            'title' => 'What We Treat',
            'template' => '',
            'content' => '<h1>What We Treat</h1><p>Lifespan Psychiatry provides expert treatment for a range of mental health conditions.</p>',
            'menu_position' => 2,
            'parent' => 0,
        ),
        'depression' => array(
            'title' => 'Depression & Mood',
            'template' => 'page-templates/condition-depression.php',
            'content' => '',
            'menu_position' => 1,
            'parent' => 'what-we-treat',
        ),
        'anxiety' => array(
            'title' => 'Anxiety & Panic',
            'template' => 'page-templates/condition-anxiety.php',
            'content' => '',
            'menu_position' => 2,
            'parent' => 'what-we-treat',
        ),
        'adhd' => array(
            'title' => 'ADHD',
            'template' => 'page-templates/condition-adhd.php',
            'content' => '',
            'menu_position' => 3,
            'parent' => 'what-we-treat',
        ),
        'services' => array(
            'title' => 'Services',
            'template' => '',
            'content' => '<h1>Our Services</h1><p>Lifespan Psychiatry offers a range of mental health services.</p>',
            'menu_position' => 3,
            'parent' => 0,
        ),
        'psychiatry' => array(
            'title' => 'Psychiatry',
            'template' => 'page-templates/service-psychiatry.php',
            'content' => '',
            'menu_position' => 1,
            'parent' => 'services',
        ),
        'therapy' => array(
            'title' => 'Talk Therapy',
            'template' => 'page-templates/service-therapy.php',
            'content' => '',
            'menu_position' => 2,
            'parent' => 'services',
        ),
        'medication-management' => array(
            'title' => 'Medication Management',
            'template' => 'page-templates/service-medication.php',
            'content' => '',
            'menu_position' => 3,
            'parent' => 'services',
        ),
        'providers' => array(
            'title' => 'Our Providers',
            'template' => '',
            'content' => '<h1>Our Mental Health Specialists</h1><p>Meet the dedicated team of providers at Lifespan Psychiatry.</p>',
            'menu_position' => 4,
            'parent' => 0,
        ),
        'insurance' => array(
            'title' => 'Insurance',
            'template' => 'page-templates/page-insurance.php',
            'content' => '<h1>Insurance</h1><p>Lifespan Psychiatry accepts most major insurance plans.</p>',
            'menu_position' => 5,
            'parent' => 0,
        ),
        'about' => array(
            'title' => 'About Us',
            'template' => 'page-templates/page-about.php',
            'content' => '<h1>About Lifespan Psychiatry</h1><p>Learn more about our practice and our approach to mental healthcare.</p>',
            'menu_position' => 6,
            'parent' => 0,
        ),
        'contact' => array(
            'title' => 'Contact',
            'template' => 'page-templates/page-contact.php',
            'content' => '<h1>Contact Us</h1><p>Reach out to schedule an appointment or learn more about our services.</p>',
            'menu_position' => 7,
            'parent' => 0,
        ),
    );
    
    // Store page IDs for later use with menus
    $page_ids = array();
    
    // Create each page
    foreach ($pages as $slug => $page_data) {
        $parent_id = 0;
        
        // Check if page has a parent
        if (!empty($page_data['parent'])) {
            if (is_numeric($page_data['parent'])) {
                $parent_id = $page_data['parent'];
            } elseif (isset($page_ids[$page_data['parent']])) {
                $parent_id = $page_ids[$page_data['parent']];
            }
        }
        
        // Check if page already exists
        $existing = get_page_by_path($slug);
        
        if (!$existing) {
            // Create the page
            $page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => $page_data['content'],
                'post_parent' => $parent_id,
                'menu_order' => $page_data['menu_position'],
            ));
            
            // Set page template if specified
            if (!empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
            
            $page_ids[$slug] = $page_id;
            echo "<p>Created page: {$page_data['title']}</p>";
        } else {
            $page_ids[$slug] = $existing->ID;
            echo "<p>Page already exists: {$page_data['title']}</p>";
        }
        
        // Set front page
        if (isset($page_data['is_home']) && $page_data['is_home']) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $page_ids[$slug]);
            echo "<p>Set {$page_data['title']} as front page</p>";
        }
    }
    
    return $page_ids;
}

/**
 * Set up navigation menus
 */
function lifespan_setup_navigation() {
    echo '<h2>Setting up Navigation...</h2>';
    
    // Check if the menu already exists
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        // Create the menu
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Get all pages to use in menu
        $pages = get_pages();
        $pages_by_slug = array();
        $pages_by_id = array();
        
        foreach ($pages as $page) {
            $pages_by_slug[$page->post_name] = $page->ID;
            $pages_by_id[$page->ID] = $page;
        }
        
        // Add items to menu
        if (!empty($pages_by_slug['home'])) {
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'Home',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $pages_by_slug['home'],
                'menu-item-type' => 'post_type',
                'menu-item-status' => 'publish',
                'menu-item-position' => 1,
            ));
        }
        
        // What We Treat dropdown
        if (!empty($pages_by_slug['what-we-treat'])) {
            $what_we_treat_item_id = wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'What We Treat',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $pages_by_slug['what-we-treat'],
                'menu-item-type' => 'post_type',
                'menu-item-status' => 'publish',
                'menu-item-position' => 2,
            ));
            
            // Add child items
            $condition_pages = array('depression', 'anxiety', 'adhd');
            foreach ($condition_pages as $i => $slug) {
                if (!empty($pages_by_slug[$slug])) {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' => get_the_title($pages_by_slug[$slug]),
                        'menu-item-object' => 'page',
                        'menu-item-object-id' => $pages_by_slug[$slug],
                        'menu-item-type' => 'post_type',
                        'menu-item-parent-id' => $what_we_treat_item_id,
                        'menu-item-status' => 'publish',
                        'menu-item-position' => $i + 1,
                    ));
                }
            }
        }
        
        // Services dropdown
        if (!empty($pages_by_slug['services'])) {
            $services_item_id = wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'Services',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $pages_by_slug['services'],
                'menu-item-type' => 'post_type',
                'menu-item-status' => 'publish',
                'menu-item-position' => 3,
            ));
            
            // Add child items
            $service_pages = array('psychiatry', 'therapy', 'medication-management');
            foreach ($service_pages as $i => $slug) {
                if (!empty($pages_by_slug[$slug])) {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' => get_the_title($pages_by_slug[$slug]),
                        'menu-item-object' => 'page',
                        'menu-item-object-id' => $pages_by_slug[$slug],
                        'menu-item-type' => 'post_type',
                        'menu-item-parent-id' => $services_item_id,
                        'menu-item-status' => 'publish',
                        'menu-item-position' => $i + 1,
                    ));
                }
            }
        }
        
        // Add remaining top level pages
        $top_pages = array('providers' => 4, 'insurance' => 5, 'about' => 6, 'contact' => 7);
        foreach ($top_pages as $slug => $position) {
            if (!empty($pages_by_slug[$slug])) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => get_the_title($pages_by_slug[$slug]),
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $pages_by_slug[$slug],
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                    'menu-item-position' => $position,
                ));
            }
        }
        
        // Add Book Now button as a custom link
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Book Now',
            'menu-item-url' => '/contact/',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-attr-title' => 'Book an appointment',
            'menu-item-position' => 8,
            'menu-item-classes' => 'book-now-button'
        ));
        
        // Set menu location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
        
        echo "<p>Created Primary Navigation Menu</p>";
    } else {
        echo "<p>Primary Navigation Menu already exists</p>";
    }
}

/**
 * Configure theme settings and options
 */
function lifespan_configure_theme() {
    echo '<h2>Configuring Theme Settings...</h2>';
    
    // Set site title and tagline
    update_option('blogname', 'Lifespan Psychiatry');
    update_option('blogdescription', 'Mental Healthcare for Every Stage of Life');
    
    // Set permalink structure
    update_option('permalink_structure', '/%postname%/');
    
    // Create a menu location if it doesn't exist
    register_nav_menu('primary', 'Primary Menu');
    
    echo "<p>Theme settings configured</p>";
}

// Check if this file is being accessed via admin
if (is_admin()) {
    add_action('admin_menu', 'lifespan_add_setup_menu');
}

/**
 * Add the theme setup page to admin menu
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

/**
 * Display the theme setup page
 */
function lifespan_theme_setup_page() {
    ?>
    <div class="wrap">
        <h1>Lifespan Psychiatry Theme Setup</h1>
        
        <?php if (get_option('lifespan_setup_complete')): ?>
            <div class="notice notice-success">
                <p>Theme setup has already been completed!</p>
            </div>
            <p>If you need to run the setup again, click the button below:</p>
            <form method="post" action="">
                <?php wp_nonce_field('lifespan_reset_setup', 'lifespan_reset_nonce'); ?>
                <p>
                    <input type="submit" name="lifespan_reset_setup" class="button button-primary" value="Reset & Run Setup Again">
                </p>
            </form>
        <?php else: ?>
            <p>Click the button below to set up the Lifespan Psychiatry theme with default pages, menus and settings:</p>
            <form method="post" action="">
                <?php wp_nonce_field('lifespan_run_setup', 'lifespan_setup_nonce'); ?>
                <p>
                    <input type="submit" name="lifespan_run_setup" class="button button-primary" value="Run Theme Setup">
                </p>
            </form>
        <?php endif; ?>
    </div>
    <?php
    
    // Process setup request
    if (isset($_POST['lifespan_run_setup']) && isset($_POST['lifespan_setup_nonce']) && wp_verify_nonce($_POST['lifespan_setup_nonce'], 'lifespan_run_setup')) {
        lifespan_setup_theme();
    }
    
    // Process reset request
    if (isset($_POST['lifespan_reset_setup']) && isset($_POST['lifespan_reset_nonce']) && wp_verify_nonce($_POST['lifespan_reset_nonce'], 'lifespan_reset_setup')) {
        delete_option('lifespan_setup_complete');
        lifespan_setup_theme();
    }
}

// Run the setup automatically on theme activation
add_action('after_switch_theme', 'lifespan_after_theme_activation');

function lifespan_after_theme_activation() {
    // Only run if setup hasn't been completed
    if (!get_option('lifespan_setup_complete')) {
        // We need to wait until the next page load to ensure all required files are loaded
        add_action('admin_notices', 'lifespan_activation_notice');
    }
}

/**
 * Display a notice after theme activation
 */
function lifespan_activation_notice() {
    ?>
    <div class="notice notice-info is-dismissible">
        <p>Welcome to Lifespan Psychiatry theme! <a href="<?php echo admin_url('themes.php?page=lifespan-theme-setup'); ?>">Click here to run the theme setup</a>.</p>
    </div>
    <?php
}
