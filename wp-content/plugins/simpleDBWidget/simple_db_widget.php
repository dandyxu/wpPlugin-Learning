<?php
    /*
     * Plugin Name: Simple Dashboard Widget
     * Plugin URI: http://localhost/wpPlugin-Learning/simpleDBWidget
     * Description: This plugin adds a widget to the admin dashboard
     * Author: Dandy Xu
     * Version: 1.0
     * Author URI: https://github.com/dandyxu
     */

    function simple_dashboard_widget(){
        ?>
        <h2>Simple Dashboard Widget</h2>
        <p>Welcome to WordPress Development. Now you can build your own dashboard widgets.</p>
        <p><a href="https://github.com/dandyxu">Visit Dandy Xu Github</a></p>

        <?php
    }

/**
 *
 */
function sdbw_register_widget(){
        wp_add_dashboard_widget('simple-dashboard-widget', 'Simple Dashboard Widget', 'simple_dashboard_widget');
    }

    add_action('wp_dashboard_setup', 'sdbw_register_widget');
?>