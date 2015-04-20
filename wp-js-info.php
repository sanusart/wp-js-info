<?php defined( 'ABSPATH' ) or die( 'No!' );
/*
Plugin Name: wp-js-info
Plugin URI: https://github.com/sanusart/wp-js-info
Description: Simple plug-in to allow access to some WP data/info from JavaScript
Version: 0.1.0
Author: Sasha Khamkov
Author URI: https://www.sanusart.com
License: MIT
*/

function wp_js_init_js_object() {

	global $current_user;
	get_currentuserinfo();

	$wp_js_bloginfo_charset              = get_bloginfo( 'charset' );
	$wp_js_bloginfo_description          = get_bloginfo( 'description' );
	$wp_js_bloginfo_home                 = get_bloginfo( 'home' );
	$wp_js_bloginfo_language             = get_bloginfo( 'language' );
	$wp_js_bloginfo_name                 = get_bloginfo( 'name' );
	$wp_js_bloginfo_pingback_url         = get_bloginfo( 'pingback_url' );
	$wp_js_bloginfo_rdf_url              = get_bloginfo( 'rdf_url' );
	$wp_js_bloginfo_rss_url              = get_bloginfo( 'rss_url' );
	$wp_js_bloginfo_siteurl              = get_bloginfo( 'siteurl' );
	$wp_js_bloginfo_stylesheet_directory = get_bloginfo( 'stylesheet_directory' );
	$wp_js_bloginfo_stylesheet_url       = get_bloginfo( 'stylesheet_url' );
	$wp_js_bloginfo_template_directory   = get_bloginfo( 'template_directory' );
	$wp_js_bloginfo_template_url         = get_bloginfo( 'template_url' );
	$wp_js_bloginfo_text_direction       = get_bloginfo( 'text_direction' );
	$wp_js_bloginfo_url                  = get_bloginfo( 'url' );
	$wp_js_bloginfo_version              = get_bloginfo( 'version' );
	$wp_js_bloginfo_wpurl                = get_bloginfo( 'wpurl' );

	$wppost          = get_post();
	unset($wppost->post_password);
	$wp_js_post_data = json_encode( $wppost );

	$wp_js_is_user_logged_in = ( is_user_logged_in() === true ) ? 'true' : 'false';
	$wp_js_gravatar          = 'http://www.gravatar.com/avatar/' . md5( $current_user->user_email );

	$js_out = "<script>var wpJsInfo = {logged_in: {$wp_js_is_user_logged_in}, bloginfo: {charset: '{$wp_js_bloginfo_charset}', description: '{$wp_js_bloginfo_description}', home: '{$wp_js_bloginfo_home}', language: '{$wp_js_bloginfo_language}', name: '{$wp_js_bloginfo_name}', pingback_url: '{$wp_js_bloginfo_pingback_url}', rdf_url: '{$wp_js_bloginfo_rdf_url}', rss_url: '{$wp_js_bloginfo_rss_url}', siteurl: '{$wp_js_bloginfo_siteurl}', stylesheet_directory: '{$wp_js_bloginfo_stylesheet_directory}', stylesheet_url: '{$wp_js_bloginfo_stylesheet_url}', template_directory: '{$wp_js_bloginfo_template_directory}', template_url: '{$wp_js_bloginfo_template_url}', text_direction: '{$wp_js_bloginfo_text_direction}', url: '{$wp_js_bloginfo_url}', version: '{$wp_js_bloginfo_version}', wpurl: '{$wp_js_bloginfo_wpurl}'}, user: {ID: {$current_user->ID}, user_nicename: '{$current_user->user_nicename}', user_email: '{$current_user->user_email}', user_registered: '{$current_user->user_registered}', display_name: '{$current_user->display_name}', gravatar_url: '{$wp_js_gravatar}'}, post: {$wp_js_post_data}};window.wpJsInfo = wpJsInfo;</script>";
	echo '<!-- wp-js-info plugin -->';
	echo $js_out;
}

add_action( 'wp_head', 'wp_js_init_js_object' );