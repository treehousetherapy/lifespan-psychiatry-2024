<?php
/**
 * Lifespan Psychiatry Force Setup
 * 
 * This file is a direct way to run the theme setup
 */

// Define ABSPATH if not already defined
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/');
}

// Load WordPress
require_once ABSPATH . 'wp-load.php';
require_once ABSPATH . 'wp-admin/includes/admin.php';

// Bypass the direct access check in the setup file
define('LIFESPAN_DIRECT_SETUP', true);

// Set up error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Directly include the theme functions to ensure our functions are available
require_once __DIR__ . '/functions.php';

// HTML header
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lifespan Psychiatry Theme Setup</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif; line-height: 1.6; color: #333; max-width: 800px; margin: 20px auto; padding: 20px; }
        h1 { color: #0055B7; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 4px; overflow: auto; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .error { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .info { background: #e2f0fd; color: #0c5460; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Lifespan Psychiatry Theme Setup</h1>

    <?php
    // Run setup directly
    echo '<div class="info">Starting setup process...</div>';

    // Delete the option to force setup to run
    delete_option('lifespan_setup_complete');

    // Force the setup to run
    if (function_exists('lifespan_setup_theme')) {
        try {
            // Include the setup script directly
            require_once __DIR__ . '/setup-theme.php';
            
            // Run the setup function
            lifespan_setup_theme();
            
            echo '<div class="success">Setup complete! <a href="' . home_url() . '">Visit your site</a></div>';
        } catch (Exception $e) {
            echo '<div class="error">Error: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="error">Error: Setup function not found</div>';
        
        // Display debug information
        echo '<h2>Debug Information</h2>';
        echo '<pre>';
        echo 'Functions file loaded: ' . (function_exists('lifespan_force_setup') ? 'Yes' : 'No') . "\n";
        echo 'Setup file exists: ' . (file_exists(__DIR__ . '/setup-theme.php') ? 'Yes' : 'No') . "\n";
        echo '</pre>';
    }
    ?>

    <h2>Manual Actions</h2>
    <p>If the automatic setup didn't work, you can try these manual steps:</p>
    <ol>
        <li>Go to <strong>Pages</strong> and make sure to create a Home page</li>
        <li>Set the Home page as your static front page in <strong>Settings &gt; Reading</strong></li>
        <li>Create a Primary Menu in <strong>Appearance &gt; Menus</strong></li>
        <li>Visit the <a href="<?php echo admin_url('themes.php?page=tgmpa-install-plugins'); ?>">plugin installation page</a> to install required plugins</li>
    </ol>

    <p><a href="<?php echo admin_url(); ?>">Return to WordPress Dashboard</a></p>
</body>
</html>
<?php
// End of file










