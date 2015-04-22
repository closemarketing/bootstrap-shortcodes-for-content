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
 * Gallery Shortcode
 * @since v0.1
 */
// Custom filter function to modify default gallery shortcode output
function btsc_shortcode_gallery( $output, $attr ) {

	// Initialize
	global $post, $wp_locale;

	// Gallery instance counter
	static $instance = 0;
	$instance++;

	// Validate the author's orderby attribute
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) unset( $attr['orderby'] );
	}

	// Get attributes from shortcode
	extract( shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr ) );

	// Initialize
	$id = intval( $id );
	$attachments = array();
	if ( $order == 'RAND' ) $orderby = 'none';

	if ( ! empty( $include ) ) {

		// Include attribute is present
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

		// Setup attachments array
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}

	} else if ( ! empty( $exclude ) ) {

		// Exclude attribute is present 
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

		// Setup attachments array
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	} else {
		// Setup attachments array
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}

	if ( empty( $attachments ) ) return '';

	// Filter gallery differently for feeds
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		return $output;
	}

	// Filter tags and attributes
	$itemtag = tag_escape( $itemtag );
	$captiontag = tag_escape( $captiontag );
	$columns = intval( $columns );
	$itemwidth = $columns > 0 ? floor( 100 / $columns ) : 100;
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";

	// Filter gallery CSS
	$output = apply_filters( 'gallery_style', "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->
		<div id='$selector' class='gallery galleryid-{$id}'>"
	);

	// Iterate through the attachments in this gallery instance
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		// Attachment link
		$link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false ); 

		// Start itemtag
		$output .= "<{$itemtag} class='gallery-item'>";

		// icontag
		$output .= "
		<{$icontag} class='gallery-icon'>
			$link
		</{$icontag}>";

		if ( $captiontag && trim( $attachment->post_excerpt ) ) {

			// captiontag
			$output .= "
			<{$captiontag} class='gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
			</{$captiontag}>";

		}

		// End itemtag
		$output .= "</{$itemtag}>";

		// Line breaks by columns set
		if($columns > 0 && ++$i % $columns == 0) $output .= '<br style="clear: both">';

	}

	// End gallery output
	$output .= "
		<br style='clear: both;'>
	</div>\n";

	return $output;

}

// Apply filter to default gallery shortcode
//add_filter( 'post_gallery', 'btsc_shortcode_gallery', 10, 2 );

/*
 * Carousel for Posts Types
 * @since v1.0
 **/

if ( !function_exists('btsc_carouselcpt_shortcode') ) {
	function btsc_carouselcpt_shortcode($atts, $content = null) {
        
        $att = shortcode_atts( array(
            'post_type' => 'page',
            'tax' => '',
            'title' => '',
            'type' => 'post',
            'col' => 3,
            'titlep' => false
        ), $atts );
        
        $html = '<div id="gridcarbox" class="row">';
        $type = esc_attr($att['type']);
        $idcarousel = rand(1,99);
        $col = esc_attr($att['col']);
        $colw = 12/ esc_attr($att['col']);

        if($type =='post') {
            $args = array(
                'post_type' => esc_attr($att['post_type']),
                'post_parent' => 0,
                'posts_per_page' => 6,
                'orderby' => 'title'
            );
            $grid = get_posts( $args );
            
        } elseif($type =='tax') { 
            $grid = get_terms( array(esc_attr($att['tax']) ), 'orderby=count&hide_empty=0' );
        }
                
        $i = 1;
        $idcarousel = rand(1,99);
        $titlep = esc_attr($att['titlep']);
        $html .='
        <div class="container">
            <div class="col-sm-12">';
            if(esc_attr($att['title']) ) { $html.= '<h2>'.esc_attr($att['title']).'</h2>'; }
        $html.='
                <div class="carousel carousel'.$idcarousel.' slide" id="myCarousel'.$idcarousel.'">
                  <div class="carousel-inner">';

        
            foreach ( $grid as $gridg ) : 
                    $html.='
                    <div class="item';
                    if($i == 1) $html.=' active';
                    $html.='">';
        
                    if($type =='post') { 
                        $html.='<div class="col-xs-12 col-sm-'.$colw.'">';
                        $html .= '<a href="'.get_permalink($gridg).'">';
                        $html.= get_the_post_thumbnail( $gridg->ID, 'thumb-col-'.$colw );
                        $html.= '</a>';
                        if($titlep) {
                            $html .= '<div class="captiongrid">';
                            $html .= '<h2 class="titlegrid"><a href="'.get_permalink($gridg).'">';
                            $html .= get_the_title($gridg->ID);
                            $html.= '</a></h2></div>';
                            }
                        $html.='</div>';
                    } elseif($type =='tax') { 
                        $html.='<div class="col-xs-12 col-sm-'.$colw.'">';
                        $html .= '<a href="'.get_term_link($gridg).'">';

                        $tax_term_id = $gridg->term_id;
                        $images = get_option('taxonomy_image_plugin');
                        $html.= wp_get_attachment_image( $images[$tax_term_id], 'medium' );
                        $html.= '</a></div>';
                    }
        
                    $html.='</div>';
                    $i++;
                endforeach;         
        
        
                  $html.='</div>
                  <a class="left carousel-control" href="#myCarousel'.$idcarousel.'" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#myCarousel'.$idcarousel.'" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
        </div>';
        

        $html .="
        <script type='text/javascript'>
        jQuery('#myCarousel".$idcarousel."').carousel({
          interval: 40000
        });

        jQuery('.carousel".$idcarousel." .item').each(function(){
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
        #myCarousel'.$idcarousel.' a.left.carousel-control {left: -75px;}
        #myCarousel'.$idcarousel.' a.right.carousel-control {right: -75px;}
        </style>
        ';
        return $html;
	}
add_shortcode( 'carouselcpt', 'btsc_carouselcpt_shortcode' );
}
