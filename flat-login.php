<?php

/*
Plugin Name: Flat Login
Plugin URI: http://wordpress.org/plugins/flat-login
Description: A WordPress plugin that changes your usual wordpress login page to a flat one.
Version: 1.0
Author: Mohammad Reza Vafaei
Author URI: http://imohammad.ir
License: GPLv2 or later
*/

	defined('FLAT_LOGIN_DIR') or define('FLAT_LOGIN_DIR',  dirname(__FILE__).DIRECTORY_SEPARATOR);

	load_plugin_textdomain('flat-login', false, dirname(plugin_basename( __FILE__ )) .'/lang/');
			
	function flat_login_update() {
		flat_login_options();
	}
	
	add_action('plugins_loaded', 'flat_login_update');

	register_activation_hook(__FILE__, 'flat_login_options');
	function flat_login_options() {
		add_option('flat_logo_upload', '', '', 'yes');
		add_option('flat_bg_color', '#1abc9c', '', 'yes');
		add_option('flat_custom_style', '0', '', 'yes');
	}
	
	register_uninstall_hook(__FILE__, 'flat_login_unset_options');
	function flat_login_unset_options() {
		delete_option('flat_logo_upload');
		delete_option('flat_bg_color');
		delete_option('flat_custom_style');
	}

	require_once FLAT_LOGIN_DIR . '/inc/flat-login-functions.php';

	require_once FLAT_LOGIN_DIR . '/inc/flat-login-settings.php';

?>