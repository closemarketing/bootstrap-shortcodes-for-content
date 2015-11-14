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
            'height' => '350px',
        ), $atts );

        $image_parallax = wp_get_attachment_image_src( esc_attr($att['id']), 'page-thumb' );
        $html .= '<div class="bg"></div>
<div class="jumbotron">
  <h1>Bootstrap Jumbotron</h1>
</div>';

        //Javascript
        $html .="
        <script type='application/javascript'>
          (function ($) {
            var jumboHeight = $('.jumbotron').outerHeight();
            function parallax(){
                var scrolled = $(window).scrollTop();
                $('.bg').css('height', (jumboHeight-scrolled) + 'px');
            }

            $(window).scroll(function(e){
                parallax();
            });
           }(jQuery));
        </script>";
        $html .='
        <style>
        .bg {
          background: url("'.$image_parallax[0].'") no-repeat center center;
          position: fixed;
          width: 100%;
          height: '.esc_attr($att['height']).';
          top:0;
          left:0;
          z-index: -1;
        }

        .jumbotron {
          height: '.esc_attr($att['height']).';
          color: white;
          text-shadow: #444 0 1px 1px;
          background:transparent;
        }

        </style>
        ';

        return $html;
    }
	add_shortcode( 'parallax', 'btsc_parallax_shortcode' );
}
