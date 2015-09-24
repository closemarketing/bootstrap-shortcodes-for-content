<?php
/*
 * Parallax
 * @since v0.9
 */
if( !function_exists('btsc_parallax_shortcode') ) {
	function btsc_parallax_shortcode($atts, $content = null) {

        global $post;
        $att = shortcode_atts( array(
            'id' => '',
        ), $atts );

        $image_parallax = wp_get_attachment_image_src( esc_attr($att['id']), 'page-thumb' );
        $html .= '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'">';

        //Javascript
        $html .="
        <script type='application/javascript'>
          (function ($) {
            $(document).ready(function(){
               // cache the window object
               $window = $(window);

               $('section[data-type="background"]').each(function(){
                 // declare the variable to affect the defined data-type
                 var $scroll = $(this);

                  $(window).scroll(function() {
                    // HTML5 proves useful for helping with creating JS functions!
                    // also, negative value because we're scrolling upwards
                    var yPos = -($window.scrollTop() / $scroll.data('speed'));

                    // background position
                    var coords = '50% '+ yPos + 'px';

                    // move the background
                    $scroll.css({ backgroundPosition: coords });
                  }); // end window scroll
               });  // end section function
            }); // close out script
           }(jQuery));
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
    }
	add_shortcode( 'parallax', 'btsc_parallax_shortcode' );
}
