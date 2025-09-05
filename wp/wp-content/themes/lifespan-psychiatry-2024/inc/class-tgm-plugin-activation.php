<?php
/**
 * Plugin installation and activation for WordPress themes.
 *
 * Please note that this is a drop-in library for a theme or plugin.
 * The authors of this library (Thomas, Gary and Juliette) are NOT responsible
 * for the support of your plugin or theme. Please contact the plugin
 * or theme author for support.
 *
 * @package   TGM-Plugin-Activation
 * @version   2.6.1
 * @link      http://tgmpluginactivation.com/
 * @author    Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright Copyright (c) 2011, Thomas Griffin
 * @license   GPL-2.0+
 */

/*
    Copyright 2011 Thomas Griffin (thomasgriffinmedia.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {

    /**
     * Automatic plugin installation and activation library.
     *
     * Creates a way to automatically install and activate plugins from within themes.
     * The plugins can be either bundled, downloaded from the WordPress
     * Plugin Repository or downloaded from another external source.
     *
     * @since 1.0.0
     *
     * @package TGM-Plugin-Activation
     * @author  Thomas Griffin
     * @author  Gary Jones
     */
    class TGM_Plugin_Activation {
        /**
         * TGMPA version number.
         *
         * @since 2.5.0
         *
         * @const string Version number.
         */
        const TGMPA_VERSION = '2.6.1';

        /**
         * Regular expression to test if a URL is a WP plugin repo URL.
         *
         * @const string Regex.
         *
         * @since 2.5.0
         */
        const WP_REPO_REGEX = '|^http[s]?://wordpress\.org/(?:extend/)?plugins/|';

        /**
         * Arbitrary regular expression to test if a string starts with a URL.
         *
         * @const string Regex.
         *
         * @since 2.5.0
         */
        const IS_URL_REGEX = '|^http[s]?://|';

        /**
         * Holds a copy of itself, so it can be referenced by the class name.
         *
         * @since 1.0.0
         *
         * @var TGM_Plugin_Activation
         */
        public static $instance;

        /**
         * Holds arrays of plugin details.
         *
         * @since 1.0.0
         * @since 2.5.0 the array has the plugin slug as an associative key.
         *
         * @var array
         */
        public $plugins = array();

        /**
         * Holds arrays of plugin names to use to sort the plugins array.
         *
         * @since 2.5.0
         *
         * @var array
         */
        protected $sort_order = array();

        /**
         * Whether any plugins have the 'force_activation' setting set to true.
         *
         * @since 2.5.0
         *
         * @var bool
         */
        protected $has_forced_activation = false;

        /**
         * Whether any plugins have the 'force_deactivation' setting set to true.
         *
         * @since 2.5.0
         *
         * @var bool
         */
        protected $has_forced_deactivation = false;

        /**
         * Name of the unique ID to hash notices.
         *
         * @since 2.4.0
         *
         * @var string
         */
        public $id = 'tgmpa';

        /**
         * Name of the query-string argument for the admin page.
         *
         * @since 1.0.0
         *
         * @var string
         */
        protected $menu = 'tgmpa-install-plugins';

        /**
         * Parent menu file slug.
         *
         * @since 2.5.0
         *
         * @var string
         */
        public $parent_slug = 'themes.php';

        /**
         * Capability needed to view the plugin installation menu item.
         *
         * @since 2.5.0
         *
         * @var string
         */
        public $capability = 'edit_theme_options';

        /**
         * Default absolute path to folder containing bundled plugin zip files.
         *
         * @since 2.0.0
         *
         * @var string Absolute path prefix to zip file location for bundled plugins. Default is empty string.
         */
        public $default_path = '';

        /**
         * Flag to show admin notices or not.
         *
         * @since 2.1.0
         *
         * @var boolean
         */
        public $has_notices = true;

        /**
         * Flag to determine if the user can dismiss the notice nag.
         *
         * @since 2.4.0
         *
         * @var boolean
         */
        public $dismissable = true;

        /**
         * Message to be output above nag notice if dismissable is false.
         *
         * @since 2.4.0
         *
         * @var string
         */
        public $dismiss_msg = '';

        /**
         * Flag to set automatic activation of plugins. Off by default.
         *
         * @since 2.2.0
         *
         * @var boolean
         */
        public $is_automatic = false;

        /**
         * Optional message to display before the plugins table.
         *
         * @since 2.2.0
         *
         * @var string Message filtered by wp_kses_post(). Default is empty string.
         */
        public $message = '';

        /**
         * Holds configurable array of strings.
         *
         * Default values are added in the constructor.
         *
         * @since 2.0.0
         *
         * @var array
         */
        public $strings = array();

        /**
         * Holds the version of WordPress.
         *
         * @since 2.4.0
         *
         * @var int
         */
        public $wp_version;

        /**
         * Holds the hook name for the admin page.
         *
         * @since 2.5.0
         *
         * @var string
         */
        public $page_hook;

        /**
         * Minimal demonstration of TGM Plugin Activation class
         * For full functionality, please use the actual class from the 
         * GitHub repository: https://github.com/TGMPA/TGM-Plugin-Activation
         * 
         * This is a minimal implementation for demonstration purposes.
         */
        public function __construct() {
            // Set the current WordPress version.
            $this->wp_version = $GLOBALS['wp_version'];

            // Announce that the class is ready, and pass the object (for advanced use).
            do_action_ref_array( 'tgmpa_init', array( $this ) );

            // Add the required admin hooks.
            add_action( 'admin_menu', array( $this, 'admin_menu' ) );
            add_action( 'admin_init', array( $this, 'admin_init' ) );
            add_action( 'admin_notices', array( $this, 'notices' ) );
        }

        /**
         * Register the menu page.
         */
        public function admin_menu() {
            // For minimal demo
            $this->page_hook = add_theme_page(
                'Install Required Plugins',
                'Install Plugins',
                $this->capability,
                $this->menu,
                array( $this, 'install_plugins_page' )
            );
        }

        /**
         * Initialize the plugin installation process.
         */
        public function admin_init() {
            if ( ! current_user_can( $this->capability ) ) {
                return;
            }
            
            // For minimal demo, we'll just handle plugin installation here
            if ( isset( $_GET['page'] ) && $this->menu === $_GET['page'] && isset( $_GET['plugin'] ) ) {
                $plugin_slug = sanitize_text_field( $_GET['plugin'] );
                
                // Check if plugin is already installed
                if ( $this->is_plugin_installed( $plugin_slug ) ) {
                    // Activate the plugin
                    activate_plugin( $this->get_plugin_basename_from_slug( $plugin_slug ) );
                    wp_redirect( admin_url( 'themes.php?page=' . $this->menu . '&activated=true' ) );
                    exit;
                } else {
                    // Install the plugin
                    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                    
                    $api = plugins_api( 'plugin_information', array(
                        'slug' => $plugin_slug,
                        'fields' => array(
                            'short_description' => false,
                            'sections' => false,
                            'requires' => false,
                            'rating' => false,
                            'ratings' => false,
                            'downloaded' => false,
                            'last_updated' => false,
                            'added' => false,
                            'tags' => false,
                            'compatibility' => false,
                            'homepage' => false,
                            'donate_link' => false,
                        ),
                    ) );
                    
                    if ( ! is_wp_error( $api ) ) {
                        $upgrader = new Plugin_Upgrader( new Plugin_Installer_Skin( compact( 'api' ) ) );
                        $upgrader->install( $api->download_link );
                        
                        // Activate the plugin
                        activate_plugin( $this->get_plugin_basename_from_slug( $plugin_slug ) );
                        wp_redirect( admin_url( 'themes.php?page=' . $this->menu . '&installed=true' ) );
                        exit;
                    }
                }
            }
        }

        /**
         * Display plugin installation page.
         */
        public function install_plugins_page() {
            // Simplified version for this demo
            echo '<div class="wrap">';
            echo '<h1>' . esc_html( get_admin_page_title() ) . '</h1>';
            echo '<p>The following plugins are required for this theme to work correctly:</p>';
            echo '<table class="wp-list-table widefat plugins">';
            echo '<thead><tr><th>Plugin</th><th>Status</th><th>Action</th></tr></thead>';
            echo '<tbody>';
            
            foreach ( $this->plugins as $plugin ) {
                $is_installed = $this->is_plugin_installed( $plugin['slug'] );
                $is_active = $this->is_plugin_active( $plugin['slug'] );
                
                echo '<tr>';
                echo '<td>' . esc_html( $plugin['name'] ) . '</td>';
                echo '<td>' . ( $is_active ? 'Active' : ( $is_installed ? 'Installed but not activated' : 'Not installed' ) ) . '</td>';
                echo '<td>';
                
                if ( $is_active ) {
                    echo 'Active';
                } elseif ( $is_installed ) {
                    echo '<a href="' . esc_url( wp_nonce_url( 
                        add_query_arg(
                            array(
                                'page' => $this->menu,
                                'plugin' => $plugin['slug'],
                                'tgmpa-activate' => 'activate-plugin',
                            ),
                            admin_url( $this->parent_slug )
                        ),
                        'tgmpa-activate', 'tgmpa-nonce'
                    ) ) . '" class="button button-primary">Activate</a>';
                } else {
                    echo '<a href="' . esc_url( wp_nonce_url( 
                        add_query_arg(
                            array(
                                'page' => $this->menu,
                                'plugin' => $plugin['slug'],
                                'tgmpa-install' => 'install-plugin',
                            ),
                            admin_url( $this->parent_slug )
                        ),
                        'tgmpa-install', 'tgmpa-nonce'
                    ) ) . '" class="button button-primary">Install</a>';
                }
                
                echo '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }

        /**
         * Display admin notices.
         */
        public function notices() {
            if ( ! $this->has_notices ) {
                return;
            }
            
            // Check for missing required plugins
            $missing_plugins = array();
            foreach ( $this->plugins as $plugin ) {
                if ( ! empty( $plugin['required'] ) && ! $this->is_plugin_active( $plugin['slug'] ) ) {
                    $missing_plugins[] = $plugin['name'];
                }
            }
            
            if ( empty( $missing_plugins ) ) {
                return;
            }
            
            // Output the notice
            echo '<div class="notice notice-warning is-dismissible">';
            echo '<p>The Lifespan Psychiatry theme requires the following plugins: <strong>' . implode( ', ', $missing_plugins ) . '</strong>.</p>';
            echo '<p><a href="' . esc_url( admin_url( 'themes.php?page=' . $this->menu ) ) . '" class="button-primary">Install Plugins</a></p>';
            echo '</div>';
        }

        /**
         * Check if a plugin is installed.
         */
        public function is_plugin_installed( $slug ) {
            $installed_plugins = get_plugins();
            return isset( $installed_plugins[ $this->get_plugin_basename_from_slug( $slug ) ] );
        }

        /**
         * Check if a plugin is active.
         */
        public function is_plugin_active( $slug ) {
            return is_plugin_active( $this->get_plugin_basename_from_slug( $slug ) );
        }

        /**
         * Get the plugin basename from the plugin slug.
         */
        public function get_plugin_basename_from_slug( $slug ) {
            $keys = array_keys( get_plugins() );
            foreach ( $keys as $key ) {
                if ( preg_match( '|^' . $slug . '/|', $key ) ) {
                    return $key;
                }
            }
            return $slug;
        }
    }

    /**
     * Helper function to register the required plugins.
     */
    function tgmpa( $plugins, $config = array() ) {
        $instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
        foreach ( $plugins as $plugin ) {
            $instance->register( $plugin );
        }
        
        if ( ! empty( $config ) && is_array( $config ) ) {
            // Merge config settings with defaults
            foreach ( $config as $key => $value ) {
                if ( property_exists( $instance, $key ) ) {
                    $instance->$key = $value;
                }
            }
        }
    }

    /**
     * The main function responsible for returning the one true TGM_Plugin_Activation instance.
     */
    function get_tgmpa_instance() {
        return $GLOBALS['tgmpa'];
    }

    /**
     * Ensure only one instance is created.
     */
    function tgmpa_init() {
        $GLOBALS['tgmpa'] = TGM_Plugin_Activation::get_instance();
    }

    /**
     * Register hook to fire when the class is initialized.
     */
    add_action( 'after_setup_theme', 'tgmpa_init', 10 );

    /**
     * Return an instance of the class.
     */
    function TGM_Plugin_Activation::get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Register a plugin.
     */
    function TGM_Plugin_Activation::register( $plugin ) {
        if ( empty( $plugin['slug'] ) || empty( $plugin['name'] ) ) {
            return;
        }
        $this->plugins[ $plugin['slug'] ] = $plugin;
    }
}
