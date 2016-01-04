<?php
/*
 * Image Post Slider
 * @since v1.2
 */
if( !function_exists('btsc_imagescroll_shortcode') ) {
	function btsc_imagescroll_shortcode($atts, $content = null) {

        $att = shortcode_atts( array(
            'size' => 'large',
        ), $atts );

        global $post;
        $args = array(
            'post_mime_type' => 'image',
            'post_parent' => $post->ID,
            'post_type' => 'attachment',
            'suppress_filters' => 0,
            'orderby' => 'title',
        	'order' => 'ASC'
        );

        $attachments = get_children( $args );
        $numattach = count($attachments);
        $html = '<div class="image-scroll">';
        foreach ( $attachments as $attachment ) {

            $html .= '<div class="bannerImage">';
            $html .= wp_get_attachment_image( $attachment->ID, esc_attr($att['size']) );
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
    }
	add_shortcode( 'image-scroll', 'btsc_imagescroll_shortcode' );
}
