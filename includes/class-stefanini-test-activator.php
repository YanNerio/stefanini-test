<?php

/**
 * Fired during plugin activation
 *
 * @link       yancinerio.com
 * @since      1.0.0
 *
 * @package    Stefanini_Test
 * @subpackage Stefanini_Test/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Stefanini_Test
 * @subpackage Stefanini_Test/includes
 * @author     Yanci Nerio <nerioyanci@gmail.com>
 */
class Stefanini_Test_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "
			CREATE TABLE {$wpdb->prefix}action_logs (
				log_id int(11) NOT NULL AUTO_INCREMENT,
				user_id int(11) NULL default NULL,
				action_date datetime NULL default NULL,
				post_id int(5) NULL default NULL,
				created_at datetime NULL default NULL,
				PRIMARY KEY (log_id)
			) $charset_collate;
		";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

}
