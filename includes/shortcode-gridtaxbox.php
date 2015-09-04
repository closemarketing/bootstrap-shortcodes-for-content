<?php
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
        
        $taxgrid = get_terms( array(esc_attr($att['tax']) ), 
                              array('orderby' => 'name', 
                                    'order'   => 'ASC',
                                    'hide_empty' =>true
                                   ) );
        $colw = 12/ esc_attr($att['col']);
        
        foreach ( $taxgrid as $taxg ) :
            $html .= '<div class="gridtaxbox-container col-sm-'.$colw;
            if(!wp_is_mobile() ) $html.= ' animated fadeInRight delay1 duration3 eds-on-scroll';
            $html.='">';
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