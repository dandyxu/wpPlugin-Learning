<?php
/*
Plugin Name: Simple Widget
Plugin URI: https://github.com/dandyxu/wpPlugin-Learning
Description: A simple OOP widget
Author: Dandy Xu
Version: 1.0
Author URI: https://github.com/dandyxu

*/

class simpleWidget extends WP_Widget {
	
	//Constructor function
	function simpleWidget(){
		$widget_options = array(
			'classname' => 'simple-widget',
			'description' => 'Just a simple widget');

		parent::WP_Widget('simple_widget', 'Simple Widget', $widget_options);
	}

	//Output user interface
	function widget($args, $instance){

		extract( $args, EXTR_SKIP );
		$title = ( $instance['title']) ? $instance['title'] : 'A simple widget';
		$body = ( $instance['body']) ? $instance['body'] : 'A simple message';
		?>
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title ?>
		<p><?php echo $body ?></p>
		<?php

	}

	//Handling update function
	//function update(){

	//}

	//Configuration Options
	function form( $instance ){
		?>
		<label for="<?php echo $this->get_field_id('title');?>">
		Title:
		<input id="<?php echo $this->get_field_id('title');?>"
				 name="<?php echo $this->get_field_name('title');?>"
				 value="<?php echo esc_attr($instance['title']); ?>" />
		</label>
		<br />
		<label for="<?php echo $this->get_field_id('body');?>">
		Body: 
		<textarea id="<?php echo $this->get_field_id('body');?>"
				 name="<?php echo $this->get_field_name('body');?>"><?php echo esc_attr($instance['body']); ?></textarea>
		</label>

		<?php

	}
}

function simple_widget_init(){

	register_widget("simpleWidget"); //pass the name of Class
}

add_action( 'widgets_init' , 'simple_widget_init');

?>