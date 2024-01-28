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
        register_post_type( 'dogs', $args );

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
           
         if  ( 'dogs' == $screen->post_type ) {
              $title = 'Enter Animal Name';
         }

         if  ( 'foster_app' == $screen->post_type ) {
              $title = 'Enter Name For Application';
         }

        return $title;
    }

    function display_initial_data_meta_box() {
        add_meta_box(
            '_dog_meta_box',
            'Dog Data',
            array( $this, 'display_initial_data_content' ),
            'dogs',
            'normal',
            'high'
        );
    }

    function display_initial_data_content($post) {
        $fields_for_dog_data = $this->get_dog_data_fields();

        foreach ( $fields_for_dog_data as $key => $value ) {
            $current_meta = get_post_meta($post->ID, '_dog_' . $value['label'], true);

            switch ( $value['field_type'] ) {
                case 'select':
                    echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                            <label for="_dog_' . $value['label'] . '" class="col-form-label">' . $value['title'] . '</label>
                          </div>
                          <select class="form-select" name="_dog_' . $value['label'] . '" aria-label="_dog_' . $value['label'] . '">';
                            echo '<option value="">Select Sex</option>';
                        foreach( $value['options'] as $opt ) {
                            echo '<option value="' . $opt . '"' . ( ( $opt == $current_meta ) ? " Selected": "" ) . '>' . $opt . '</option>';
                        }
                    echo '</select>
                        </div>';
                    break;
                default:
                    echo '<div class="row g-3 align-items-center">
                          <div class="col-auto">
                            <label for="_dog_' . $value['label'] . '" class="col-form-label">' . $value['title'] . '</label>
                          </div>
                          <div class="col-auto">
                            <input type="text" id="_dog_' . $value['label'] . '" name="_dog_' . $value['label']. '" class="form-control" value="' . ((! empty($current_meta) ) ? $current_meta: "" ) . '">
                          </div>
                        </div>';
            }
            
        }

            
    }

    function update_rescue_metadata( $post_id ) {
        if ( 'dogs' == get_post_type() ) {
            $fields_for_dog_data = $this->get_dog_data_fields();
            foreach ( $fields_for_dog_data as $value ) {
                update_post_meta( $post_id, '_dog_' . $value['label'], $_POST['_dog_' . $value['label'] ] );
            }
        }
    }

    function get_dog_data_fields() {
        return array(
            array( 
                'label' => 'other_names',
                'title' => 'Other Names',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'profile',
                'title' => 'Profile',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'status',
                'title' => 'Status',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'sex',
                'title' => 'Sex',
                'field_type' => 'select',
                'options' => array( 'M', 'F'),
            ),
            array( 
                'label' => 'video',
                'title' => 'Video',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'video_URL',
                'title' => 'Video URL',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'foster_needed',
                'title' => 'Foster Needed',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'sponsored_by',
                'title' => 'Sponsored By',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'long_desc',
                'title' => 'Long Description',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'date_adopted',
                'title' => 'Date Adopted',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'priBreed',
                'title' => 'Primary Breed',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'age',
                'title' => 'Age',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'okwithdogs',
                'title' => 'Ok With Dogs',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'okwithcats',
                'title' => 'Ok With Cats',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'okwithkids',
                'title' => 'Ok With Kids',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'housebroken',
                'title' => 'House Broken',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'specialNeeds',
                'title' => 'Special Needs',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'size',
                'title' => 'Size',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'shots',
                'title' => 'Shots',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'color',
                'title' => 'Color',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'coatLength',
                'title' => 'Coat Length',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'incoming_info',
                'title' => 'Incoming Info',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'incoming_date',
                'title' => 'Incoming Date',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'location_type',
                'title' => 'Location Type',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'location',
                'title' => 'Location',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'rabies',
                'title' => 'Rabies',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'rabies_time',
                'title' => 'Rabies Time',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'DHLPP',
                'title' => 'DHLPP',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'DHLPP_time',
                'title' => 'DHLPP Time',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'bord',
                'title' => 'Bord',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'bord_time',
                'title' => 'Bord Time',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'flea_tick',
                'title' => 'Flea Tick',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'worm',
                'title' => 'Worm',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'flu',
                'title' => 'Flu',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'flu_type',
                'title' => 'Flu Type',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'microchip',
                'title' => 'Microchip',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'impound_num',
                'title' => 'Impound Number',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'fixed',
                'title' => 'Fixed',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'notes',
                'title' => 'Notes',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'litter',
                'title' => 'Litter',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'litter_notes',
                'title' => 'Litter Notes',
                'field_type' => 'text',
            ),
            array( 
                'label' => 'vol_contact',
                'title' => 'Vol Contact',
                'field_type' => 'text',
            ),
        );
    }

}
