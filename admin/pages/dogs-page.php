<?php
// Include the DogModel class
require_once plugin_dir_path(__FILE__) . 'dog-model.php';

// Create a new instance of the DogModel
$dog = new DogModel();

// Fetch all dogs from the database
global $wpdb;

$table_name = $wpdb->prefix . 'ws_rescue_rover_pro_dogs';
$dogs = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A); // Fetch as an array for JSON encoding

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_dog'])) {
    global $wpdb;

    $table_name = $wpdb->prefix . 'ws_rescue_rover_pro_dogs';

    // Sanitize and prepare all input fields
    $data = [
        'archived' => isset($_POST['archived']) ? sanitize_text_field($_POST['archived']) : '',
        'name' => isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '',
        'other_names' => isset($_POST['other_names']) ? sanitize_text_field($_POST['other_names']) : '',
        'profile' => isset($_POST['profile']) ? esc_url_raw($_POST['profile']) : '',
        'status' => isset($_POST['status']) ? sanitize_text_field($_POST['status']) : '',
        'adoption_pending' => isset($_POST['adoption_pending']) ? sanitize_text_field($_POST['adoption_pending']) : '',
        'sex' => isset($_POST['sex']) ? sanitize_text_field($_POST['sex']) : '',
        'video' => isset($_POST['video']) ? sanitize_text_field($_POST['video']) : '',
        'video_URL' => isset($_POST['video_URL']) ? esc_url_raw($_POST['video_URL']) : '',
        'category' => isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '',
        'foster_needed' => isset($_POST['foster_needed']) ? sanitize_text_field($_POST['foster_needed']) : '',
        'sponsored_by' => isset($_POST['sponsored_by']) ? sanitize_text_field($_POST['sponsored_by']) : '',
        'short_desc' => isset($_POST['short_desc']) ? sanitize_textarea_field($_POST['short_desc']) : '',
        'long_desc' => isset($_POST['long_desc']) ? sanitize_textarea_field($_POST['long_desc']) : '',
        'date_adopted' => isset($_POST['date_adopted']) ? sanitize_text_field($_POST['date_adopted']) : '',
        'priBreed' => isset($_POST['priBreed']) ? sanitize_text_field($_POST['priBreed']) : '',
        'secBreed' => isset($_POST['secBreed']) ? sanitize_text_field($_POST['secBreed']) : '',
        'age' => isset($_POST['age']) ? intval($_POST['age']) : 0,
        'okwithdogs' => isset($_POST['okwithdogs']) ? sanitize_text_field($_POST['okwithdogs']) : '',
        'okwithcats' => isset($_POST['okwithcats']) ? sanitize_text_field($_POST['okwithcats']) : '',
        'okwithkids' => isset($_POST['okwithkids']) ? sanitize_text_field($_POST['okwithkids']) : '',
        'housebroken' => isset($_POST['housebroken']) ? sanitize_text_field($_POST['housebroken']) : '',
        'specialNeeds' => isset($_POST['specialNeeds']) ? sanitize_text_field($_POST['specialNeeds']) : '',
        'size' => isset($_POST['size']) ? sanitize_text_field($_POST['size']) : '',
        'shots' => isset($_POST['shots']) ? sanitize_text_field($_POST['shots']) : '',
        'color' => isset($_POST['color']) ? sanitize_text_field($_POST['color']) : '',
        'coatLength' => isset($_POST['coatLength']) ? sanitize_text_field($_POST['coatLength']) : '',
        'incoming_info' => isset($_POST['incoming_info']) ? sanitize_text_field($_POST['incoming_info']) : '',
        'incoming_date' => isset($_POST['incoming_date']) ? sanitize_text_field($_POST['incoming_date']) : '',
        'location_type' => isset($_POST['location_type']) ? sanitize_text_field($_POST['location_type']) : '',
        'location' => isset($_POST['location']) ? sanitize_text_field($_POST['location']) : '',
        'rabies' => isset($_POST['rabies']) ? sanitize_text_field($_POST['rabies']) : '',
        'rabies_time' => isset($_POST['rabies_time']) ? sanitize_text_field($_POST['rabies_time']) : '',
        'DHLPP' => isset($_POST['DHLPP']) ? sanitize_text_field($_POST['DHLPP']) : '',
        'DHLPP_time' => isset($_POST['DHLPP_time']) ? sanitize_text_field($_POST['DHLPP_time']) : '',
        'bord' => isset($_POST['bord']) ? sanitize_text_field($_POST['bord']) : '',
        'bord_time' => isset($_POST['bord_time']) ? sanitize_text_field($_POST['bord_time']) : '',
        'flea_tick' => isset($_POST['flea_tick']) ? sanitize_text_field($_POST['flea_tick']) : '',
        'worm' => isset($_POST['worm']) ? sanitize_text_field($_POST['worm']) : '',
        'flu' => isset($_POST['flu']) ? sanitize_text_field($_POST['flu']) : '',
        'flu_type' => isset($_POST['flu_type']) ? sanitize_text_field($_POST['flu_type']) : '',
        'microchip' => isset($_POST['microchip']) ? sanitize_text_field($_POST['microchip']) : '',
        'impound_num' => isset($_POST['impound_num']) ? sanitize_text_field($_POST['impound_num']) : '',
        'fixed' => isset($_POST['fixed']) ? sanitize_text_field($_POST['fixed']) : '',
        'notes' => isset($_POST['notes']) ? sanitize_text_field($_POST['notes']) : '',
        'litter' => isset($_POST['litter']) ? sanitize_text_field($_POST['litter']) : '',
        'litter_notes' => isset($_POST['litter_notes']) ? sanitize_text_field($_POST['litter_notes']) : '',
        'vol_contact' => isset($_POST['vol_contact']) ? sanitize_text_field($_POST['vol_contact']) : '',
    ];

    // Insert data into the database
    $result = $wpdb->insert($table_name, $data);

    if ($result === false) {
        // Log the database error for debugging
        error_log("Database Insert Error: " . $wpdb->last_error);
        echo "<div class='alert alert-danger'>Error: Could not add the dog. Check logs for details.</div>";
    } else {
        wp_redirect($_SERVER['REQUEST_URI']);
        exit;
    }
}



?>
<div class="container-fluid d-flex flex-column">
<div class="row">
<nav class="nav justify-content-center bg-dark">
  <a class="nav-link text-light" href="<?php echo esc_url(get_admin_url(null, 'admin.php?page=ws_dogs_page')); ?>">Dog Menu</a>
  <a class="nav-link text-light" href="<?php echo esc_url(get_admin_url(null, 'admin.php?page=ws_people_page')); ?>">People Menu</a>
  <a class="nav-link text-light" href="<?php echo esc_url(get_admin_url(null, 'admin.php?page=ws_reports_page')); ?>">Reports Menu</a>
</nav>
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="dogTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab">Dog List</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab">Add New Dog</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">Dog Details</button>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="list" role="tabpanel">
            <h3>Dog List</h3>
            <input type="text" id="searchInput" class="form-control w-25 mb-3" placeholder="Search Dogs...">
            <table class="table table-striped" id="dogTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Age</th>
                        <th>Location</th>
                        <th>Microchip</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody> <!-- Table body populated by JavaScript -->
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pagination"></ul>
            </nav>
        </div>

        <div class="tab-pane fade" id="add" role="tabpanel">
    <h3>Add New Dog</h3>
    <form method="POST" id="add-dog-form">
        <div class="row mb-3">
            <div class="col">
                <label for="archived" class="form-label">Archived</label>
                <select class="form-select" id="archived" name="archived">
                    <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
            </div>
            <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col">
                <label for="other_names" class="form-label">Other Names</label>
                <input type="text" class="form-control" id="other_names" name="other_names">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="profile" class="form-label">Profile URL</label>
                <input type="url" class="form-control" id="profile" name="profile">
            </div>
            <div class="col">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Available">Available</option>
                    <option value="Adopted">Adopted</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>
            <div class="col">
                <label for="adoption_pending" class="form-label">Adoption Pending</label>
                <select class="form-select" id="adoption_pending" name="adoption_pending">
                    <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="video" class="form-label">Video</label>
                <input type="text" class="form-control" id="video" name="video">
            </div>
            <div class="col">
                <label for="video_URL" class="form-label">Video URL</label>
                <input type="url" class="form-control" id="video_URL" name="video_URL">
            </div>
            <div class="col">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="foster_needed" class="form-label">Foster Needed</label>
                <select class="form-select" id="foster_needed" name="foster_needed">
                    <option value="Yes">Yes</option>
                    <option value="No" selected>No</option>
                </select>
            </div>
            <div class="col">
                <label for="sponsored_by" class="form-label">Sponsored By</label>
                <input type="text" class="form-control" id="sponsored_by" name="sponsored_by">
            </div>
            <div class="col">
                <label for="date_adopted" class="form-label">Date Adopted</label>
                <input type="date" class="form-control" id="date_adopted" name="date_adopted">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="priBreed" class="form-label">Primary Breed</label>
                <input type="text" class="form-control" id="priBreed" name="priBreed">
            </div>
            <div class="col">
                <label for="secBreed" class="form-label">Secondary Breed</label>
                <input type="text" class="form-control" id="secBreed" name="secBreed">
            </div>
            <div class="col">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="okwithdogs" class="form-label">Okay with Dogs</label>
                <select class="form-select" id="okwithdogs" name="okwithdogs">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col">
                <label for="okwithcats" class="form-label">Okay with Cats</label>
                <select class="form-select" id="okwithcats" name="okwithcats">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col">
                <label for="okwithkids" class="form-label">Okay with Kids</label>
                <select class="form-select" id="okwithkids" name="okwithkids">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="housebroken" class="form-label">Housebroken</label>
                <select class="form-select" id="housebroken" name="housebroken">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col">
                <label for="specialNeeds" class="form-label">Special Needs</label>
                <textarea class="form-control" id="specialNeeds" name="specialNeeds" rows="2"></textarea>
            </div>
            <div class="col">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="add_dog">Submit</button>
    </form>
</div>



        <div class="tab-pane fade" id="details" role="tabpanel">
            <h3>Dog Details</h3>
            <div id="dog-details-content"></div>
        </div>
    </div>
</div>

<script>
    const dogs = <?php echo json_encode($dogs); ?>; // Pass PHP data to JavaScript
</script>
