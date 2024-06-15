<?php


?>


<div class="container-fluid">
	<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="collapse navbar-collapse navbar-nav justify-content-evenly ms-auto me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                              <a class="nav-link" href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_dogs_page' ), null, 'display' ); ?>">Dog Menu</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_people_page' ), null, 'display' ); ?>">People Menu</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="<?php echo esc_url( get_admin_url( null, 'admin.php?page=ws_reports_page' ), null, 'display' ); ?>">Reports Menu</a>
                        </li>
                  </ul>
            </div>
            </div>
      </nav>
	<div class="row">
            <div class="col">
                  <h3 class="mt-3 mb-3">Adopters</h3>
                  <hr />
            </div>
      </div>
      <div class="row">
            <div class="col">
                  <div class="dropdown d-flex align-items-center justify-content-end">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown link
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                        <form class="ms-2 me-2" role="search">
                          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                  </div>
                  <table class="table table-striped">
                        <thead>
                              <tr>
                                    <th scope="col"><input type="checkbox" aria-label="Checkbox for select all"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Locations</th>
                                    <th scope="col">Microchip</th>
                              </tr>
                        </thead>
                        <tbody>
                              <tr>
                                    <th scope="row"><input type="checkbox" aria-label="Checkbox for following row"></th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Always</td>
                              </tr>
                              <tr>
                                    <th scope="row"><input type="checkbox" aria-label="Checkbox for following row"></th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>Always</td>
                              </tr>
                              <tr>
                                    <th scope="row"><input type="checkbox" aria-label="Checkbox for following row"></th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>Always</td>
                              </tr>
                        </tbody>
                  </table>
                  <nav aria-label="Page navigation bg-dark" data-bs-theme="dark">
                    <ul class="pagination justify-content-end">
                      <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
            </div>
      </div>
</div>
