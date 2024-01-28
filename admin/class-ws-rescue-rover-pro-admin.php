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

		$custom_post_types = array(
			'dogs' => array(
				'single' => 'Dog',
				'plural' => 'Dogs',
				'menu_icon' => 'dashicons-pets',
				'description' => 'Contains Dogs for Rescue',
			),
			'puppy_litters' => array(
				'single' => 'Litter',
				'plural' => 'Litters',
				'menu_icon' => 'dashicons-buddicons-community',
				'description' => 'Contains current Litters',
			),
			'coastal_vets' => array(
				'single' => 'Coastal Vet',
				'plural' => 'Coastal Vets',
				'menu_icon' => 'dashicons-location-alt',
				'description' => 'Contains Coastal Vets',
			),
			'coastal_boarding' => array(
				'single' => 'Coastal Boarding',
				'plural' => 'Coastal Boardings',
				'menu_icon' => 'dashicons-nametag',
				'description' => 'Contains Coastal Boarding',
			),
			'shelters' => array(
				'single' => 'Shelter',
				'plural' => 'Shelters',
				'menu_icon' => 'dashicons-building',
				'description' => 'Contains Shelters',
			),
			'adopter' => array(
				'single' => 'Adopter',
				'plural' => 'Adopters',
				'menu_icon' => 'dashicons-universal-access',
				'description' => 'Contains Adopters',
			),
			'adopter_apps' => array(
				'single' => 'Adopter Application',
				'plural' => 'Adopter Applications',
				'menu_icon' => 'dashicons-list-view',
				'description' => 'Contains Adopters',
			),
			'foster' => array(
				'single' => 'Foster',
				'plural' => 'Fosters',
				'menu_icon' => 'dashicons-groups',
				'description' => 'Contains Adopters',
			),
			'foster_apps' => array(
				'single' => 'Foster Application',
				'plural' => 'Foster Applications',
				'menu_icon' => 'dashicons-list-view',
				'description' => 'Contains Adopters',
			),
			'volunteers' => array(
				'single' => 'Volunteer',
				'plural' => 'Volunteers',
				'menu_icon' => 'dashicons-universal-access-alt',
				'description' => 'Contains Adopters',
			),
			'volunteer_apps' => array(
				'single' => 'Volunteer Application',
				'plural' => 'Volunteer Applications',
				'menu_icon' => 'dashicons-list-view',
				'description' => 'Contains Adopters',
			),
			'other_declines' => array(
				'single' => 'Other Decline',
				'plural' => 'Other Declines',
				'menu_icon' => 'dashicons-feedback',
				'description' => 'Contains Adopters',
			),
		);

		$custom_post_type_index = 10;
		foreach ( $custom_post_types as $key => $value ) {
				$labels = array(
					'name'                  => _x( $value['plural'], 'Post Type General Name', 'ws-rescue-rover-pro' ),
					'singular_name'         => _x( $value['single'], 'Post Type Singular Name', 'ws-rescue-rover-pro' ),
					'menu_name'             => __( $value['plural'], 'ws-rescue-rover-pro' ),
					'name_admin_bar'        => __( $value['plural'], 'ws-rescue-rover-pro' ),
					'archives'              => __( $value['single'] . ' Archives', 'ws-rescue-rover-pro' ),
					'attributes'            => __( $value['single'] . ' Attributes', 'ws-rescue-rover-pro' ),
					'parent_item_colon'     => __( 'Parent ' . $value['single'] . ' :', 'ws-rescue-rover-pro' ),
					'all_items'             => __( 'All ' . $value['plural'], 'ws-rescue-rover-pro' ),
					'add_new_item'          => __( 'Add New ' . $value['single'], 'ws-rescue-rover-pro' ),
					'add_new'               => __( 'Add New ' . $value['single'], 'ws-rescue-rover-pro' ),
					'new_item'              => __( 'New ' . $value['single'], 'ws-rescue-rover-pro' ),
					'edit_item'             => __( 'Edit ' . $value['single'], 'ws-rescue-rover-pro' ),
					'update_item'           => __( 'Update ' . $value['single'], 'ws-rescue-rover-pro' ),
					'view_item'             => __( 'View ' . $value['single'], 'ws-rescue-rover-pro' ),
					'view_items'            => __( 'View ' . $value['plural'], 'ws-rescue-rover-pro' ),
					'search_items'          => __( 'Search ' . $value['single'], 'ws-rescue-rover-pro' ),
					'not_found'             => __( 'Not found', 'ws-rescue-rover-pro' ),
					'not_found_in_trash'    => __( 'Not found in Trash', 'ws-rescue-rover-pro' ),
					'featured_image'        => __( 'Featured Image', 'ws-rescue-rover-pro' ),
					'set_featured_image'    => __( 'Set featured image', 'ws-rescue-rover-pro' ),
					'remove_featured_image' => __( 'Remove featured image', 'ws-rescue-rover-pro' ),
					'use_featured_image'    => __( 'Use as featured image', 'ws-rescue-rover-pro' ),
					'insert_into_item'      => __( 'Insert into ' . $value['single'], 'ws-rescue-rover-pro' ),
					'uploaded_to_this_item' => __( 'Uploaded to this ' . $value['single'], 'ws-rescue-rover-pro' ),
					'items_list'            => __( $value['plural'] . ' list', 'ws-rescue-rover-pro' ),
					'items_list_navigation' => __( $value['plural'] . ' list navigation', 'ws-rescue-rover-pro' ),
					'filter_items_list'     => __( 'Filter ' . $value['plural'] . '  list', 'ws-rescue-rover-pro' ),
				);
				$args = array(
					'label'                 => __( $value['single'], 'ws-rescue-rover-pro' ),
					'description'           => __( $value['description'], 'ws-rescue-rover-pro' ),
					'labels'                => $labels,
					'supports'              => array( 'title', 'thumbnail' ),
					'hierarchical'          => true,
					'public'                => true,
					'show_ui'               => true,
					'show_in_menu'          => true,
					'menu_position'         => $custom_post_type_index,
					'menu_icon'             => $value['menu_icon'],
					'show_in_admin_bar'     => true,
					'show_in_nav_menus'     => true,
					'can_export'            => true,
					'has_archive'           => true,
					'exclude_from_search'   => false,
					'publicly_queryable'    => true,
					'capability_type'       => 'post',
					'show_in_rest'          => true,
				);
				register_post_type( $key, $args );
				$custom_post_type_index++;
		}

	}

	/**
	 * This changes the title placeholder for dog_rescue post type.
	 *
	 * @param  [type] $title [description]
	 * @return [type]        [description]
	 */
	function render_rescue_pro_title_block_placeholder( $title ) {
		$screen = get_current_screen();

		if ( 'dogs' == $screen->post_type ) {
			$title = 'Enter Dog Name';
		}

		if ( 'foster_app' == $screen->post_type ) {
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

	function display_initial_data_content( $post ) {
		$fields_for_dog_data = $this->get_dog_data_fields();

		$count_all = sizeof( $fields_for_dog_data );
		$current_count = 0;
		foreach ( $fields_for_dog_data as $key => $value ) {
			$current_count++;
			$current_meta = get_post_meta( $post->ID, '_dog_' . $value['label'], true );
			if ( $current_count == 1 ) {
				echo '<div class="row g-3 align-items-center">';
			}

			switch ( $value['field_type'] ) {
				case 'select':
					echo '<div class="col-auto">
                            <label for="_dog_' . $value['label'] . '" class="col-form-label">' . $value['title'] . '</label>
                          </div>
                          <select class="form-select" name="_dog_' . $value['label'] . '" aria-label="_dog_' . $value['label'] . '">';
							echo '<option value="">Select Sex</option>';
					foreach ( $value['options'] as $opt ) {
						echo '<option value="' . $opt . '"' . ( ( $opt == $current_meta ) ? ' Selected' : '' ) . '>' . $opt . '</option>';
					}
					echo '</select>';
					break;
				default:
					echo '<div class="col-auto">
                            <label for="_dog_' . $value['label'] . '" class="col-form-label">' . $value['title'] . '</label>
                          </div>
                          <div class="col-auto">
                            <input type="text" id="_dog_' . $value['label'] . '" name="_dog_' . $value['label'] . '" class="form-control" value="' . ( ( ! empty( $current_meta ) ) ? $current_meta : '' ) . '">
                          </div>';
			}

			if ( $current_count % 3 === 0 ) {
				echo '</div>
                    <div class="row g-3 align-items-center">';
			}

			if ( $current_count === $count_all ) {
				echo '</div>';
			}
		}

	}

	function update_rescue_metadata( $post_id ) {
		if ( 'dogs' == get_post_type() ) {
			$fields_for_dog_data = $this->get_dog_data_fields();
			foreach ( $fields_for_dog_data as $value ) {
				update_post_meta( $post_id, '_dog_' . $value['label'], $_POST[ '_dog_' . $value['label'] ] );
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
				'options' => array( 'M', 'F' ),
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
