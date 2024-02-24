<?php
/**
 * Plugin Name: Is That a Good Price?
 * Plugin URI: https://itagp.amydepalma.com
 * Description: A personal price tracker.
 * Version: 1.0
 * Author: Amy DePalma
 * Author URI: https://www.amydepalma.com
 **/

if (!defined('ABSPATH')) {
    exit();
}

if (!defined('ITAGP_FILE')) {
    define('ITAGP_FILE', __FILE__);
}

if (!defined('ITAGP_PATH')) {
    define('ITAGP_PATH', plugin_dir_path(__FILE__));
}

define('ITAGP_VERSION', '1.0');

/**
 * Add rest of functionality
 */

foreach(glob(ITAGP_PATH . "functions/*.php") as $file){
    require_once $file;
}

foreach(glob(ITAGP_PATH . "includes/*.php") as $file){
	require_once $file;
}