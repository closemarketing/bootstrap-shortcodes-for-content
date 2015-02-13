<?php
/**
 * This file has all the main shortcode functions
 * @package Twitter Bootstrap Shortcodes Plugin
 * @since 1.0
 * @author David Perez : http://twitter.com/closemarketing
 * @copyright Copyright (c) 2015, David Perez
 * @link https://www.closemarketing.es
 * @License: GNU General Public License version 3.0
 * @License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */


/*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');


/*
 * Grid Box
 * @since v1.0
 */
if( !function_exists('btsc_gridbox_shortcode') ) {
	function btsc_gridbox_shortcode($atts, $content = null) {
        
        $att = shortcode_atts( array(
            'post_type' => 'page',
            'posts_per_page' => -1,
            'col' => 3,
            'date' => false
        ), $atts );
        
        $html = '<div id="gridbox" class="row">';
        $args = array(
                'post_type' => esc_attr($att['post_type']),
                'post_parent' => 0,
                'posts_per_page' => esc_attr($att['posts_per_page']),
                'orderby' => 'date'
        );
        
        $postsgrid = get_posts( $args );
        $colw = 12/ esc_attr($att['col']);
        //print_r($postsgrid);
        
        foreach ( $postsgrid as $postg ) :
            $html .= '<div class="gridbox-container col-sm-'.$colw.'">';
            $html .= '<div class="gridbox-thumbnail">';
            $html .= '<a href="'.get_the_permalink($postg->ID).'">';
            $html .= get_the_post_thumbnail($postg->ID, 'thumb-col-'.$col);
            $html .= '</a>';
            $html .= '<div class="captiongrid">';
            $html .= '<h2 class="titlegrid">';
            if(esc_attr($att['date'])) { 
                $html .= '<span class="postdate">';
                $html .= get_the_date('d/m', $postg->ID);
                $html .= '</span>  ';
            }
            $html .= '<a href="'.get_the_permalink($postg->ID).'">'.get_the_title($postg->ID).'</a></h2>';
            $html .= '</div> </div> </div>';
        endforeach; 
        $html .= '</div>';

        return $html;
	}
	add_shortcode( 'gridbox', 'btsc_gridbox_shortcode' );
}