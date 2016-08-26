<?php
/**
 * Plugin Name: DB Info Plugin
 * Plugin URI: http://localhost/wpPlugin-Learning/
 * Description: This plugin tells admin stuff about the db
 * Author: Dandy Xu
 * Version: 1.0
 * Author URI: https://dandyxu.github.com
 *
 */

function databaseinfo_dashboard_widget() {
    global $wpdb;
    global $current_user;
    ?>
    <h2>DB Info Dashboard Widget</h2>
    <p><b>Last Query: </b> <?php echo $wpdb->last_query; ?></p>
    <p><b>Last Error:</b> <?php echo $wpdb->last_error; ?></p>
    <p><b>Total Users: </b><?php echo $wpdb->query('SELECT ID FROM wp_users'); ?></p>
    <p><b>Last Post: </b> <?php echo $wpdb->get_var(' SELECT post_title FROM ' . $wpdb->posts . ' WHERE post_author = ' . $current_user->ID); ?></p>
    <pre><?php //echo var_dump($wpdb); ?></pre>

    <?php
}

function databaseinfo_register_widget () {
    wp_add_dashboard_widget('databaseinfo-dashboard-widget', 'Counter Dashboard Widget', 'databaseinfo_dashboard_widget');
}

add_action('wp_dashboard_setup', 'databaseinfo_register_widget');

?>