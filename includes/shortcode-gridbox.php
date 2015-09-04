<?php
/*
 * Grid Box
 * @since v1.0
 */
if( !function_exists('btsc_gridbox_shortcode') ) {
	function btsc_gridbox_shortcode($atts, $content = null) {
        
        if( isset($atts['col']) ) $col= $atts['col']; else $col = 3;
        
        $att = shortcode_atts( array(
            'post_type' => 'page',
            'posts_per_page' => -1,
            'col' => 3,
            'size' => 'thumb-col-'.$col,
            'date' => false
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
        $sizethumb = esc_attr($att['size']);
        //print_r($postsgrid);
        
        if ( $postsgrid->have_posts() ) :
        while ( $postsgrid->have_posts() ) : $postsgrid->the_post(); 
            $html .= '<div class="gridbox-container thumbnail col-sm-'.$colw.' col-xs-12">';
            $html .= '<div class="gridbox-thumbnail">';
            $html .= '<a href="'.get_the_permalink($postsgrid->post->ID).'">';
            $html .= get_the_post_thumbnail($postsgrid->post->ID, $sizethumb);
            $html .= '</a>';
            $html .= '<div class="captiongrid caption-hover">';
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