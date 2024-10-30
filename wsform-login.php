<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://juvo-design.de
 * @since             1.0.0
 * @package           WSForm_Login
 *
 * @wordpress-plugin
 * Plugin Name:       JUVO Login for WS-Form
 * Description:       Integrates WS-Forms into the WordPress login system.
 * Version:           1.0.4
 * Author:            Justin Vogt
 * Author URI:        https://juvo-design.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wsform-login
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
use WSForm_Login\Activator;
use WSForm_Login\Deactivator;
use WSForm_Login\WSForm_Login;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin absolute path
 */
define( 'WSFORM_LOGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WSFORM_LOGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Use Composer PSR-4 Autoloading
 */
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 */
function activate_wsform_login() {
    Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wsform_login() {
    Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wsform_login' );
register_deactivation_hook( __FILE__, 'deactivate_wsform_login' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wsform_login() {

	$version = "1.0.4";
	$plugin = new WSForm_Login($version);
	$plugin->run();

}
run_wsform_login();
