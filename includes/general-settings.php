<?php

/**
 * Closemarketing
 *
 * @package WordPress
 * @subpackage Bootstrap Shortcodes for Content
 * @author Closemarketing <info@closemarketing.es>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*
 * Adds fields to general settings
 * @since v0.9.3
 **/

add_filter('admin_init', 'bsc_general_settings_fields');
 
function bsc_general_settings_fields()
{
    register_setting('general', 'bsc_phone', 'esc_attr');
    add_settings_field('bsc_phone', '<label for="bsc_phone">'.__('Phone Number' , 'bsc' ).':</label>' , 'bsc_general_settings_fields_html', 'general');
}
 
function bsc_general_settings_fields_html()
{
    $value = get_option( 'bsc_phone', '' );
    echo '<input type="text" id="bsc_phone" name="bsc_phone" value="' . $value . '" />';
}