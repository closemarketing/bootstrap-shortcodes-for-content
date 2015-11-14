<?php

if ( ! defined( 'ABSPATH' ) )
    exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function bsc_mce_button_translation() {
    $strings = array(
        'columns'       => __('Columns', 'bsc'),
        'twocolumns'    => __('Two Columns', 'bsc'),
        'threecolumns'  => __('Three Columns', 'bsc'),
        'fourcolumns'   => __('Four Columns', 'bsc'),
        'icons'         => __('Icons', 'bsc'),
        'icon'          => __('Icon', 'bsc'),
        'popovers'      => __('Popovers', 'bsc'),
        'popover'       => __('Popover', 'bsc'),
        'buttonpopover' => __('Button Popover', 'bsc'),
        'buttons'       => __('Buttons', 'bsc'),
        'button'        => __('Button', 'bsc'),
        'buttoninsert'  => __('Insert a Button', 'bsc'),
        'buttontext'    => __('Button: Text', 'bsc'),
        'buttondownload'=> __('Download', 'bsc'),
        'buttonurl'     => __('Button: URL', 'bsc'),
        'buttoncolor'   => __('Button: Color', 'bsc'),
        'buttondef'     => __('Default', 'bsc'),
        'buttonprim'    => __('Primary', 'bsc'),
        'buttonsucc'    => __('Successs', 'bsc'),
        'buttoninfo'    => __('Info', 'bsc'),
        'buttonwarn'    => __('Warning', 'bsc'),
        'buttondanger'  => __('Danger', 'bsc'),
        'buttonlink'    => __('Link', 'bsc'),
        'buttonsize'    => __('Button: Size', 'bsc'),
        'buttonlinkt'   => __('Button: Link Target', 'bsc'),
        'buttonrel'     => __('Button: Rel', 'bsc'),
        'tabstoogles'   => __('Tabs and Toggles', 'bsc'),
        'tabaccordion'  => __('Accordion', 'bsc'),
        'tabs'          => __('Tabs', 'bsc'),
        'content'       => __('Content', 'bsc'),
        'contentgridbox'=> __('Insert Gridbox', 'bsc'),
        'content_carousel'=> __('Carousel from Custom Post Type', 'bsc'),
        'content_imgslider' => __('Image Post Slider', 'bsc'),
        'content_links' => __('Links', 'bsc')
        'boot' => __('Bootstrap Components', 'bsc'),
        'progress' => __('Progress Bar', 'bsc'),
        'tool' => __('Tooltips', 'bsc')
    );

    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.bsc_mce_button", ' . json_encode( $strings ) . ");\n";

    return $translated;
}

$strings = bsc_mce_button_translation();
