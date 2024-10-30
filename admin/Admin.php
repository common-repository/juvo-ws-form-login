<?php


namespace WSForm_Login\Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 */
class Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Learndash_Lesson_Access_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Learndash_Lesson_Access_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        if (file_exists(plugin_dir_url(__FILE__) . 'dist/css/wsform-login.min.css')) {
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'dist/css/wsform-login.min.css', array(), $this->version, 'all');
        } else {
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'dist/css/wsform-login.css', array(), $this->version, 'all');
        }

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Learndash_Lesson_Access_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Learndash_Lesson_Access_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        if (file_exists(plugin_dir_url(__FILE__) . 'dist/js/wsform-login.min.js')) {
            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'dist/js/wsform-login.min.js', array('jquery'), $this->version, false);
        } else {
            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'dist/js/wsform-login.js', array('jquery'), $this->version, false);
        }

    }

}