<?php
/**
 * Direct access to theme setup
 * Access this file via: http://lifespanpsychiatrymn.local/wp-content/themes/lifespan-psychiatry-2024/theme-setup-direct.php
 */

// Load WordPress
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php';

// Check if user is logged in and has permissions
if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}

// Include the setup script
require_once get_theme_file_path('/setup-theme.php');

// Run the setup
echo '<div class="wrap">';
echo '<h1>Lifespan Psychiatry Theme Setup</h1>';
echo '<p>Running theme setup directly...</p>';

// Check if the setup function exists
if (function_exists('lifespan_setup_theme')) {
    // Run the setup function
    lifespan_setup_theme();
    echo '<p>✅ Setup completed! <a href="' . home_url() . '">Visit your site</a></p>';
} else {
    echo '<p>❌ Error: Setup function not found. Please check your setup-theme.php file.</p>';
}

echo '</div>';










