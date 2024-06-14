<?php

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . str_replace( ' ', '_', str_replace( 'wp ', '', strtolower( WS_RESCUE_ROVER_PRO_NAME . '_adoption_apps' ) ) );

		$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
      id INT(10) NOT NULL AUTO_INCREMENT,
    unique_ID INT(5) NOT NULL,
    date_created DATETIME NULL,
    date_last_updated TIMESTAMP NULL,
    archived CHAR(1) NULL,
    initial_review_status VARCHAR(12) NULL,
    initial_review_notes TEXT NULL,
    counselor VARCHAR(10) NULL,
    dog_suggestions VARCHAR(30) NULL,
    dog_requirements TEXT NULL,
    phone_interview_status VARCHAR(12) NULL,
    phone_interview_notes TEXT NULL,
    home_check_status VARCHAR(12) NULL,
    home_check_notes TEXT NULL,
    meeting_notes TEXT NULL,
    first_name VARCHAR(20) NULL,
    last_name VARCHAR(20) NULL,
    street VARCHAR(30) NULL,
    city VARCHAR(20) NULL,
    state CHAR(2) NULL,
    zipcode VARCHAR(5) NULL,
    email VARCHAR(50) NULL,
    home_phone VARCHAR(12) NULL,
    work_cell_phone VARCHAR(12) NULL,
    overall_status VARCHAR(12) NULL,
    remaining_answers TEXT NULL,
    dog_interested_in VARCHAR(30) NULL,
    heard_from VARCHAR(120) NULL,
    How_long_at_this_address VARCHAR(50) NULL,
    Best_Number_Call VARCHAR(10) NULL,
    Best_Time_Call VARCHAR(30) NULL,
    My_Age VARCHAR(3) NULL,
    Employer VARCHAR(50) NULL,
    Work_Phone VARCHAR(25) NULL,
    Own_or_Rent VARCHAR(4) NULL,
    Type_of_home VARCHAR(10) NULL,
    Dogs_Allowed_in_complex VARCHAR(3) NULL,
    Landlord VARCHAR(50) NULL,
    Yard_fenced_in VARCHAR(3) NULL,
    How_tall_is_fence VARCHAR(30) NULL,
    Locks_on_all_gates VARCHAR(3) NULL,
    Do_you_have_a_pool VARCHAR(3) NULL,
    Pool_fenced_in VARCHAR(3) NULL,
    Do_you_have_children VARCHAR(3) NULL,
    gender_age_1 VARCHAR(15) NULL,
    allergies_1 VARCHAR(35) NULL,
    gender_age_2 VARCHAR(15) NULL,
    allergies_2 VARCHAR(35) NULL,
    gender_age_3 VARCHAR(15) NULL,
    allergies_3 VARCHAR(35) NULL,
    Why_do_you_want_a_rescue_dog TINYTEXT NULL,
    Why_do_you_want_a_GSD TINYTEXT NULL,
    Where_will_the_dog_sleep VARCHAR(99) NULL,
    Alone_during_the_day TINYTEXT NULL,
    How_much_time_outside VARCHAR(99) NULL,
    Exercise_Plan VARCHAR(99) NULL,
    Doggie_Door VARCHAR(3) NULL,
    Responsible_for_dog VARCHAR(99) NULL,
    Who_will_provide VARCHAR(99) NULL,
    Do_you_have_other_pets VARCHAR(3) NULL,
    Breed_Gender_Age_1 VARCHAR(99) NULL,
    Breed_Gender_Age_2 VARCHAR(99) NULL,
    Breed_Gender_Age_3 VARCHAR(99) NULL,
    Breed_Gender_Age_4 VARCHAR(99) NULL,
    if_fixed VARCHAR(3) NULL,
    not_fixed_why TEXT NULL,
    Had_a_dog_before TINYTEXT NULL,
    What_breed TINYTEXT NULL,
    What_happened_to_it VARCHAR(3) NULL,
    Given_away_a_pet_before VARCHAR(99) NULL,
    Give_it_away_year VARCHAR(3) NULL,
    why_1 VARCHAR(99) NULL,
    why_2 VARCHAR(99) NULL,
    Vets_name_and_phone TINYTEXT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_ID (unique_ID)

) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'ws_rescure_rover_pro_database_version', WS_RESCUE_ROVER_PRO_VERSION );