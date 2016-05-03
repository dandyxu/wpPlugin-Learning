<?php
/*
Plugin Name: Content Watermark Plugin
Plugin URI: http://localhost/wpPlugin-learning/content_watermark
Description: This plugin will add a "watermark" to content
Author: Dandy Xu
Version: 1.0
Anthor URI: http://wwww.techxu.com

*/

function cwmp_add_content($content){
	if (is_feed()){
		return $content . 'Created by Dandy Xu, copyright'. date('Y') . 'all rights reserved';
	}
	return $content;
}

//add_filter('the_content', 'cwmp_add_content');
//remove_filter('the_content','cwmp_add_content');

?>