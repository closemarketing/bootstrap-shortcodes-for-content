<?php
/**
 * This file has all the main shortcode functions
 * @package Twitter Bootstrap Shortcodes Plugin
 * @since 1.0
 * @author Brad Williams : http://bragthemes.com
 * @copyright Copyright (c) 2013, Brad Williams
 * @link http://bragthemes.com
 * @License: GNU General Public License version 3.0
 * @License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

function bsc_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'bsc_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'bsc_register_mce_button' );
	}
}
add_action('admin_head', 'bsc_add_mce_button');


function bsc_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['bsc_mce_button'] = plugins_url( '/js/bsc_shortcodes_tinymce.js', __FILE__ );
	return $plugin_array;
}


function bsc_register_mce_button( $buttons ) {
	array_push( $buttons, 'bsc_mce_button' );
	return $buttons;
}


function bsc_mce_css() {
	wp_enqueue_style('tboot-tc', plugins_url('/css/bsc_tinymce_style.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'bsc_mce_css' );
