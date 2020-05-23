<?php
/**
 * Plugin Name: Whitelabel Snippets
 * Description: Take the guesswork out of WordPress security.
 * Plugin URI: https://iftikharalam.com/
 * Author: Iftikhar Alam
 * Version: 0.2
 * Author URI: https://iftikharalam.com/
 *
 * Text Domain: Iftikhar alam
 */

 // Exit if Accessed directly
 if(!defined('ABSPATH')){
  exit;
}

//Load all the scripts
require_once(plugin_dir_path(__FILE__).'/script.php');


//Update Checker
require 'plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/iftikharalam73/WhitelabelSnippets/',
	__FILE__,
	'unique-plugin-or-theme-slug'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('13fdecdc427f3e33d66f91d604098adb93f27d2a ');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');
