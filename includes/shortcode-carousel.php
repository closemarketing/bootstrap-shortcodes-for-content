<?php

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
