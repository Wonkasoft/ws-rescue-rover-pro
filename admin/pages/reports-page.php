<?php


?>


<div class="container-fluid">
	<nav class="navbar navbar-expand-lg bg-dark"  data-bs-theme="dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="collapse navbar-collapse navbar-nav justify-content-evenly ms-auto me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                              <a class="nav-link" href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_dogs_page' ), null, 'display' ); ?>">Dog Menu</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_people_page' ), null, 'display' ); ?>">People Menu</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_reports_page' ), null, 'display' ); ?>">Reports Menu</a>
                        </li>
                  </ul>
            </div>
            </div>
      </nav>
	<div class="row">
		<div class="col">
<form>
  <div class="mb-3">
	<label for="exampleInputEmail1" class="form-label">Email address</label>
	<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
	<label for="exampleInputPassword1" class="form-label">Password</label>
	<input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
	<input type="checkbox" class="form-check-input" id="exampleCheck1">
	<label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
