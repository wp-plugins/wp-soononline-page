<?php
/*
Plugin Name: WP SoonOnline Page
Plugin URI: http://www.mobisoft.gr/wordpress/plugins/wp-soon-online-page/index.php
Description: Just a soon online page Wordpress plugin.
Version: 1.01
Author: Giannopoulos Kostas
Author URI: http://www.mobisoft.gr/
License: GPL2
*/

/*
 This file is part of wp-soononline-page plugin.
 wp-soononline-page plugin is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.
 wp-soononline-page plugin is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with underConstruction.  If not, see <http://www.gnu.org/licenses/>.
  */

/*
	Many thanks to Jeremy Massel because i use a lo of code from his great underConstruction plugin!
*/

require_once( ABSPATH . "wp-includes/pluggable.php" );

class mobisoftSoonOnline {

	var $installationFolder = "";
	var $mainOptionsPage = "soonOnlineMainOptions";

	function __construct()
	{
		$this->installedFolder = basename(dirname(__FILE__));
	}

	function msoonOnline()
	{
		$this->__construct();
	}

	function getMainOptionsPage()
	{
		return $this->mainOptionsPage;
	}


	function mobi_changePageStyle()
	{
		require_once ('soononlinepage-options.php');
	}

	function mobi_adminMenu()
	{
		/* Register our plugin page */
		$page = add_options_page('WP Soon Online Settings', 'WP Soon Online', 'activate_plugins', $this->mainOptionsPage, array($this, 'mobi_changePageStyle'));
		
	}
	

	function mobi_overrideWP()
	{
		if ($this->pluginIsActive())
		{
			if (!is_user_logged_in())
			{
						require_once ('soononlinepage-home.php');
						showSoonOnlineDefaultPage();
						die();
			}
		}
	}


	function pluginIsActive()
	{

		if (!get_option('soonOnlineActivationStatus'))
		{
			return false;
		}

		if (get_option('soonOnlineActivationStatus') == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function stretchBG()
	{

		if (!get_option('soonOnlineStretchBGimage'))
		{
			return false;
		}

		if (get_option('soonOnlineStretchBGimage') == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function repeatBG()
	{

		if (!get_option('soonOnlineRepeatBGimage'))
		{
			return false;
		}

		if (get_option('soonOnlineRepeatBGimage') == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}


$mobisoonOnlinePlugin = new mobisoftSoonOnline();
add_action('template_redirect', array($mobisoonOnlinePlugin, 'mobi_overrideWP'));
register_uninstall_hook(__FILE__, 'mobisoonOnlinePlugin_delete');


add_action('admin_menu', array($mobisoonOnlinePlugin, 'mobi_adminMenu'));

function mobisoonOnlinePlugin_delete() {
	delete_option('soonOnlineLogo');
	delete_option('soonOnlineTitleFont');
	delete_option('soonOnlineBTextcolor');
	delete_option('soonOnlineDisplayOption');
	delete_option('soonOnlineActivationStatus');
	delete_option('soonOnlineBGcolor');
	delete_option('soonOnlineBTitlecolor');
	delete_option('soonOnlineTitle');
	delete_option('soonOnlineDescription');
	delete_option('soonOnlineBGimage');
	delete_option('soonOnlineStretchBGimage');
	delete_option('soonOnlineRepeatBGimage');
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
	function mw_enqueue_color_picker( $hook_suffix ) {
    	wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'mobicolor-handle', plugins_url('mobisoft-color.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }



define ( 'MOBISOFT_UPLOAD_PLUGIN_URL', plugin_dir_url(__FILE__)); 

function mobisoft_upload_admin_scripts() 
{

		 wp_enqueue_script('jquery');
		 wp_enqueue_script('media-upload');
		 wp_enqueue_script('thickbox');
		 wp_register_script('my-upload', MOBISOFT_UPLOAD_PLUGIN_URL.'mobisoft-upload.js', array('jquery','media-upload','thickbox'));
		 wp_enqueue_script('my-upload');

}

function mobisoft_upload_admin_styles()
{

		 wp_enqueue_style('thickbox');

}
add_action('admin_print_scripts', 'mobisoft_upload_admin_scripts');
add_action('admin_print_styles', 'mobisoft_upload_admin_styles');


function mobisoonOnlinePluginLinks($links, $file)
{
	global $mobisoonOnlinePlugin;
	if ($file == basename(dirname(__FILE__)).'/'.basename(__FILE__) && function_exists("admin_url"))
	{
		//add settings page
		$manage_link = '<a href="'.admin_url('options-general.php?page='.$mobisoonOnlinePlugin->getMainOptionsPage()).'">'.__('Settings').'</a>';
		array_unshift($links, $manage_link);


	}
	return $links;
}

add_filter('plugin_action_links', 'mobisoonOnlinePluginLinks', 10, 2);

?>