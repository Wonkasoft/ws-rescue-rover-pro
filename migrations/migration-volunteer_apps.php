<?php

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . str_replace( ' ', '_', str_replace( 'wp ', '', strtolower( WS_RESCUE_ROVER_PRO_NAME . '_volunteer_apps' ) ) );

		$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    unique_ID INT(5) NOT NULL,
    date_created DATETIME NULL,
    date_last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    overall_notes TEXT NULL,
    first_name VARCHAR(20) NULL,
    last_name VARCHAR(30) NULL,
    street VARCHAR(20) NULL,
    city VARCHAR(20) NULL,
    state CHAR(2) NULL,
    zipcode VARCHAR(5) NULL,
    email VARCHAR(12) NULL,
    home_phone VARCHAR(12) NULL,
    work_cell_phone VARCHAR(12) NULL,
    overall_status VARCHAR(30) NULL,
    heard_from VARCHAR(10) NULL,
    Best_Number_Call VARCHAR(30) NULL,
    Best_Time_Call VARCHAR(3) NULL,
    My_Age VARCHAR(20) NULL,
    driver_license VARCHAR(99) NULL,
    time_per_month CHAR(12) NULL,
    month_commitment CHAR(5) NULL,
    exp_owner CHAR(5) NULL,
    exp_show CHAR(5) NULL,
    exp_breeder CHAR(5) NULL,
    exp_vet_work CHAR(5) NULL,
    exp_sitter CHAR(5) NULL,
    exp_kennel_staff CHAR(5) NULL,
    exp_pro_trainer CHAR(5) NULL,
    exp_schutzhund CHAR(5) NULL,
    exp_obedience_class CHAR(5) NULL,
    exp_SAR CHAR(5) NULL,
    exp_K9_handler CHAR(5) NULL,
    exp_agility CHAR(5) NULL,
    exp_therapy CHAR(5) NULL,
    exp_herding CHAR(5) NULL,
    exp_protection VARCHAR(99) NULL,
    exp_other VARCHAR(99) NULL,
    per_why_volunteer CHAR(5) NULL,
    per_events CHAR(5) NULL,
    per_vet_transport CHAR(5) NULL,
    per_shelter_transport CHAR(5) NULL,
    per_fund_raising CHAR(5) NULL,
    per_PR CHAR(5) NULL,
    per_bake_sales CHAR(5) NULL,
    per_dog_evaluate CHAR(5) NULL,
    per_home_visits CHAR(5) NULL,
    per_marketing CHAR(5) NULL,
    per_dog_walking CHAR(5) NULL,
    per_merchandise CHAR(5) NULL,
    per_writing_articles CHAR(5) NULL,
    per_phone_follow_ups CHAR(5) NULL,
    per_hotline VARCHAR(99) NULL,
    per_other VARCHAR(99) NULL,
    other_pertinent TEXT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_ID (unique_ID)

) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
			update_option( 'ws_rescure_rover_pro_database_version', WS_RESCUE_ROVER_PRO_VERSION );