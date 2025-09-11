<?php
/**
 * Direct Theme Setup Runner
 * 
 * Access this file directly by visiting:
 * http://lifespanpsychiatrymn.local/wp-content/themes/lifespan-psychiatry-2024/run-setup.php
 */

// Load WordPress core
require_once '../../../../wp-load.php';

// Security check - only allow admin users
if (!current_user_can('manage_options')) {
    wp_die('You need to be an administrator to access this page.');
}

echo '<html><head><title>Lifespan Psychiatry Theme Setup</title>';
echo '<style>
    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif; line-height: 1.6; color: #444; max-width: 800px; margin: 2rem auto; padding: 0 2rem; }
    h1 { color: #0055B7; border-bottom: 1px solid #ddd; padding-bottom: 0.5rem; }
    h2 { margin-top: 2rem; color: #0055B7; }
    .success { background-color: #dff0d8; border: 1px solid #d6e9c6; color: #3c763d; padding: 1rem; border-radius: 3px; margin: 1rem 0; }
    .notice { background-color: #f8f8f8; border: 1px solid #ddd; padding: 1rem; border-radius: 3px; margin: 1rem 0; }
    .button { display: inline-block; background-color: #0055B7; color: #fff; text-decoration: none; padding: 0.5rem 1rem; border-radius: 3px; margin-top: 1rem; }
    .button:hover { background-color: #00408a; }
</style>';
echo '</head><body>';

echo '<h1>Lifespan Psychiatry Theme Setup</h1>';

// Delete the setup complete option to force setup to run
delete_option('lifespan_setup_complete');

// Include the setup script
require_once get_theme_file_path('/setup-theme.php');

// Run the setup function
echo '<div class="notice">';
echo '<p>Beginning theme setup process...</p>';
lifespan_setup_theme();
echo '</div>';

// Link to homepage and admin
echo '<div class="success">';
echo '<p>Setup completed successfully!</p>';
echo '<p><a href="' . home_url() . '" class="button">View Homepage</a> ';
echo '<a href="' . admin_url() . '" class="button">Go to Admin Dashboard</a></p>';
echo '</div>';

echo '</body></html>';










