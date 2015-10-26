<?php

if ( ! defined( 'ABSPATH' ) )
    exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function bsc_mce_button_translation() {
    $strings = array(
        'Two Columns' => __('Two Columns', 'bsc'),
        'Three Columns' => __('Three Columns', 'bsc')
    );

    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.mce-btn", ' . json_encode( $strings ) . ");\n";

    return $translated;
}

$strings = bsc_mce_button_translation();
