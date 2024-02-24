<?php

add_action('wp_enqueue_scripts', 'itagp_enqueue_assets', 15);
function itagp_enqueue_assets() {
	wp_enqueue_style('itagp-css', plugins_url("itagp/dist/scss/plugin.css"), array(), ITAGP_VERSION, 'all');
	wp_enqueue_script('itagp-js', plugins_url("itagp/dist/js/plugin.js"), array(), ITAGP_VERSION , true );
}