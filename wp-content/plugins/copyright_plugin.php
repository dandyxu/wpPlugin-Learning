<?php
/*
Plugin Name: My copyright plugin
Plugin URI: http://localhost/wpPlugin-Learning/wp-content/plugins/copyright_plugin
Description: Created at 10th.March.2016 in Limerick
Author: Dandy Xu
Version: 1.0
Author URI: http://www.techxu.com
License: GPL2

Copyright (C) 2016  Dandy Xu (email : dandyjefferson@gmail.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

global $wp_version;
if ( !version_compare($wp_version, "4.4",">="))
{
	die("You need at least version 4.4 of WordPress to use the copyright plugin");
}

?>
