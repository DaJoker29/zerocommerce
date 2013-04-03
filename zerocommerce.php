<?php
/*
    Plugin Name: Zero Commerce
	Plugin URI: http://www.example.org
	Description: Zero Commerce is a custom extension for the <a href="http://www.woothemes.com/woocommerce/">WooCommerce</a> plugin
	Version: 0.0.1
	Author: The Captain
	Author URI: http://www.example.org
	License: GPLv3
*/

/*
	Copyright (C) 2013  The Captain

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
	*/

/**
* HOUSEKEEPING
**/

//Set path constants
define( 'ZDS_ZEROCOMMERCE_DIR' , plugin_dir_path(__FILE__));
define( 'ZDS_ZEROCOMMERCE_URL' , plugin_dir_url(__FILE__));


/**
* FUNCTIONS
**/

//Activation
function zds_zerocommerce_activation() {

	register_uninstall_hook( __FILE__ , 'zds_zerocommerce_uninstall' );
}

//Deactivation
function zds_zerocommerce_deactivation() {

}

//Uninstallation
function zds_zerocommerce_uninstall() {

}

//Init Google Gateway <<FIGURE OUT HOW TO MOVE CLASS TO SEPARATE FILE>>
function zds_init() {

    //include Google Class
    include ZDS_ZEROCOMMERCE_DIR . '/classes/zds_gateway_google.php';

}

//Add Google Gateway
function zds_add_google_gateway_class($zds_methods) {
    $zds_methods[] = 'ZDS_Gateway_Google';
    return $zds_methods;
}

/**
* HOOKS, ACTIONS, FILTERS
**/

//Register hooks
register_activation_hook(__FILE__ , 'zds_zerocommerce_activation');
register_deactivation_hook(__FILE__ , 'zds_zerocommerce_deactivation');

//Actions and Filters
add_action( 'plugins_loaded' , 'zds_init' );
add_filter( 'woocommerce_payment_gateways' , 'zds_add_google_gateway_class' );

/**
* INITIALIZE
**/

/* Load classes <-- NEED TO FIGURE OUT THIS ONE
set_include_path(implode ( PATH_SEPARATOR , array( get_include_path() , './classes' ) ) );
spl_autoload_register ();
*/

?>
