<?php
/**
 * Reservation Plugin
 *
 * @package           Reservation_Plugin
 * @author            Jan Eike Suchard
 * @copyright         2023 Jan Eike Suchard
 * @license           MIT
 *
 * @wordpress-plugin
 * Plugin Name:       Reservierungs-Plugin
 * Plugin URI:        https://github.com/unikino-gegenlicht/reservation-plugin
 * Description:       This plugin allows the Unikino GEGENLICHT to manage reservations for their events.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.1
 * Author:            Jan Eike Suchard
 * Author URI:        https://suchard.cloud
 * Text Domain:       reservation-plugin
 * License:           MIT
 * License URI:       https://spdx.org/licenses/MIT.txt
 * Update URI:        false
 */

// check if this file is called directly and abort if it is
if (!defined('WPINC')) {
	die;
}

/**
 * Current plugin version
 */
const RESERVATION_PLUGIN_VERSION = '1.0.0';
const RESERVATION_TABLE_NAME = 'reservations';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/lifecycle.php
 */
function activate_reservation_plugin(): void {
	require_once plugin_dir_path(__FILE__) . 'includes/lifecycle.php';
	Plugin_Lifecycle::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/lifecycle.php
 */
function deactivate_reservation_plugin(): void {
	require_once plugin_dir_path( __FILE__ ) . 'includes/lifecycle.php';
	Plugin_Lifecycle::deactivate();
}

/**
 * The code that runs during plugin deactivation.
 *
 * This function just calls the uninstallation method from the Plugin_Lifecycle class
 */
function uninstall_reservation_plugin(): void {
	require_once plugin_dir_path(__FILE__). 'includes/lifecycle.php';
	Plugin_Lifecycle::uninstall();
}

// register the two functions as activation and deactivation hooks
register_activation_hook(__FILE__, 'activate_reservation_plugin');
register_deactivation_hook(__FILE__, 'deactivate_reservation_plugin');
register_uninstall_hook(__FILE__, 'uninstall_reservation_plugin');

// now include the core plugin class which defines the hooks for public and
// admin areas, and internationalization
require plugin_dir_path(__FILE__) . 'includes/core.php';

/**
 * Execute the plugin
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin(): void {
	$plugin = new Reservation_Plugin();
	$plugin->run();
}

run_plugin();