<?php

/**
 * Class Reservation_Plugin_Activator
 * @package Reservation_Plugin
 */
class Reservation_Plugin_Activator {

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
		$table_name = $wpdb->prefix . 'reservation_plugin_reservations';
		$query = "CREATE TABLE IF NOT EXISTS `$table_name` (
    				id int(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
}