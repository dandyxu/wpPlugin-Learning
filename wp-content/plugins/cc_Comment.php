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

function cccomm_option_page(){
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>CC Comments Options</h2>
		<p>Welcome to the CC Comments plugin. Here you can edit the email(s) to CC your comments to.</p>
	</div>
	<?php
}

function cccomm_plugin_menu(){
	add_options_page('CC Comments Settings', 'CC Comments', 'manage_options', 'cc-comments-plugin', 'cccomm_option_page');
}

add_action('admin_menu', 'cccomm_plugin_menu');

?>