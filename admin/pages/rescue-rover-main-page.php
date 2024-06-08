<?php

/**
 * Provide a admin-facing view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Ws_Rescue_Rover_Pro
 * @subpackage Ws_Rescue_Rover_Pro/public/partials
 */
?>
<div class="container-fluid d-flex flex-column">
<div class="row">
<nav class="nav justify-content-center bg-dark">
  <a class="nav-link text-light" href="#">Dog Menu</a>
  <a class="nav-link text-light" href="#">People Menu</a>
  <a class="nav-link text-light" href="#">Reports Menu</a>
</nav>
</div>
<div class="row">
  <div class="col d-flex justify-content-center">
<div class="card" style="width: 20rem;">
  <img src="https://meredith.nhcrafts.org/wp-content/uploads/dog-placeholder.jpg" class="card-img-top" alt="Header-Image">
  <div class="card-body d-flex flex-column justify-content-between">
	<h5 class="card-title">Dogs</h5>
	<p class="card-text">Dogs Menu: Explore our canine companions at Coastal Vets, browse available dogs and puppy litters, arrange boarding, or locate shelters for adoption opportunities.</p>
	<a href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_dogs_page' ), null, 'display' ); ?>" class="btn btn-danger">Go To Dog Menu</a>
  </div> <!-- end of card-body -->
</div> <!-- end of card -->
</div> <!-- end of col -->
  <div class="col d-flex justify-content-center">
<div class="card" style="width: 20rem;">
  <img src="https://t3.ftcdn.net/jpg/02/33/46/24/360_F_233462402_Fx1yke4ng4GA8TJikJZoiATrkncvW6Ib.jpg" class="card-img-top" alt="Header-Image">
  <div class="card-body d-flex flex-column justify-content-between">
  <h5 class="card-title">People</h5>
  <p class="card-text">People Menu: Engage with our community of adopters, fosters, and volunteers by reviewing applications, managing placements, and tracking volunteer activities.</p>
  <a href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_people_page' ), null, 'display' ); ?>" class="btn btn-danger">Go To People Menu</a>
  </div> <!-- end of card-body -->
</div> <!-- end of card -->
</div> <!-- end of col -->
  <div class="col d-flex justify-content-center">
<div class="card" style="width: 20rem;">
  <img src="https://img.freepik.com/free-vector/document-vector-colorful-design_341269-1262.jpg?size=626&ext=jpg" class="card-img-top" alt="Header-Image">
  <div class="card-body d-flex flex-column justify-content-between">
  <h5 class="card-title">Reports</h5>
  <p class="card-text">Reports Menu: Access comprehensive reports including donation records, event and shelter rosters, monthly totals, and bios of available dogs, ensuring transparent and efficient management of our organization's operations.</p>
  <button href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_reports_page' ), null, 'display' ); ?>" class="btn d-block btn-primary">Go To Reports Menu</button>
  </div> <!-- end of card-body -->
</div> <!-- end of card -->
</div> <!-- end of col -->
</div> <!-- end of row -->
<div class="row make-bottom">
  <div class="col">
  <figure class="text-end">
  <blockquote class="blockquote">
  <p>Welcome to WSRescueRoverPro, your all-in-one solution for managing dog rescue operations seamlessly. From tracking dogs entering your care to overseeing their adoption journey, our plugin simplifies the process with intuitive features. Effortlessly manage sponsorship programs and track donations, ensuring transparency and accountability every step of the way. With WSRescueRoverPro, focus on what matters most – saving and improving the lives of dogs in need. Welcome aboard, and let's make a difference together, one wagging tail at a time.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
  Designed by <cite title="Source Title">Louis</cite>
  </figcaption>
</figure>
  </div>
</div>
</div> <!-- end of container -->
