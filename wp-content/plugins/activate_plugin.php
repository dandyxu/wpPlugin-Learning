<?php
/*
Plugin Name: Dandy's Activated Plugin
Plugin URI: http://localhost/wpPlugin-learning/activatedPlugin
Description: This plugin will get activated
Author: Dandy Xu
Version: 1.0
Author URI: http://www.techxu.com
*/

function my_plugin_activate(){
	// db create, create options, etc.
	error_log("my plugin activated");
}

register_activation_hook(__FILE__, "my_plugin_activate");

function my_plugin_deactivate(){
	error_log("my plugin deactivated");
}

register_deactivation_hook(__FILE__, "my_plugin_deactivate");

?>
