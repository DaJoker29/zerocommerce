<?php
/* 
Plugin Name: Zero Commerce
Version: 0.0.1
Author: The Captain
Description: Woo Commerce plugin extension
License: GPLv3
*/

/* Copyright 2013 Dewitt A. Buckingham III (email : dj729@comcast.net

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 3, as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA */

define('ZDS_ZEROCOMMERCE_DIR', plugin_dir_path(__FILE__));
define('ZDS_ZEROCOMMERCE_URL', plugin_dir_url(__FILE__));

if ( ! defined( 'ABSPATH' ) ) exit; //Exit if directly accessed

if (!class_exists('Zerocommerce' ) ) 
{

/**
	Main ZeroCommerce Class

*/

	class ZeroCommerce
	{
		/**
		 * Construct the plugin object
		 */

		public function __construct()
		{
			add_action('admin_init', array(&this, 'admit_init'));
			add_action('admin_menu', array(&this, 'add_menu'));		
	

			//register actions
		} //End public function __construct

		/**
		 * Activate plugin
		 */
		public static function activate()
		{
			//Do nothing
		} //End public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			//Do nothing
		} //End public static function deactivate

		/**
	 	 * Hook into WP's admin_init action hook
		 */
		public function admin_init()
		{
			//Set up the settings for this plugin
			$this->init_settings();
			// Possibly do additional admin_init tasks
		} //End public function admin_init

		/**
		 * Initialize custom settings
		 */
		public function init_settings()
		{
			// register the settings for this plugin
			register_setting
	} // End class ZeroCommerce

	//Installation and Uninstall hooks
	register_activation_hook(__FILE__, array('Zerocommerce', 'activate'));
	register_deactivation_hook(__FILE__, array( 'Zerocommerce' , 'deactivate'));

	// instantiate the plugin class
	$zerocommerce = new ZeroCommerce();
} // End if(!class_exists( 'Zerocommerce' ))

	}

}

?>

