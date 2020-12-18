<?php
/*
Plugin Name: My Theme
Plugin URI: https://lookawesome.net/
Description: Plugin support for theme awesome.
Version: 1.0
Author: Nguyen Anh Tuan
Author URI: https://lookawesome.net/
License: GPLv2 or later
Text Domain: awesome
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'No direct script access allowed' );
}

define( 'AWESOME_FILE', __FILE__ );
define( 'AWESOME_FILENAME', basename( __FILE__ ) );
define( 'AWESOME_PLUGIN_NAME', plugin_basename( dirname( __FILE__ ) ) );
define( 'AWESOME_PLUGIN_DIR', trailingslashit( __DIR__ ) );
define( 'AWESOME_BASE_URL_PLUGIN', untrailingslashit( plugins_url( '', AWESOME_FILE ) ) );
define( 'AWESOME_VERSION','1.0' );

require_once 'inc/AwesomePlugin.php';