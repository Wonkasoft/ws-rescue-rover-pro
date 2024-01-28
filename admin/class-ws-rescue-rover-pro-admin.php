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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ws-rescue-rover-pro-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ws-rescue-rover-pro-admin.js', array( 'jquery' ), $this->version, false );

	}

    // Register Custom Post Type
    function register_rescue_rover_post_types() {

        $labels = array(
            'name'                  => _x( 'Dogs', 'Post Type General Name', 'ws-rescue-rover-pro' ),
            'singular_name'         => _x( 'Dog', 'Post Type Singular Name', 'ws-rescue-rover-pro' ),
            'menu_name'             => __( 'Dogs', 'ws-rescue-rover-pro' ),
            'name_admin_bar'        => __( 'Dogs', 'ws-rescue-rover-pro' ),
            'archives'              => __( 'Dog Archives', 'ws-rescue-rover-pro' ),
            'attributes'            => __( 'Dog Attributes', 'ws-rescue-rover-pro' ),
            'parent_item_colon'     => __( 'Parent Dog:', 'ws-rescue-rover-pro' ),
            'all_items'             => __( 'All Dogs', 'ws-rescue-rover-pro' ),
            'add_new_item'          => __( 'Add New Dog', 'ws-rescue-rover-pro' ),
            'add_new'               => __( 'Add New Dog', 'ws-rescue-rover-pro' ),
            'new_item'              => __( 'New Dog', 'ws-rescue-rover-pro' ),
            'edit_item'             => __( 'Edit Dog', 'ws-rescue-rover-pro' ),
            'update_item'           => __( 'Update Dog', 'ws-rescue-rover-pro' ),
            'view_item'             => __( 'View Dog', 'ws-rescue-rover-pro' ),
            'view_items'            => __( 'View Dogs', 'ws-rescue-rover-pro' ),
            'search_items'          => __( 'Search Dog', 'ws-rescue-rover-pro' ),
            'not_found'             => __( 'Not found', 'ws-rescue-rover-pro' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'ws-rescue-rover-pro' ),
            'featured_image'        => __( 'Featured Image', 'ws-rescue-rover-pro' ),
            'set_featured_image'    => __( 'Set featured image', 'ws-rescue-rover-pro' ),
            'remove_featured_image' => __( 'Remove featured image', 'ws-rescue-rover-pro' ),
            'use_featured_image'    => __( 'Use as featured image', 'ws-rescue-rover-pro' ),
            'insert_into_item'      => __( 'Insert into Dog', 'ws-rescue-rover-pro' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Dog', 'ws-rescue-rover-pro' ),
            'items_list'            => __( 'Dogs list', 'ws-rescue-rover-pro' ),
            'items_list_navigation' => __( 'Dogs list navigation', 'ws-rescue-rover-pro' ),
            'filter_items_list'     => __( 'Filter Dogs list', 'ws-rescue-rover-pro' ),
        );
        $args = array(
            'label'                 => __( 'Dog', 'ws-rescue-rover-pro' ),
            'description'           => __( 'Animals for rescue dog', 'ws-rescue-rover-pro' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-pets',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        );
        register_post_type( 'dog_rescue', $args );

        $labels = array(
            'name'                  => _x( 'Foster Applications', 'Post Type General Name', 'ws-rescue-rover-pro' ),
            'singular_name'         => _x( 'Foster Application', 'Post Type Singular Name', 'ws-rescue-rover-pro' ),
            'menu_name'             => __( 'Foster Applications', 'ws-rescue-rover-pro' ),
            'name_admin_bar'        => __( 'Foster Applications', 'ws-rescue-rover-pro' ),
            'archives'              => __( 'Foster Application Archives', 'ws-rescue-rover-pro' ),
            'attributes'            => __( 'Foster Application Attributes', 'ws-rescue-rover-pro' ),
            'parent_item_colon'     => __( 'Parent Foster Application:', 'ws-rescue-rover-pro' ),
            'all_items'             => __( 'All Foster Applications', 'ws-rescue-rover-pro' ),
            'add_new_item'          => __( 'Add New Foster Application', 'ws-rescue-rover-pro' ),
            'add_new'               => __( 'Add New Application', 'ws-rescue-rover-pro' ),
            'new_item'              => __( 'New Foster Application', 'ws-rescue-rover-pro' ),
            'edit_item'             => __( 'Edit Foster Application', 'ws-rescue-rover-pro' ),
            'update_item'           => __( 'Update Foster Application', 'ws-rescue-rover-pro' ),
            'view_item'             => __( 'View Foster Application', 'ws-rescue-rover-pro' ),
            'view_items'            => __( 'View Foster Applications', 'ws-rescue-rover-pro' ),
            'search_items'          => __( 'Search Foster Application', 'ws-rescue-rover-pro' ),
            'not_found'             => __( 'Not found', 'ws-rescue-rover-pro' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'ws-rescue-rover-pro' ),
            'featured_image'        => __( 'Featured Image', 'ws-rescue-rover-pro' ),
            'set_featured_image'    => __( 'Set featured image', 'ws-rescue-rover-pro' ),
            'remove_featured_image' => __( 'Remove featured image', 'ws-rescue-rover-pro' ),
            'use_featured_image'    => __( 'Use as featured image', 'ws-rescue-rover-pro' ),
            'insert_into_item'      => __( 'Insert into Foster Application', 'ws-rescue-rover-pro' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Foster Application', 'ws-rescue-rover-pro' ),
            'items_list'            => __( 'Foster Applications list', 'ws-rescue-rover-pro' ),
            'items_list_navigation' => __( 'Foster Applications list navigation', 'ws-rescue-rover-pro' ),
            'filter_items_list'     => __( 'Filter Foster Applications list', 'ws-rescue-rover-pro' ),
        );
        $args = array(
            'label'                 => __( 'Foster Application', 'ws-rescue-rover-pro' ),
            'description'           => __( 'Foster applications for rescue', 'ws-rescue-rover-pro' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-id',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        );

        register_post_type( 'foster_app', $args );

    }

    /**
     * This changes the title placeholder for dog_rescue post type.
     * @param  [type] $title [description]
     * @return [type]        [description]
     */
    function render_rescue_pro_title_block_placeholder( $title ) {
        $screen = get_current_screen();
           
         if  ( 'dog_rescue' == $screen->post_type ) {
              $title = 'Enter Animal Name';
         }

         if  ( 'foster_app' == $screen->post_type ) {
              $title = 'Enter Name For Application';
         }

        return $title;
    }

    function display_initial_data_meta_box() {
        add_meta_box(
            'rescue_data_meta_box',
            'Rescue Data',
            array( $this, 'display_initial_data_content' ),
            'dog_rescue',
            'normal',
            'high'
        );
    }

    function display_initial_data_content($post) {
        $dog_age = get_post_meta($post->ID, '_dog_age', true);
        echo "<pre>\n";
        print_r( $dog_age );
        echo "</pre>\n";
        
            
        echo '<div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="_dog_age" class="col-form-label">Age</label>
              </div>
              <div class="col-auto">
                <input type="text" id="_dog_age" class="form-control" value="' . ((! empty($dog_age) ) ? $dog_age: "" ) . '">
              </div>
            </div>';
    }


}
