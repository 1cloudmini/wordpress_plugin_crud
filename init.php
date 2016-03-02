<?php
/*
Plugin Name: Music
Description:
Version: 1
Author: paolo
Author URI: paolo.com
*/

//menu items
add_action('admin_menu','music_modifymenu');
function music_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Music List', //page title
	'Music', //menu title
	'manage_options', //capabilities
	'music_list', //menu slug
	music_list //function
	);
	
	//this is a submenu
	add_submenu_page('music_list', //parent slug
	'Add New ', //page title
	'Add New', //menu title
	'manage_options', //capability
	'music_create', //menu slug
	'music_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update ', //page title
	'Update', //menu title
	'manage_options', //capability
	'music_update', //menu slug
	'music_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'music-list.php');
require_once(ROOTDIR . 'music-create.php');
require_once(ROOTDIR . 'music-update.php');
