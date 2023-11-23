<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wonkasoft.com
 * @since             1.0.0
 * @package           Ws_Rescue_Rover_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       WSRescueRoverPro
 * Plugin URI:        https://wonkasoft.com/ws-rescue-rover-pro
 * Description:       WSRescueRoverPro is a comprehensive WordPress plugin designed to streamline and enhance the management of dog rescue operations. From tracking incoming dogs to overseeing the adoption process, the plugin offers a robust database system. It facilitates efficient management of sponsorship programs and donation tracking, ensuring transparency and accountability throughout the rescue journey. With WSRescueRoverPro, your dog rescue organization can effortlessly navigate the complexities of rescue operations while fostering a community of sponsors and supporters dedicated to the well-being of every canine companion.
 * Version:           1.0.0
 * Author:            Wonkasoft
 * Author URI:        https://wonkasoft.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ws-rescue-rover-pro
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WS_RESCUE_ROVER_PRO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ws-rescue-rover-pro-activator.php
 */
function activate_ws_rescue_rover_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ws-rescue-rover-pro-activator.php';
	Ws_Rescue_Rover_Pro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ws-rescue-rover-pro-deactivator.php
 */
function deactivate_ws_rescue_rover_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ws-rescue-rover-pro-deactivator.php';
	Ws_Rescue_Rover_Pro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ws_rescue_rover_pro' );
register_deactivation_hook( __FILE__, 'deactivate_ws_rescue_rover_pro' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ws-rescue-rover-pro.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ws_rescue_rover_pro() {

	$plugin = new Ws_Rescue_Rover_Pro();
	$plugin->run();

}
run_ws_rescue_rover_pro();
