<?php
/*
Plugin Name: Map plugin using shortcode
Plugin URI: http://localhost/wpPlugin-learning/map-plugin-shortcode/
Description: This plugin will get a map of whatever parameter is passed
Author: Dandy Xu
Version: 1.0
Author URI: https://github.com/dandyxu
*/

function smp_map_it(){

	$addr = "10, The Crescent, O'Connell Street, Limerick";
	$base_map_url = "https://www.google.ie/maps/place/10+The+Crescent,+Limerick/@52.6619208,-8.6303102,15z/data=!4m2!3m1!1s0x485b5c630e53d727:0x1d6c9d51e44f8943?hl=en";
	?>
	<h2>Your Location: </h2>
	<img width="256" height="256" 
		src="<?php echo $base_map_url . urlencode($addr); ?>" />
	<?php
}

add_shortcode ('map-it', 'smp_map_it');

?>