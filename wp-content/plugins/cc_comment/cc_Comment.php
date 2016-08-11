<?php
/*
Plugin Name: CC Comment Plugin
Plugin URI: http://localhost/wpPlugin-learning/ccComment
Description: This plugin sends emails when a commment in the post is made
Author: Dandy Xu
Version: 2.0
Author URI: http://www.techxu.com

*/

function cc_comment(){
	global $_REQUEST;

	$to = "dandyjefferson@gmail.com";
	$subject = "New commen posted @ techxu.com" . $_REQUEST['subject'];
	$message = "Message from: " . $_REQUEST['name'] . " at email: " . $_REQUEST['email'] . ": \n" . $_REQUEST['comments'];
	mail($to, $subject, $message);
}

add_action('comment_post','cc_comment');

function cccomm_init(){
    register_setting('cccomm_options', 'cccomm_cc_email');
}

add_action('admin_init', 'cccomm_init');

function cccomm_setting_field(){
    ?>
    <input type="text" name="cccomm_cc_email" id="cccomm_cc_email" value="<?php echo get_option('cccomm_cc_email'); ?>" />
    <?php
}

function cccomm_setting_section(){
    ?>
    <p>Settings for the CC Comments plugin: </p>
    <?php
}

/**
 * Register cccomm plugin menu
 */
function cccomm_plugin_menu(){

    add_settings_section('cccomm', 'CC Comments', 'cccomm_setting_section', 'general');
    add_settings_field('cccomm_cc_email', 'CC Comments', 'cccomm_setting_field', 'general', 'cccomm');
}
add_action('admin_menu', 'cccomm_plugin_menu');

?>