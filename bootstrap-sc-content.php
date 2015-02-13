<?php
/*
Plugin Name: Bootstrap Shortcodes for Content
Plugin URI: https://www.closemarketing.es
Description: Twitter Bootstrap 3 shortcodes plugin for Content
Author: David Perez
Author URI: http://twitter.com/closemarketing
Version: 0.1
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html


Include functions */
require_once( dirname(__FILE__) . '/includes/shortcode-functions.php'); // Main shortcode functions

//Register Image sizes
add_image_size('thumb-col-3', 390, 999, false);
add_image_size('thumb-col-1', 488, 999, false);