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
<div class="container-fluid">
	<div class="row">
		<div class="col text-center">
			<h3>Available Dogs</h3>
			<h4>last updated ( <?php echo date('m-d-Y');?> )</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-12 text-center">

	<div class="card">
      <div class="card-body">
        <h5 class="card-title">Available Puppies</h5>
        <p class="card-text">(dogs under 1 year old)</p>
      </div>
    </div>
		</div>
	</div>


	<div class="row">
		<div class="col">
			<h4>Name of Dog</h4>
			<h5>Sex, Age: Months/Years</h5>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card" style="width: 18rem;">
				<img src="https://coastalgsr.org/graphics/thumbnails/22652.jpg" class="card-img-top" alt="dog-image">
				<div class="card-body">
					<ul>
						<li><a href="#">Sponsor Me</a></li>
						<li><a href="#">I'm Fostered</a></li>
						<li><a href="#">Adopt Me</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<div class="row">
		<div class="col text-center">
			<h4>Available German Shepherd Dogs</h4>
		</div>
	</div>

	<div class="row">
		<div class="col text-center">
			<h4>Name of Dog</h4>
			<h5>Sex, Age: Months/Years</h5>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card" style="width: 18rem;">
				<img src="https://coastalgsr.org/graphics/thumbnails/22552.jpg" class="card-img-top" alt="dog-image">
				<div class="card-body">
					<ul>
						<li><a href="#">Sponsor Me</a></li>
						<li><a href="#">I'm Fostered</a></li>
						<li><a href="#">Adopt Me</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<div class="row">
		<div class="col text-center">
			<h4>Available GSD Wannabees!</h4>
		</div>
	</div>


<div class="row text-center">
		<div class="col">
			<h4>Name of Dog</h4>
			<h5>Sex, Age: Months/Years</h5>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card" style="width: 18rem;">
				<img src="https://coastalgsr.org/graphics/thumbnails/21954.jpg" class="card-img-top" alt="dog-image">
				<div class="card-body">
					<ul>
						<li><a href="#">Sponsor Me</a></li>
						<li><a href="#">I'm Fostered</a></li>
						<li><a href="#">Adopt Me</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


</div>
<?php
$output = ob_get_clean();
?>