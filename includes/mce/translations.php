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
        'content_links' => __('Links', 'bsc'),
        'boot' => __('Bootstrap Components', 'bsc'),
        'progress' => __('Progress Bar', 'bsc'),
        'tool' => __('Tooltips', 'bsc'),
        'buttonrel'     => __('Extra Class','bsc'),
        'buttondropdown'     => __('Button Dropdown','bsc'),
        'buttonsdropdown'     => __('Button Split Dropdown','bsc'),
        'buttongroup'     => __('Button Group','bsc'),
        'jumbo'     => __('Jumbotron','bsc'),
        'posts'     => __('Posts for grid','bsc'),
        'col'     => __('Columns Grid','bsc'),
        'pname'     => __('Post Type Name','bsc'),
        'idate'     => __('Include Date','bsc'),
        'isize'     => __('Image Size (Wordpress name)','bsc'),
        'itaxtitle'     => __('Include Taxonomy Title','bsc'),
        'cardesc'     => __('Insert Carousel from custom post type','bsc'),
        'carslug'     => __('Slug Custom Post Type','bsc'),
        'cartax'     => __('Show Taxonomy that the post in','bsc'),
        'cartit'     => __('Title that goes before','bsc'),
        'carel'     => __('Elements visibles','bsc'),
        'cartyp'     => __('Type of entries','bsc'),
        'carshow'     => __('Show Titles post in carousel','bsc'),
        'no'     => __('No','bsc'),
        'yes'     => __('Yes','bsc'),
        'colum'     => __('columns','bsc'),
        'post'     => __('Post','bsc'),
        'tax'     => __('Taxonomy','bsc'),
        'large'     => __('Large','bsc'),
        'sm'     => __('Small','bsc'),
        'xs'     => __('Extra Small','bsc'),
        'def'     => __('Default','bsc'),
        'self'     => __('Self','bsc'),
        'neww'     => __('New Window','bsc'),
        'bnone'     => __('None','bsc'),
        'nof'     => __('Nofollow','bsc')
    );

    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.bsc_mce_button", ' . json_encode( $strings ) . ");\n";

    return $translated;
}

$strings = bsc_mce_button_translation();
