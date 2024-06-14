<?php

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . str_replace( ' ', '_', str_replace( 'wp ', '', strtolower( WS_RESCUE_ROVER_PRO_NAME . '_memorials' ) ) );

		$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    unique_ID INT(4) NOT NULL,
    name VARCHAR(20) NULL,
    description TEXT NULL,
    date DATE NULL,
    date_added DATE NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_ID (unique_ID)

) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'ws_rescure_rover_pro_database_version', WS_RESCUE_ROVER_PRO_VERSION );