<?php

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . str_replace( ' ', '_', str_replace( 'wp ', '', strtolower( WS_RESCUE_ROVER_PRO_NAME . '_donations' ) ) );

		$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
   id INT(10) NOT NULL AUTO_INCREMENT,
    unique_ID INT(6) NOT NULL,
    last_name VARCHAR(20) NULL,
    first_name VARCHAR(15) NULL,
    address_street VARCHAR(30) NULL,
    address_city VARCHAR(30) NULL,
    address_state VARCHAR(2) NULL,
    address_zip VARCHAR(10) NULL,
    payer_email VARCHAR(50) NULL,
    payment_fee DECIMAL(8,2) NULL,
    payment_gross DECIMAL(8,2) NULL,
    item_number VARCHAR(30) NULL,
    date_received TIMESTAMP NULL,
    all_received TEXT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_ID (unique_ID)

) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'ws_rescure_rover_pro_database_version', WS_RESCUE_ROVER_PRO_VERSION );