<?php

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . str_replace( ' ', '_', str_replace( 'wp ', '', strtolower( WS_RESCUE_ROVER_PRO_NAME . '_private' ) ) );

		$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
       id INT(10) NOT NULL AUTO_INCREMENT,
    unique_ID INT(4) NOT NULL,
    date DATE NULL,
    date_added DATE NULL,
    date_last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    active VARCHAR(3) NULL,
    name VARCHAR(20) NULL,
    owner VARCHAR(30) NULL,
    phone VARCHAR(12) NULL,
    email VARCHAR(50) NULL,
    sex VARCHAR(1) NULL,
    video TEXT NULL,
    video_URL VARCHAR(100) NULL,
    long_desc TEXT NULL,
    priBreed VARCHAR(40) NULL,
    secBreed VARCHAR(15) NULL,
    age CHAR(3) NULL,
    okwithdogs CHAR(3) NULL,
    okwithcats CHAR(3) NULL,
    okwithkids CHAR(3) NULL,
    specialNeeds VARCHAR(20) NULL,
    size VARCHAR(10) NULL,
    notes TEXT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_ID (unique_ID)

) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'ws_rescure_rover_pro_database_version', WS_RESCUE_ROVER_PRO_VERSION );