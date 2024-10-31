<?php
/**
Plugin Name: TechGasp Rave Master
Plugin URI: https://wordpress.techgasp.com/reverbnation-master/
Version: 5.1.4
Author: TechGasp
Author URI: https://wordpress.techgasp.com
Text Domain: reverbnation-master
Description: TechGasp Rave Master plugs-in perfectly into wordpress and allows you to display all the reverbnation juice inside any widget template position.
License: GPL2 or later
*/
/*  Copyright 2013 TechGasp  (email : info@techgasp.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('reverbnation_master')) :
///////DEFINE///////
define( 'REVERBNATION_MASTER_VERSION', '5.1.4' );
define( 'REVERBNATION_MASTER_NAME', 'TechGasp Rave Master' );

class reverbnation_master{
public static function content_with_quote($content){
$quote = '<p>' . get_option('tsm_quote') . '</p>';
	return $content . $quote;
}
//SETTINGS LINK IN PLUGIN MANAGER
public static function reverbnation_master_links( $links, $file ) {
if ( $file == plugin_basename( dirname(__FILE__).'/reverbnation-master.php' ) ) {
		if( is_network_admin() ){
		$techgasp_plugin_url = network_admin_url( 'admin.php?page=reverbnation-master' );
		}
		else {
		$techgasp_plugin_url = admin_url( 'admin.php?page=reverbnation-master' );
		}
	$links[] = '<a href="' . $techgasp_plugin_url . '">'.__( 'Settings' ).'</a>';
	}
	return $links;
}

//END CLASS
}
add_filter('the_content', array('reverbnation_master', 'content_with_quote'));
add_filter( 'plugin_action_links', array('reverbnation_master', 'reverbnation_master_links'), 10, 2 );
endif;

// HOOK ADMIN
require_once( WP_PLUGIN_DIR . '/reverbnation-master/includes/reverbnation-master-admin.php');
// HOOK ADMIN ADDONS
require_once( WP_PLUGIN_DIR . '/reverbnation-master/includes/reverbnation-master-admin-addons.php');
// HOOK WIDGET BUTTONS
require_once( WP_PLUGIN_DIR . '/reverbnation-master/includes/reverbnation-master-widget-buttons.php');
