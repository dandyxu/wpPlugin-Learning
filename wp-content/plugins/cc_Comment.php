<?php
/*
Plugin Name: CC Comment Plugin
Plugin URI: http://localhost/wpPlugin-learning/ccComment
Description: This plugin sends emails when a commment in the post is made
Author: Dandy Xu
Version: 1.0
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

?>