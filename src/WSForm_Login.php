<?php

namespace WSForm_Login;

use WSForm_Login\Frontend\Frontend;
use WSForm_Login\Admin\Admin;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    wsform_Logincomposer require htmlburger/carbon-fields
 * @subpackage WSForm_Login/includes
 * @author     Justin Vogt <mail@juvo-design.de>
 */
class WSForm_Login
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin
     *
     * @var Loader
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @var string
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @var string
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct(string $version) {

        $this->plugin_name = 'wsform-login';
        $this->version = $version;

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {
        $this->loader = new Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     */
    private function define_admin_hooks(): void {

        $plugin_admin = new Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

        $this->loader->add_action('cmb2_admin_init', new Options_Page(), 'register');

        $redirect = new Redirect();
        $this->loader->add_filter('login_url', $redirect, 'login_url', 10, 3);
        $this->loader->add_filter('lostpassword_url', $redirect, 'lostpassword_url', 11, 2);
        $this->loader->add_filter('register_url', $redirect, 'registration_url', 11);

        // Integrations - Members
        $this->loader->add_filter('members_is_private_page', new Integrations\Members\Unblock(), 'unblock');
        $this->loader->add_filter('members_is_private_rest_api', new Integrations\Members\Unblock(), 'unblock_rest_api');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        $plugin_public = new Frontend($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run() {

        // Load plugin.php to use plugin_active function if not available yet
        if (!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        // Run plugin after plugins are loaded to check for third party conditions
        add_action('plugins_loaded', function() {

            // Check if ws forms is loaded
            if (
                !defined('WS_FORM_VERSION')
                || !is_plugin_active('ws-form-pro/ws-form.php')
            ) {
                return;
            }

            // Run loader to add all filters/actions
            $this->loader->run();

        }, 20);

        // Also run loader before plugins_loaded e.g. for api
        $this->loader->run();

    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return    Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

}
