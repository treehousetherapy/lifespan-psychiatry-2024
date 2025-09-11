<?php
/**
 * Theme Setup for Lifespan Psychiatry
 * Automatically configures the theme and creates necessary pages
 *
 * @package LifespanPsychiatry
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Set up theme options on theme activation
 */
function lifespan_theme_setup() {
    // Only run once
    if (get_option('lifespan_theme_setup_complete')) {
        return;
    }
    
    // Create main pages
    $pages = array(
        'home' => array(
            'title' => 'Home',
            'template' => 'page-home.php',
            'content' => '',
            'is_home' => true
        ),
        'about' => array(
            'title' => 'About',
            'template' => 'page-about.php',
            'content' => 'About Lifespan Psychiatry',
        ),
        'contact' => array(
            'title' => 'Contact',
            'template' => 'page-contact.php',
            'content' => 'Contact information and form will appear here.',
        ),
        'insurance' => array(
            'title' => 'Insurance',
            'template' => 'page-insurance.php',
            'content' => 'Insurance information will appear here.',
        ),
        'resources' => array(
            'title' => 'Resources',
            'template' => 'page-resources.php',
            'content' => 'Mental health resources will appear here.',
        ),
    );
    
    $page_ids = array();
    
    // Create pages
    foreach ($pages as $slug => $page_data) {
        // Check if page exists
        $existing_page = get_page_by_path($slug);
        
        if (!$existing_page) {
            // Create page
            $page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => $page_data['content'],
            ));
            
            // Set page template
            if (!empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
            
            $page_ids[$slug] = $page_id;
        } else {
            $page_ids[$slug] = $existing_page->ID;
        }
    }
    
    // Set front page and posts page
    if (!empty($page_ids['home'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_ids['home']);
    }
    
    // Create main menu
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Set up menu items
        $menu_items = array(
            array(
                'title' => 'Home',
                'page_id' => isset($page_ids['home']) ? $page_ids['home'] : null,
            ),
            array(
                'title' => 'What We Treat',
                'url' => '#',
                'children' => array(
                    array(
                        'title' => 'Depression & Mood',
                        'url' => home_url('/condition/depression/'),
                    ),
                    array(
                        'title' => 'Anxiety & Panic',
                        'url' => home_url('/condition/anxiety/'),
                    ),
                    array(
                        'title' => 'ADHD',
                        'url' => home_url('/condition/adhd/'),
                    ),
                ),
            ),
            array(
                'title' => 'Services',
                'url' => '#',
                'children' => array(
                    array(
                        'title' => 'Talk Therapy',
                        'url' => home_url('/service/talk-therapy/'),
                    ),
                    array(
                        'title' => 'Psychiatry',
                        'url' => home_url('/service/psychiatry/'),
                    ),
                    array(
                        'title' => 'Medication Management',
                        'url' => home_url('/service/medication-management/'),
                    ),
                ),
            ),
            array(
                'title' => 'Providers',
                'url' => home_url('/providers/'),
            ),
            array(
                'title' => 'Insurance',
                'page_id' => isset($page_ids['insurance']) ? $page_ids['insurance'] : null,
            ),
            array(
                'title' => 'About',
                'page_id' => isset($page_ids['about']) ? $page_ids['about'] : null,
            ),
            array(
                'title' => 'Contact',
                'page_id' => isset($page_ids['contact']) ? $page_ids['contact'] : null,
            ),
        );
        
        // Add items to menu
        foreach ($menu_items as $item) {
            if (isset($item['page_id']) && $item['page_id']) {
                // Add page to menu
                $item_id = wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $item['title'],
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $item['page_id'],
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                ));
            } else {
                // Add custom link to menu
                $item_id = wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $item['title'],
                    'menu-item-url' => isset($item['url']) ? $item['url'] : '#',
                    'menu-item-status' => 'publish',
                    'menu-item-type' => 'custom',
                ));
            }
            
            // Add children if they exist
            if (isset($item['children']) && !empty($item['children'])) {
                foreach ($item['children'] as $child) {
                    $child_id = wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' => $child['title'],
                        'menu-item-url' => isset($child['url']) ? $child['url'] : '#',
                        'menu-item-status' => 'publish',
                        'menu-item-type' => 'custom',
                        'menu-item-parent-id' => $item_id,
                    ));
                }
            }
        }
        
        // Set menu as primary navigation
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
    
    // Mark setup as complete
    update_option('lifespan_theme_setup_complete', true);
}

// Run setup on theme activation
add_action('after_switch_theme', 'lifespan_theme_setup');

// Add theme setup to admin menu
function lifespan_add_theme_setup_page() {
    add_submenu_page(
        'themes.php',
        'Theme Setup',
        'Theme Setup',
        'manage_options',
        'theme-setup',
        'lifespan_theme_setup_page'
    );
}
add_action('admin_menu', 'lifespan_add_theme_setup_page');

// Theme setup page content
function lifespan_theme_setup_page() {
    ?>
    <div class="wrap">
        <h1>Lifespan Psychiatry Theme Setup</h1>
        
        <p>This page allows you to run the theme setup process, which will:</p>
        <ul style="list-style-type: disc; padding-left: 2em;">
            <li>Create essential pages (Home, About, Contact, etc.)</li>
            <li>Set up the primary navigation menu</li>
            <li>Configure the homepage and site settings</li>
        </ul>
        
        <form method="post" action="">
            <?php wp_nonce_field('lifespan_run_setup', 'lifespan_setup_nonce'); ?>
            <p>
                <input type="submit" name="lifespan_run_setup" class="button button-primary" value="Run Theme Setup">
            </p>
        </form>
        
        <?php if (isset($_POST['lifespan_run_setup']) && isset($_POST['lifespan_setup_nonce']) && wp_verify_nonce($_POST['lifespan_setup_nonce'], 'lifespan_run_setup')): ?>
            <?php 
                // Run setup again forcefully
                delete_option('lifespan_theme_setup_complete');
                lifespan_theme_setup();
            ?>
            <div class="notice notice-success">
                <p>Theme setup completed successfully!</p>
            </div>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Create a sample homepage if the homepage content is empty
 */
function lifespan_check_homepage_content() {
    // Get homepage ID
    $front_page_id = get_option('page_on_front');
    
    // If homepage is set and it's empty, populate it
    if ($front_page_id) {
        $page = get_post($front_page_id);
        
        if ($page && empty($page->post_content)) {
            // Get demo homepage content
            $content = lifespan_get_demo_homepage_content();
            
            // Update the page
            wp_update_post(array(
                'ID' => $front_page_id,
                'post_content' => $content,
            ));
        }
    }
}
add_action('admin_init', 'lifespan_check_homepage_content');

/**
 * Get demo homepage content
 */
function lifespan_get_demo_homepage_content() {
    ob_start();
    ?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30"}}},"backgroundColor":"primary","textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:heading {"level":1,"align":"wide"} -->
    <h1 class="wp-block-heading alignwide">The best of mental healthcare in one place</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"large"} -->
    <p class="has-large-font-size">Get care fast — in person or online, within days</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons -->
    <div class="wp-block-buttons">
        <!-- wp:button {"backgroundColor":"background","textColor":"primary"} -->
        <div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-background-background-color has-text-color has-background wp-element-button">Book Appointment</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">Lifespan Psychiatry accepts insurance</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Accessible</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Same-week appointments available for new patients</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Affordable</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>In-Network with major insurance plans plus self-pay options</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Effective</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Expert-led, evidence-based care for better mental health</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">How We Help</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Psychiatry</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Expert medication management for mental health conditions</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph -->
            <p><a href="/service/psychiatry/">Learn more →</a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Talk Therapy</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Evidence-based therapeutic approaches for lasting change</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph -->
            <p><a href="/service/talk-therapy/">Learn more →</a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Medication Management</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Ongoing care to ensure your medications are working effectively</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph -->
            <p><a href="/service/medication-management/">Learn more →</a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">Conditions We Treat</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Depression & Mood</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p><a href="/condition/depression/">Learn more →</a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Anxiety & Panic</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p><a href="/condition/anxiety/">Learn more →</a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">ADHD</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p><a href="/condition/adhd/">Learn more →</a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30"}}},"backgroundColor":"primary","textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">Let's get you the care you deserve</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">Our mental health specialists are ready to help you feel better</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons">
        <!-- wp:button {"backgroundColor":"background","textColor":"primary"} -->
        <div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-background-background-color has-text-color has-background wp-element-button" href="/contact/">Book Appointment</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
    
    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size">If you're experiencing a mental health emergency:<br>Call 988 or text HOME to 741741</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
    <?php
    return ob_get_clean();
}

/**
 * Create a front-page.php template if it doesn't exist
 */
function lifespan_create_frontpage_template() {
    $theme_dir = get_stylesheet_directory();
    $frontpage_template = $theme_dir . '/front-page.php';
    
    if (!file_exists($frontpage_template)) {
        $content = <<<EOT
<?php
/**
 * The front page template file
 *
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        
        the_content();
        
    endwhile;
    ?>
</main><!-- #main -->

<?php
get_footer();
EOT;
        
        file_put_contents($frontpage_template, $content);
    }
    
    // Also create page-home.php template
    $homepage_template = $theme_dir . '/page-templates/page-home.php';
    
    // Create directory if it doesn't exist
    if (!file_exists(dirname($homepage_template))) {
        mkdir(dirname($homepage_template), 0777, true);
    }
    
    if (!file_exists($homepage_template)) {
        $content = <<<EOT
<?php
/**
 * Template Name: Home Page
 *
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        
        the_content();
        
    endwhile;
    ?>
</main><!-- #main -->

<?php
get_footer();
EOT;
        
        file_put_contents($homepage_template, $content);
    }
}
add_action('after_switch_theme', 'lifespan_create_frontpage_template');

// Run setup on theme activation or when this file is loaded
if (!function_exists('is_blog_installed') || is_blog_installed()) {
    if (!get_option('lifespan_theme_setup_complete')) {
        lifespan_theme_setup();
        lifespan_create_frontpage_template();
    }
}










