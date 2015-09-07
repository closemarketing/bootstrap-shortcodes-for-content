<?php
/*
Plugin Name: Bootstrap Shortcodes for Content
Plugin URI: https://github.com/closemarketing/bootstrap-sc-content
Description: Twitter Bootstrap 3 shortcodes plugin for Content
Author: David Perez
Author URI: http://twitter.com/closemarketing

Version: 0.5
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: bootstrap-sc-content
Domain Path: /languages
*/

/*
 * Allow shortcodes in widgets
 * @since v0.1
 */
//Prevent br and p in shortcode
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

//Include functions shortcodes
require_once( dirname(__FILE__) . '/includes/shortcode-gallery.php'); // Gallery
require_once( dirname(__FILE__) . '/includes/shortcode-carousel.php'); // Carousel
require_once( dirname(__FILE__) . '/includes/shortcode-gridbox.php'); // Gridbox
require_once( dirname(__FILE__) . '/includes/shortcode-gridtaxbox.php'); // Grid Tax Box
require_once( dirname(__FILE__) . '/includes/shortcode-imagepost.php'); // Image Post Slider
require_once( dirname(__FILE__) . '/includes/shortcode-interface.php'); // Interface
require_once( dirname(__FILE__) . '/includes/shortcode-links.php'); // Links
require_once( dirname(__FILE__) . '/includes/shortcode-tabs.php'); // Tabs

//Register Image sizes
add_image_size('thumb-col-3', 390, 999, false);
add_image_size('thumb-col-1', 488, 999, false);