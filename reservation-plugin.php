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

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/activator.php
 */
function activate_reservation_plugin(): void {
	require_once plugin_dir_path(__FILE__) . 'includes/activator.php';
	Reservation_Plugin_Activator::activate();
}