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

/*
 * Grid Taxonomy Box
 * @since v1.1
 */
if( !function_exists('btsc_gridtaxbox_shortcode') ) {
	function btsc_gridtaxbox_shortcode($atts, $content = null) {
        
        $att = shortcode_atts( array(
            'col' => 3,
            'tax' => '',
            'title' => false,
        ), $atts );
        
        $html = '<div id="gridbox" class="row">';
        
        $taxgrid = get_terms( array(esc_attr($att['tax']) ), 'orderby=count&hide_empty=0' );
        $colw = 12/ esc_attr($att['col']);
        
        foreach ( $taxgrid as $taxg ) :
            $html .= '<div class="gridtaxbox-container col-sm-'.$colw.'">';
            $html .= '<div class="gridtaxbox-thumbnail text-center">';
            $html .= '<a href="'.get_term_link($taxg).'">';
        
            $tax_term_id = $taxg->term_id;
            $images = get_option('taxonomy_image_plugin');
            $html.= wp_get_attachment_image( $images[$tax_term_id], 'medium' );

            $html .= '</a>';
            if(esc_attr($att['title'])==true){
                $html .= '<div class="captiongrid">';
                $html .= '<h2 class="titlegrid">';
                $html .= '<a href="'.get_term_link($taxg).'">'.$taxg->name.'</a></h2>';
                $html .= '</div>';
            }
            $html .= '</div> </div>';
        endforeach; 
        $html .= '</div>';

        return $html;
	}
	add_shortcode( 'gridtaxbox', 'btsc_gridtaxbox_shortcode' );
}

/*
 * Carousel for Posts Types
 * @since v1.0
 * Version based on: http://bootsnipp.com/snippets/featured/infinite-carousel-loop
 */
if( !function_exists('btsc_carouselcpt_shortcode') ) {
	function btsc_carouselcpt_shortcode($atts, $content = null) {
        
        $att = shortcode_atts( array(
            'post_type' => 'page',
            'tax' => '',
            'type' => 'post'
        ), $atts );
        
        $html = '<div id="gridcarbox" class="row">';
        $type = esc_attr($att['type']);

        if($type =='post') {
            $args = array(
                'post_type' => esc_attr($att['post_type']),
                'post_parent' => 0,
                'orderby' => 'date'
            );
            $grid = get_posts( $args );
            
        } elseif($type =='tax') { 
            $grid = get_terms( array(esc_attr($att['tax']) ), 'orderby=count&hide_empty=0' );
        }
        $i = 1;
        $html .='
        <div class="container">
            <div class="col-sm-12">
                <div class="carousel slide" id="myCarousel">
                  <div class="carousel-inner">';
        
            foreach ( $grid as $gridg ) :        
                    $html.='
                    <div class="item';
                    if($i == 1) $html.=' active';
                    $html.='">';
        
                    $html.='<div class="col-xs-12 col-sm-4">';
                    $html .= '<a href="'.get_term_link($gridg).'">';
                    
                    $tax_term_id = $gridg->term_id;
                    $images = get_option('taxonomy_image_plugin');
                    $html.= wp_get_attachment_image( $images[$tax_term_id], 'medium' );
                    
                    $html.= '</a></div>';
                    $html.='</div>';
                    $i++;
                endforeach;         
        
        
                  $html.='</div>
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>';
        

        $html .="
<script type='text/javascript'>
jQuery('#myCarousel').carousel({
  interval: 40000
});

jQuery('.carousel .item').each(function(){
  var next = jQuery(this).next();
  if (!next.length) {
    next = jQuery(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo(jQuery(this));
  if (next.next().length>0) {
      next.next().children(':first-child').clone().appendTo(jQuery(this)).addClass('rightest');
  }
  else {
      jQuery(this).siblings(':first').children(':first-child').clone().appendTo(jQuery(this));
  }
});
</script>";
        $html .='
<style>
.carousel-inner .active.left { left: -33%; }
.carousel-inner .next        { left:  33%; }
.carousel-inner .prev        { left: -33%; }
.carousel-control.left,.carousel-control.right {background-image:none;}
.item:not(.prev) {visibility: visible;}
.item.right:not(.prev) {visibility: hidden;}
.rightest{ visibility: visible;}
#myCarousel a.left.carousel-control {left: -75px;}
#myCarousel a.right.carousel-control {right: -75px;}
</style>
        ';
        return $html;
	}
	add_shortcode( 'carouselcpt', 'btsc_carouselcpt_shortcode' );
}