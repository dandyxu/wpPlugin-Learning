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

/**
 * 5.1 Creating an admin interface
 */
function cccomm_option_page(){

    if ( check_admin_referer('cccomm_admin_options-update') ) {

        update_option('cccomm_cc_email' , $_POST['cc_email']);
        ?>
        <div id="message" class="updated">Email was saved for CC Comments</div>
        <?php
    }

	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>CC Comments Options</h2>
		<p>Welcome to the CC Comments plugin. Here you can edit the email(s) to CC your comments to.</p>
        <form action="" method="post" id="cc-comments-email-options-form">
            <h3><label for="cc_email">Email to send CC to: </label>
            <input type="text" id="cc_email" name="cc_email"
            value="<?php echo esc_attr(get_option('cccomm_cc_email')); ?>" /></h3>
            <p><input type="submit" name="submit" value="Save Email" /></p>

            <?php wp_nonce_field('cccomm_admin_options-update'); ?>
            
        </form>
	</div>
	<?php
}

/**
 * Register cccomm plugin menu
 */
function cccomm_plugin_menu(){
	add_options_page('CC Comments Settings', 'CC Comments', 'manage_options', 'cc-comments-plugin', 'cccomm_option_page');
}
add_action('admin_menu', 'cccomm_plugin_menu');

?>