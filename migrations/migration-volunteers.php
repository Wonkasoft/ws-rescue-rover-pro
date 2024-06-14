<?php

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . str_replace( ' ', '_', str_replace( 'wp ', '', strtolower( WS_RESCUE_ROVER_PRO_NAME . '_volunteers' ) ) );

		$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    unique_ID INT(4) NOT NULL,
    first_name VARCHAR(20) NULL,
    last_name VARCHAR(30) NULL,
    street VARCHAR(20) NULL,
    city VARCHAR(20) NULL,
    state CHAR(2) NULL,
    zipcode CHAR(5) NULL,
    email VARCHAR(50) NULL,
    work_phone VARCHAR(12) NULL,
    home_phone VARCHAR(12) NULL,
    cell_phone VARCHAR(12) NULL,
    active VARCHAR(3) NULL,
    notes TEXT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_ID (unique_ID)

) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'ws_rescure_rover_pro_database_version', WS_RESCUE_ROVER_PRO_VERSION );