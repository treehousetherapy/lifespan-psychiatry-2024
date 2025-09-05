<?php
/**
 * Plugin Activator
 *
 * Automatically installs and activates required plugins
 *
 * @package LifespanPsychiatry
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register the required plugins for this theme
 */
function lifespan_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        array(
            'name'      => 'Custom Post Type UI',
            'slug'      => 'custom-post-type-ui',
            'required'  => true,
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'Yoast SEO',
            'slug'      => 'wordpress-seo',
            'required'  => false,
        ),
        array(
            'name'      => 'Regenerate Thumbnails',
            'slug'      => 'regenerate-thumbnails',
            'required'  => false,
        ),
    );

    $config = array(
        'id'           => 'lifespan-psychiatry',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => false,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',
    );

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'lifespan_register_required_plugins');

/**
 * Include the TGM_Plugin_Activation class
 */
function lifespan_include_tgm_plugin_activation() {
    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
}

// Ensure TGM Plugin Activation is included
add_action('after_setup_theme', 'lifespan_include_tgm_plugin_activation');

/**
 * Manual activation function (can be run directly)
 */
function lifespan_activate_plugins_manually() {
    // Only run on admin pages
    if (!is_admin()) {
        return;
    }

    // Required plugins
    $plugins = array(
        'advanced-custom-fields/acf.php',
        'custom-post-type-ui/custom-post-type-ui.php',
        'contact-form-7/wp-contact-form-7.php',
        'wordpress-seo/wp-seo.php',
    );

    // Check if plugins are already active
    foreach ($plugins as $plugin) {
        if (!is_plugin_active($plugin)) {
            activate_plugin($plugin);
        }
    }
}

// Hook to run plugin activation after theme activation
function lifespan_theme_activation() {
    add_action('admin_init', 'lifespan_activate_plugins_manually');
}
add_action('after_switch_theme', 'lifespan_theme_activation');

/**
 * Add admin notice if required plugins are not active
 */
function lifespan_admin_notice_missing_plugins() {
    $required_plugins = array(
        'advanced-custom-fields/acf.php' => 'Advanced Custom Fields',
        'custom-post-type-ui/custom-post-type-ui.php' => 'Custom Post Type UI',
    );
    
    $missing_plugins = array();
    
    foreach ($required_plugins as $plugin_path => $plugin_name) {
        if (!is_plugin_active($plugin_path)) {
            $missing_plugins[] = $plugin_name;
        }
    }
    
    if (!empty($missing_plugins)) {
        echo '<div class="notice notice-error">';
        echo '<p><strong>Lifespan Psychiatry Theme:</strong> The following required plugins are not active: ' . implode(', ', $missing_plugins) . '.</p>';
        echo '<p>Please <a href="' . admin_url('themes.php?page=tgmpa-install-plugins') . '">install and activate</a> these plugins for the theme to function properly.</p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'lifespan_admin_notice_missing_plugins');
