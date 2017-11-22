<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              yancinerio.com
 * @since             1.0.0
 * @package           Stefanini_Test
 *
 * @wordpress-plugin
 * Plugin Name:       Stefanini Test
 * Plugin URI:        yancinerio.com
 * Description:       This is a test for a Wordpress dev position.
 * Version:           1.0.0
 * Author:            Yanci Nerio
 * Author URI:        yancinerio.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       stefanini-test
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );
include plugin_dir_path( __FILE__ ) . 'function_stefanini_test/ajax_savelog.php';
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-stefanini-test-activator.php
 */
function activate_stefanini_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stefanini-test-activator.php';
	Stefanini_Test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-stefanini-test-deactivator.php
 */
function deactivate_stefanini_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stefanini-test-deactivator.php';
	Stefanini_Test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_stefanini_test' );
register_deactivation_hook( __FILE__, 'deactivate_stefanini_test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-stefanini-test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_stefanini_test() {

	$plugin = new Stefanini_Test();
	$plugin->run();

}
run_stefanini_test();
