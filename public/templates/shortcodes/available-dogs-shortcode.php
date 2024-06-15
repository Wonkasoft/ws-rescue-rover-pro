<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link  https://wonkasoft.com
 * @since 1.0.0
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

 $all_dogs = get_dogs_from_database();
?>
<div class="container-fluid dogs-shortcode">
	<div class="row page-title-row">
		<div class="col text-center">
			<h3>Available Dogs</h3>
			<h4>Last updated ( <?php echo date( 'm-d-Y' ); ?> )</h4>
		</div>
	</div>
	<?php
	if ( $atts['category'] === 'all' ) {
		// Group dogs by category
		foreach ( $all_dogs as $category => $dogs ) {
			?>
			<div class="row banner-row">
				<div class="col text-center">
					<h4>Available <?php echo ucfirst( get_display_category( $category ) ); ?>!</h4>
				</div>
			</div>
			<?php
			$count = 0;
			foreach ( $dogs as $dog ) {
				if ( $count % 6 === 0 ) {
					echo '<div class="row dogs-row">';
				}
				?>
				<div class="col-md-2">
					<div class="card dogs-card">
						<h4><?php echo esc_html( $dog['name'] ); ?></h4>
						<h5><?php echo esc_html( ( $dog['sex'] == 'M' ) ? 'Male' : 'Female' ); ?>, <?php echo esc_html( $dog['age'] ); ?></h5>
						<div class="card-body">
							<ul class="list-group list-group-horizontal">
								<li class="list-group-item"><a href="#">Sponsor Me</a></li>
								<li class="list-group-item"><a href="#">I'm Fostered</a></li>
								<li class="list-group-item"><a href="#">Adopt Me</a></li>
							</ul>
						</div>
					</div>
				</div>
				<?php
				$count++;
				if ( $count % 6 === 0 ) {
					echo '</div>'; // Close row after every 6 cards
				}
			}
			// Close row if the number of dogs isn't a perfect multiple of 6
			if ( $count % 6 !== 0 ) {
				echo '</div>';
			}
		}
	} else {
		// Filtered dogs for a specific category
		$filtered_dogs = array_filter(
			$all_dogs[ $atts['category'] ],
			function( $dog ) use ( $atts ) {
				return ! empty( $dog['name'] ) && ! empty( $dog['sex'] ) && ! empty( $dog['age'] );
			}
		);

		if ( ! empty( $filtered_dogs ) ) {
			?>
			<div class="row banner-row">
				<div class="col text-center">
					<h4>Available <?php echo ucfirst( get_display_category( $atts['category'] ) ); ?></h4>
				</div>
			</div>
			<?php
			$count = 0;
			foreach ( $filtered_dogs as $dog ) {
				if ( $count % 6 === 0 ) {
					echo '<div class="row dogs-row">';
				}
				?>
				<div class="col-md-2">
					<div class="card dogs-card">
						<h4><?php echo esc_html( $dog['name'] ); ?></h4>
						<h5><?php echo esc_html( ( $dog['sex'] == 'M' ) ? 'Male' : 'Female' ); ?>, <?php echo esc_html( $dog['age'] ); ?></h5>
						<div class="card-body">
							<ul class="list-group list-group-horizontal">
								<li class="list-group-item"><a href="#">Sponsor Me</a></li>
								<li class="list-group-item"><a href="#">I'm Fostered</a></li>
								<li class="list-group-item"><a href="#">Adopt Me</a></li>
							</ul>
						</div>
					</div>
				</div>
				<?php
				$count++;
				if ( $count % 6 === 0 ) {
					echo '</div>'; // Close row after every 6 cards
				}
			}
			// Close row if the number of dogs isn't a perfect multiple of 6
			if ( $count % 6 !== 0 ) {
				echo '</div>';
			}
		} else {
			echo '<p>No dogs available for this category.</p>';
		}
	}
	?>
</div>

<?php

function get_dogs_from_database() {
	global $wpdb;
	$table = $wpdb->base_prefix . 'ws_rescue_rover_pro_dogs';
	$query = "
        SELECT name, sex, age, category 
        FROM $table 
        WHERE (archived IS NULL OR archived = '')
        AND status != 'Adopted'
        AND category IS NOT NULL AND category != ''
    ";
	$results = $wpdb->get_results( $query );

	$dogs_by_category = array(
		'GSD' => array(),
		'babies' => array(),
		'Wannabees' => array(),
	);

	foreach ( $results as $dog ) {
		$dogs_by_category[ $dog->category ][] = array(
			'name' => $dog->name,
			'sex' => $dog->sex,
			'age' => $dog->age,
		);
	}

	return $dogs_by_category;
}

function get_display_category( $category ) {
	$category_map = array(
		'GSD' => 'German Shepherd',
		'babies' => 'Puppies',
		'Wannabees' => 'Wannabees',
	);

	return isset( $category_map[ $category ] ) ? $category_map[ $category ] : $category;
}
