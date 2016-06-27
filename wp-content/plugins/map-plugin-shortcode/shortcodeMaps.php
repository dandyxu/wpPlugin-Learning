<?php
/*
Plugin Name: Map plugin using shortcode
Plugin URI: http://localhost/wpPlugin-learning/map-plugin-shortcode/
Description: This plugin will get a map of whatever parameter is passed
Author: Dandy Xu
Version: 2.1
Author URI: https://github.com/dandyxu
*/

function smp_map_it($atts, $content=null){

	//$addr = "10, The Crescent, O'Connell Street, Limerick";
	shortcode_atts( array('title' => 'Your Map:', 'address' => ''), $atts);
	$base_map_url = "http://maps.googleapis.com/maps/api/staticmap?center=10,+The+Crescent,+O'Connell+Street,+Limerick,+Ireland&zoom=13&scale=false&size=600x300&maptype=roadmap&key=AIzaSyAd2M4xNCXVfBanUDPM8pHvVpAJ6xgTX6M&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:1%7C10,+The+crescent,+O'Connell+Street,+Limerick,+Ireland";
	return '
	<h2>'. $atts['title'].
	do_shortcode($content) .'</h2>
	<img width="256" height="256" 
		src="'. $base_map_url . urlencode($atts['address']) .'" />';
}

add_shortcode('map-it', 'smp_map_it');
//remove_all_shortcodes
//remove_shortcode

?>