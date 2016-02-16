<?php
/*
 * Image Post Slider
 * @since v0.2
 */
if( !function_exists('btsc_imagepostslider_shortcode') ) {
	function btsc_imagepostslider_shortcode($atts, $content = null) {

        $att = shortcode_atts( array(
            'ids' => '',
			'size' => 'page-thumb'
        ), $atts );

		$idpost = get_the_ID();
		$ids =  preg_replace( '/[^0-9,]+/', '', $att['ids'] );

		if($ids) { // Ids given
			$attachments = explode(',', $ids);

	        $html = '<div class="carousel slide" id="myCarousel">';
	        $html .= '<div class="carousel-inner">';

	        $i = 0;
	        foreach ( $attachments as $attachment ) {
	            $html .= '<div class="item ';
	            if($i==0) $html .= ' active';
	            $html .= '">';
	            $html .= '<div class="bannerImage">';
	            $html .= wp_get_attachment_image( $attachment, $att['size'] );
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

		} else { //children images from post
	        $args = array(
	            'post_mime_type' => 'image',
	            'post_parent' => $idpost,
	            'post_type' => 'attachment',
	            'suppress_filters' => 0
	        );
			$attachments = get_children( $args );
	        $numattach = count($attachments);

			if ( $attachments && $numattach == 1 ) {
	            $html = get_the_post_thumbnail($att['size'], array('class' => 'page-thumb img-rounded'));
	        } elseif ($attachments) {
	        $html = '<div class="carousel slide" id="myCarousel">';
	        $html .= '<div class="carousel-inner">';

	        $i = 0;
	        foreach ( $attachments as $attachment ) {

	            $html .= '<div class="item ';
	            if($i==0) $html .= ' active';
	            $html .= '">';
	            $html .= '<div class="bannerImage">';
	            $html .= wp_get_attachment_image( $attachment->ID, $att['size'] );
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


    }
	add_shortcode( 'imagepostslider', 'btsc_imagepostslider_shortcode' );
}
