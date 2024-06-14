<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Ws_Rescue_Rover_Pro
 * @subpackage Ws_Rescue_Rover_Pro/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ws_Rescue_Rover_Pro
 * @subpackage Ws_Rescue_Rover_Pro/includes
 * @author     Wonkasoft <support@wonkasoft.com>
 */
class Ws_Rescue_Rover_Pro_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-adopters.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-adoption_apps.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-articles.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-coastal_boarding.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-coastal_vets.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-dogs.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-donations.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-events.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-fosters.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-foster_apps.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-happy_tails.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-litters.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-memorials.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-other_declines.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-private.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-puppy_apps.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-reminder_emails.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-rescue_transfers.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-resources.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-shelters.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-temp.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-volunteers.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'migrations/migration-volunteer_apps.php';
	}

}
