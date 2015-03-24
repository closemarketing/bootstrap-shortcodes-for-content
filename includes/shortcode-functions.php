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
 * @since v0.1
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
            'date' => false,
            'tax' => ''
        ), $atts );
        
        $html = '<div id="gridbox" class="row">';
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        
        //$html .= esc_attr($att['posts_per_page']). " ". $paged;
        
        $args = array(
                'post_type' => esc_attr($att['post_type']),
                'post_parent' => 0,
                'posts_per_page' => esc_attr($att['posts_per_page']),
                'orderby' => 'date',
                'paged' => $paged
        );
        
        $postsgrid = new WP_Query( $args );
        $colw = 12/ $att['col'];
        //print_r($postsgrid);
    
        
        if ( $postsgrid->have_posts() ) :
        while ( $postsgrid->have_posts() ) : $postsgrid->the_post(); 
            $html .= '<div class="gridbox-container col-sm-'.$colw.' col-xs-12">';
            $html .= '<div class="gridbox-thumbnail">';
            $html .= '<a href="'.get_the_permalink($postsgrid->post->ID).'">';
            $html .= get_the_post_thumbnail($postsgrid->post->ID, 'thumb-col-'.$att['col']);
            $html .= '</a>';
            $html .= '<div class="captiongrid">';
            if(esc_attr($att['tax'])) { 
                $terms = get_the_terms( $postg->ID, esc_attr($att['tax']) );
                if ( $terms && ! is_wp_error( $terms ) ) : 
                $tax_links = array();
                    foreach ( $terms as $term ) {
                        $tax_links[] = $term->name;
                    }
                $tax_text = join( ", ", $tax_links );
                endif;

                $html .= '<span class="taxonomy">';
                $html .= $tax_text;
                $html .= '</span>  ';
            }
            $html .= '<h2 class="titlegrid">';
            if(esc_attr($att['date'])) { 
                $html .= '<span class="postdate">';
                $html .= get_the_date('d/m', $postsgrid->post->ID);
                $html .= '</span>  ';
            }
            $html .= '<a href="'.get_the_permalink($postsgrid->post->ID).'">'.get_the_title($postsgrid->post->ID).'</a></h2>';
            $html .= '</div> </div> </div>';
        endwhile; 
        wp_reset_postdata();
        $html .= get_next_posts_link( 'Older Entries', $postsgrid->post->max_num_pages );
        $html .= get_previous_posts_link( 'Next Entries &raquo;' );

        endif;
        $html .= '</div>';

        return $html;
	}
	add_shortcode( 'gridbox', 'btsc_gridbox_shortcode' );
}

/*
 * Image Post Slider
 * @since v0.2
 */
if( !function_exists('btsc_imagepostslider_shortcode') ) {
	function btsc_imagepostslider_shortcode($atts, $content = null) {
        
        global $post;
        $args = array(
            'post_mime_type' => 'image',
            'post_parent' => $post->ID,
            'post_type' => 'attachment',
            'suppress_filters' => 0
        );

        $attachments = get_children( $args );
        $numattach = count($attachments);

        if ( $attachments && $numattach == 1 ) {
            $html = get_the_post_thumbnail('page-thumb', array('class' => 'page-thumb img-rounded'));
        } elseif ($attachments) {
            
        $html = '<div class="carousel slide" id="myCarousel">';
        $html .= '<div class="carousel-inner">';

        $i = 0;
        foreach ( $attachments as $attachment ) {

            $html .= '<div class="item ';
            if($i==0) $html .= ' active';
            $html .= '">';
            $html .= '<div class="bannerImage">';
            $html .= get_the_post_thumbnail( $post->ID, 'page-thumb' );
            $html .= '</div>';
            $html .= '</div><!-- /Slide -->' ;
            $i++;
        }
        $html .= '</div>';
        $html .= '<div class="control-box">';
        $html .= '<a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a>';
        $html .= '<a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>';
        $html .= '</div><!-- /.control-box -->';
        $html .= '</div>';
            
        return $html;
        }
    }
	add_shortcode( 'imagepostslider', 'btsc_imagepostslider_shortcode' );
}