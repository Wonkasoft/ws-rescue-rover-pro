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

ob_start();
?>
<div class="container-fluid dogs-shortcode">
	<div class="row page-title-row">
		<div class="col text-center">
			<h3>Available Dogs</h3>
			<h4>last updated ( <?php echo date('m-d-Y');?> )</h4>
		</div>
	</div>
	<div class="row banner-row">
		<div class="col-12 text-center">
	        <h5 class="card-title">Available Puppies</h5>
	        <p class="card-text">(dogs under 1 year old)</p>
	    </div>
	</div>

	<div class="row dogs-row">
		<div class="col">
			<div class="card dogs-card">
				<h4>Name of Dog</h4>
				<h5>Sex, Age: Months/Years</h5>
				<img src="https://coastalgsr.org/graphics/thumbnails/22652.jpg" class="card-img-top" alt="dog-image">
				<div class="card-body">
					<ul class="list-group list-group-horizontal">
						<li class="list-group-item"><a href="#">Sponsor Me</a></li>
						<li class="list-group-item"><a href="#">I'm Fostered</a></li>
						<li class="list-group-item"><a href="#">Adopt Me</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<div class="row banner-row">
		<div class="col text-center">
			<h4>Available German Shepherd Dogs</h4>
		</div>
	</div>

	<div class="row dogs-row">
		<div class="col">
			<div class="card dogs-card">
				<h4>Name of Dog</h4>
				<h5>Sex, Age: Months/Years</h5>
				<img src="https://coastalgsr.org/graphics/thumbnails/22552.jpg" class="card-img-top" alt="dog-image">
				<div class="card-body">
					<ul class="list-group list-group-horizontal">
						<li class="list-group-item"><a href="#">Sponsor Me</a></li>
						<li class="list-group-item"><a href="#">I'm Fostered</a></li>
						<li class="list-group-item"><a href="#">Adopt Me</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<!-- Good mockup for loop -->
<div class="row banner-row">
		<div class="col text-center">
			<h4>Available GSD Wannabees!</h4>
		</div>
	</div>

<div class="row dogs-row">
	<div class="col">
		<div class="card dogs-card">
			<h4>Name of Dog</h4>
			<h5>Sex, Age: Months/Years</h5>
			<img src="https://coastalgsr.org/graphics/thumbnails/21954.jpg" class="card-img-top" alt="dog-image">
			<div class="card-body">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item"><a href="#">Sponsor Me</a></li>
					<li class="list-group-item"><a href="#">I'm Fostered</a></li>
					<li class="list-group-item"><a href="#">Adopt Me</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- END Good mockup for loop -->

</div>
<?php
$output = ob_get_clean();
?>