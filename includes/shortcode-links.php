<?php
// Links shortcode
if ( !function_exists('btsc_links_shortcode') ) {
function btsc_links_shortcode($atts, $content = null) {
    $args = array(
        'orderby'          => 'name',
        'order'            => 'ASC',
        'limit'            => -1,
        'hide_invisible'   => 1,
        'show_updated'     => 0,
        'echo'             => 1,
        'categorize'       => 1,
        'title_before'     => '<h2>',
        'title_after'      => '</h2>',
        'category_orderby' => 'name',
        'category_order'   => 'ASC',
        'class'            => 'linkcat',
        'category_before'  => '<li id=%id class=%class>',
        'category_after'   => '</li>' );
    $output = "";
    $output .= '<ul class="bookmarks_list mylinks">';
    $output .= wp_list_bookmarks($args);
    $output .= '</ul>';
    }
add_shortcode( 'links', 'btsc_links_shortcode' );
}