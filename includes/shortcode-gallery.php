<?php
/*
 * Gallery Shortcode
 * @since v0.2
 * Based in thumbnail gallery
 * http://bootsnipp.com/user/snippets/V0y4b
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

        } elseif ( ! empty( $exclude ) ) {

		// Exclude attribute is present
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

		// Setup attachments array
        $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
        } else {
            // Setup attachments array
            $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
        }

	if ( empty( $attachments ) ) return '';

    $output= '<div class="row gallery"><div class="col-sm-12">';

	// Iterate through the attachments in this gallery instance
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		// Attachment link
		$link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false );

        $output.= '
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail-gallery" href="#" data-image-id="" data-toggle="modal" data-title="';
        $output.=$attachment->title;
        $output.='" data-caption="'.$attachment->post_content.'" data-image="';
        $image_thumb = wp_get_attachment_image_src( $attachment->ID, 'thumnnail' );
        $output.=$image_thumb[0];
        $image_full = wp_get_attachment_image_src( $attachment->ID, 'large' );
        $output.='" data-target="#image-gallery">
                <img class="img-responsive" src="'.$image_full[0].'" alt="">
            </a>
        </div>';
    } //foreach attachment
    $output.= '</div>';
    $output.='<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-previous-image">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="font-size:1.5em;" ></span></button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">

                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-next-image">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="font-size:1.5em;" ></span></button>
                </div>
            </div>
        </div>
    </div>
</div>';
    wp_enqueue_script( 'gallery-script', plugins_url( 'gallery.js', __FILE__ ) );

	return $output;

}

// Apply filter to default gallery shortcode
add_filter( 'post_gallery', 'btsc_shortcode_gallery', 10, 2 );
