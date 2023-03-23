<?php

/**
 * Fired during plugin lifecycle events
 *
 * @link       https://suchard.cloud
 * @since      1.0.0
 *
 * @package    Reservation_Plugin
 * @subpackage Reservation_Plugin/includes
 */

/**
 * Functions for the lifecycle of the plugin
 *
 * This class defines all code necessary to run during the plugin's lifecycle
 *
 * @since      1.0.0
 * @package    Reservation_Plugin
 * @subpackage Reservation_Plugin/includes
 * @author     Jan Eike Suchard <jan+WordPressPlugin@suchard.cloud>
 */
class Plugin_Lifecycle {

	/**
	 * Fired during plugin activation.
	 *
	 * This function creates some tables in the database to allow the reservations to be stored and managed from the
	 * WordPress backend.
	 *
	 * @since    1.0.0
	 */
	public static function activate(): void {
		// create a table for storing the reservations
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . RESERVATION_TABLE_NAME;
		$query = "CREATE TABLE IF NOT EXISTS `$table_name` (
    				id int(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    				extID varchar(36) NOT NULL,
    				movieID int(9) NOT NULL REFERENCES wp_posts(ID),
    				personName varchar(255) NOT NULL,
    				email text,
    				seats int(9) NOT NULL,
    				pickedUp bool DEFAULT FALSE
					) $charset_collate";
		dbDelta($query);
		// add options to use a default limit on reservable seats
		add_option("reservations_default_limit", 50);
	}

	/**
	 * Called to deactivate the plugin
	 *
	 *
	 * @since    1.0.0
	 */
	public static function deactivate(): void {

	}

	/**
	 * Fired during plugin deinstallation.
	 *
	 * This function deletes the created database table
	 *
	 * @since    1.0.0
	 */
	public static function uninstall(): void {
		global $wpdb;
		$table_name = $wpdb->prefix . 'movie_reservations';
		$query = "DROP TABLE $table_name";
		dbDelta($query);
		delete_option("reservations_default_limit");
	}

}