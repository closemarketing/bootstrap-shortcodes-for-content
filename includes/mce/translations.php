<?php

if ( ! defined( 'ABSPATH' ) )
    exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function bsc_mce_button_translation() {
    $strings = array(
        'columns'       => __('Columns', 'bootstrap-shortcodes-for-content'),
        'twocolumns'    => __('Two Columns', 'bootstrap-shortcodes-for-content'),
        'threecolumns'  => __('Three Columns', 'bootstrap-shortcodes-for-content'),
        'fourcolumns'   => __('Four Columns', 'bootstrap-shortcodes-for-content'),
        'icons'         => __('Icons', 'bootstrap-shortcodes-for-content'),
        'icon'          => __('Icon', 'bootstrap-shortcodes-for-content'),
        'popovers'      => __('Popovers', 'bootstrap-shortcodes-for-content'),
        'popover'       => __('Popover', 'bootstrap-shortcodes-for-content'),
        'buttonpopover' => __('Button Popover', 'bootstrap-shortcodes-for-content'),
        'buttons'       => __('Buttons', 'bootstrap-shortcodes-for-content'),
        'button'        => __('Button', 'bootstrap-shortcodes-for-content'),
        'buttoninsert'  => __('Insert a Button', 'bootstrap-shortcodes-for-content'),
        'buttontext'    => __('Button: Text', 'bootstrap-shortcodes-for-content'),
        'buttondownload'=> __('Download', 'bootstrap-shortcodes-for-content'),
        'buttonurl'     => __('Button: URL', 'bootstrap-shortcodes-for-content'),
        'buttoncolor'   => __('Button: Color', 'bootstrap-shortcodes-for-content'),
        'buttondef'     => __('Default', 'bootstrap-shortcodes-for-content'),
        'buttonprim'    => __('Primary', 'bootstrap-shortcodes-for-content'),
        'buttonsucc'    => __('Successs', 'bootstrap-shortcodes-for-content'),
        'buttoninfo'    => __('Info', 'bootstrap-shortcodes-for-content'),
        'buttonwarn'    => __('Warning', 'bootstrap-shortcodes-for-content'),
        'buttondanger'  => __('Danger', 'bootstrap-shortcodes-for-content'),
        'buttonlink'    => __('Link', 'bootstrap-shortcodes-for-content'),
        'buttonsize'    => __('Button: Size', 'bootstrap-shortcodes-for-content'),
        'buttonlinkt'   => __('Button: Link Target', 'bootstrap-shortcodes-for-content'),
        'buttonrel'     => __('Button: Rel', 'bootstrap-shortcodes-for-content'),
        'tabstoogles'   => __('Tabs and Toggles', 'bootstrap-shortcodes-for-content'),
        'tabaccordion'  => __('Accordion', 'bootstrap-shortcodes-for-content'),
        'tabs'          => __('Tabs', 'bootstrap-shortcodes-for-content'),
        'content'       => __('Content', 'bootstrap-shortcodes-for-content'),
        'contentgridbox'=> __('Insert Gridbox', 'bootstrap-shortcodes-for-content'),
        'content_carousel'=> __('Carousel from Custom Post Type', 'bootstrap-shortcodes-for-content'),
        'content_imgslider' => __('Image Post Slider', 'bootstrap-shortcodes-for-content'),
        'content_links' => __('Links', 'bootstrap-shortcodes-for-content'),
        'boot' => __('Bootstrap Components', 'bootstrap-shortcodes-for-content'),
        'progress' => __('Progress Bar', 'bootstrap-shortcodes-for-content'),
        'tool' => __('Tooltips', 'bootstrap-shortcodes-for-content'),
        'buttonrel'     => __('Extra Class','bootstrap-shortcodes-for-content'),
        'buttondropdown'     => __('Button Dropdown','bootstrap-shortcodes-for-content'),
        'buttonsdropdown'     => __('Button Split Dropdown','bootstrap-shortcodes-for-content'),
        'buttongroup'     => __('Button Group','bootstrap-shortcodes-for-content'),
        'jumbo'     => __('Jumbotron','bootstrap-shortcodes-for-content'),
        'posts'     => __('Posts for grid','bootstrap-shortcodes-for-content'),
        'col'     => __('Columns Grid','bootstrap-shortcodes-for-content'),
        'pname'     => __('Post Type Name','bootstrap-shortcodes-for-content'),
        'idate'     => __('Include Date','bootstrap-shortcodes-for-content'),
        'isize'     => __('Image Size (Wordpress name)','bootstrap-shortcodes-for-content'),
        'itaxtitle'     => __('Include Taxonomy Title','bootstrap-shortcodes-for-content'),
        'cardesc'     => __('Insert Carousel from custom post type','bootstrap-shortcodes-for-content'),
        'carslug'     => __('Slug Custom Post Type','bootstrap-shortcodes-for-content'),
        'cartax'     => __('Show Taxonomy that the post in','bootstrap-shortcodes-for-content'),
        'cartit'     => __('Title that goes before','bootstrap-shortcodes-for-content'),
        'carel'     => __('Elements visibles','bootstrap-shortcodes-for-content'),
        'cartyp'     => __('Type of entries','bootstrap-shortcodes-for-content'),
        'carshow'     => __('Show Titles post in carousel','bootstrap-shortcodes-for-content'),
        'no'     => __('No','bootstrap-shortcodes-for-content'),
        'yes'     => __('Yes','bootstrap-shortcodes-for-content'),
        'colum'     => __('columns','bootstrap-shortcodes-for-content'),
        'column4'     => __('4 columns','bootstrap-shortcodes-for-content'),
        'column3'     => __('3 columns','bootstrap-shortcodes-for-content'),
        'column2'     => __('2 columns','bootstrap-shortcodes-for-content'),
        'column6'     => __('6 columns','bootstrap-shortcodes-for-content'),
        'column12'    => __('12 columns','bootstrap-shortcodes-for-content'),
        'post'     => __('Post','bootstrap-shortcodes-for-content'),
        'tax'     => __('Taxonomy','bootstrap-shortcodes-for-content'),
        'large'     => __('Large','bootstrap-shortcodes-for-content'),
        'sm'     => __('Small','bootstrap-shortcodes-for-content'),
        'xs'     => __('Extra Small','bootstrap-shortcodes-for-content'),
        'def'     => __('Default','bootstrap-shortcodes-for-content'),
        'self'     => __('Self','bootstrap-shortcodes-for-content'),
        'neww'     => __('New Window','bootstrap-shortcodes-for-content'),
        'bnone'     => __('None','bootstrap-shortcodes-for-content'),
        'nof'     => __('Nofollow','bootstrap-shortcodes-for-content'),
        'imgscroll'     => __('Image Scroll','bootstrap-shortcodes-for-content'),
        'imgscroll_desc'     => __('Inserts Images attached to actual entry as Scroll','bootstrap-shortcodes-for-content'),
        'imgpostslider_desc' => __('Inserts Images attached in a slider','bootstrap-shortcodes-for-content'),
    );

    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.bsc_mce_button", ' . json_encode( $strings ) . ");\n";

    return $translated;
}

$strings = bsc_mce_button_translation();
