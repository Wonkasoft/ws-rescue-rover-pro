<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Ws_Rescue_Rover_Pro
 * @subpackage Ws_Rescue_Rover_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ws_Rescue_Rover_Pro
 * @subpackage Ws_Rescue_Rover_Pro/admin
 * @author     Wonkasoft <support@wonkasoft.com>
 */
class Ws_Rescue_Rover_Pro_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_theme_support( 'core-block-patterns', array() );
		add_theme_support( 'post-formats', array() );

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
		 * defined in Ws_Rescue_Rover_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ws_Rescue_Rover_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( get_current_screen()->base == 'ws_rescue_rover_page' || get_current_screen()->base == 'toplevel_page_ws_rescue_rover_page' ) {
			$style = 'bootstrap';
			if ( ! wp_style_is( $style, 'enqueued' ) && ! wp_style_is( $style, 'done' ) ) {
				// queue up your bootstrap
				wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), '5.3.3', 'all' );
			}
			wp_enqueue_style( 'bootstrap-reboot', plugin_dir_url( __FILE__ ) . 'css/bootstrap-reboot.min.css', array(), '5.3.3', 'all' );
			wp_enqueue_style( 'bootstrap-utilities', plugin_dir_url( __FILE__ ) . 'css/bootstrap-utilities.min.css', array(), '5.3.3', 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ws-rescue-rover-pro-admin.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @author Louis <llister@wonkasoft.com>
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ws_Rescue_Rover_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ws_Rescue_Rover_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( get_current_screen()->base == 'ws_rescue_rover_page' || get_current_screen()->base == 'toplevel_page_ws_rescue_rover_page' ) {
			$bootstrapjs = 'bootstrap-js';
			if ( ! wp_script_is( $bootstrapjs, 'enqueued' ) && ! wp_script_is( $bootstrapjs, 'done' ) ) {
				// enqueue bootstrap js
				wp_enqueue_script( $bootstrapjs, plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), '5.3.3', true );
			}
			wp_enqueue_script( 'bootstrap-bundle-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.bundle.min.js', array(), '5.3.3', true );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ws-rescue-rover-pro-admin.js', array( 'jquery' ), $this->version, false );
		}

	}

	public function create_admin_pages() {
		add_menu_page( 'WS Rescue Rover Pro', 'WS Rescue Rover Pro', 'manage_options', 'ws_rescue_rover_page', array( $this, 'ws_rescue_rover_admin_page' ), 'dashicons-pets', 2 );
		add_menu_page( 'Dogs Menu', 'Dogs Menu', 'manage_options', 'ws_dogs_page', array( $this, 'ws_rescue_rover_dogs_page' ), 'dashicons-pets', 3 );
		add_menu_page( 'People Menu', 'People Menu', 'manage_options', 'ws_people_page', array( $this, 'ws_rescue_rover_people_page' ), 'dashicons-pets', 4 );
		add_menu_page( 'Reports Menu', 'Reports Menu', 'manage_options', 'ws_reports_page', array( $this, 'ws_rescue_rover_reports_page' ), 'dashicons-pets', 4 );
	}

	public function ws_rescue_rover_admin_page() {
		include plugin_dir_path( __FILE__ ) . 'pages/rescue-rover-main-page.php';
	}


	public function ws_rescue_rover_dogs_page() {
		include plugin_dir_path( __FILE__ ) . 'pages/dogs-page.php';
	}


	public function ws_rescue_rover_people_page() {
		include plugin_dir_path( __FILE__ ) . 'pages/people-page.php';
	}


	public function ws_rescue_rover_reports_page() {
		include plugin_dir_path( __FILE__ ) . 'pages/reports-page.php';
	}


}
