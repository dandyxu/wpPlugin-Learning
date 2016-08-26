<?php
/**
 * Plugin Name: Dandy's Browser Detector Plugin
 * Plugin URI: http://localhost/wpPlugin-Learning/
 * Description: This plugin will store the user agents for later parsing and display
 * Author: Dandy Xu
 * Version: 1.0
 * Author URI: https://dandyxu.github.com
 *
 */

function bdetector_activate(){
    global $wpdb;

    $table_name = $wpdb->prefix . "DandyDetector";

    if( $wpdb->get_var(' SHOW TABLES LIKE ' . $table_name) != $table_name ){
        $sql = ' CREATE TABLE ' . $table_name . '(id INTEGER(10) UNSIGNED AUTO_INCREMENT, 
        hit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
        user_agent VARCHAR(255),
        PRIMARY KEY (id))';

        //Include additional files
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        add_option('bdetector_database_verison' , '1.0');
    }

}

register_activation_hook(__FILE__, 'bdetector_activate');

?>