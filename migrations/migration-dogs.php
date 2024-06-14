<?php

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . str_replace( ' ', '_', str_replace( 'wp ', '', strtolower( WS_RESCUE_ROVER_PRO_NAME . '_dogs' ) ) );

			$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    unique_ID INT(5) NOT NULL,
    archived CHAR(1) NULL,
    name VARCHAR(20) NULL,
    other_names VARCHAR(30) NULL,
    profile VARCHAR(30) NULL,
    status VARCHAR(15) NULL,
    adoption_pending VARCHAR(3) NULL,
    sex VARCHAR(1) NULL,
    video TEXT NULL,
    video_URL VARCHAR(100) NULL,
    category VARCHAR(10) NULL,
    foster_needed VARCHAR(3) NULL,
    sponsored_by VARCHAR(200) NULL,
    short_desc TEXT NULL,
    long_desc TEXT NULL,
    date_adopted DATE NULL,
    priBreed VARCHAR(40) NULL,
    secBreed VARCHAR(40) NULL,
    age VARCHAR(15) NULL,
    okwithdogs CHAR(3) NULL,
    okwithcats CHAR(3) NULL,
    okwithkids CHAR(3) NULL,
    housebroken CHAR(3) NULL,
    specialNeeds VARCHAR(20) NULL,
    size CHAR(1) NULL,
    shots VARCHAR(50) NULL,
    color VARCHAR(30) NULL,
    coatLength VARCHAR(20) NULL,
    incoming_info TEXT NULL,
    incoming_date DATE NULL,
    location_type CHAR(10) NULL,
    location VARCHAR(20) NULL,
    rabies DATE NULL,
    rabies_time CHAR(1) NULL,
    DHLPP DATE NULL,
    DHLPP_time CHAR(1) NULL,
    bord DATE NULL,
    bord_time VARCHAR(1) NULL,
    flea_tick DATE NULL,
    worm DATE NULL,
    flu DATE NULL,
    flu_type VARCHAR(10) NULL,
    microchip VARCHAR(20) NULL,
    impound_num VARCHAR(15) NULL,
    fixed CHAR(3) NULL,
    notes VARCHAR(4) NULL,
    litter TEXT NULL,
    litter_notes TEXT NULL,
    vol_contact VARCHAR(30) NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_ID (unique_ID)
) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'ws_rescure_rover_pro_database_version', WS_RESCUE_ROVER_PRO_VERSION );