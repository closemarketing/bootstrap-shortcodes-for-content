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
 * @since v1.0
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
        ), $atts );
        
        $html = '<div id="gridbox" class="row">';
        $args = array(
                'post_type' => esc_attr($att['post_type']),
                'post_parent' => 0,
                'posts_per_page' => esc_attr($att['posts_per_page'])
        );
        
        $postsgrid = get_posts( $args );
        $colw = 12/ esc_attr($att['col']);
        //print_r($postsgrid);
        
        foreach ( $postsgrid as $postg ) :
            $html .= '<div class="col-sm-'.$colw.'">';
            $html .= '<a href="'.get_the_permalink($postg->ID).'">'.get_the_title($postg->ID).'</a>';
            $html .= get_the_post_thumbnail($postg->ID);
            $html .= '</div>';
        endforeach; 
        $html .= '</div>';

        return $html;
	}
	add_shortcode( 'gridbox', 'btsc_gridbox_shortcode' );
}

/*
    <div id="portfolio-filter-content">
        <?php

        if(is_tax()) { $args=array('post_type'=>'proyectos','posts_per_page' => -1,'tipoviaje' => $term_name); } else
                     { $args=array('post_type'=>'proyectos','posts_per_page' => -1); }

        query_posts ($args);

        //start loop
        while (have_posts()) : the_post();

            //get terms
            $terms = get_the_terms( get_the_ID(), 'tipoviaje' );
            $terms_list = get_the_term_list( get_the_ID(), 'tipoviaje' );

            //get meta
            $portfolio_entry_custom_url = get_post_meta($post->ID, 'wpex_portfolio_entry_custom_url', true);
            $portfolio_entry_img_swap = get_post_meta($post->ID, 'wpex_portfolio_entry_img_swap', true);

            //get featured images
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url($thumb,'full'); //get full URL to image

            //crop images
            $featured_image = aq_resize( $img_url, 390, 300, true ); //resize & crop the image

            //set entry url to lightbox
            $portfolio_entry_url = get_permalink($post->ID); 

            //set overlay icon
            $overlay_icon = 'picture'; 

            //show entry only if it has a featured image ?>
            <div class="portfolio-entry grid-4 <?php if($terms) foreach ($terms as $term) echo $term->slug .' '; ?>">
                <div class="portfolio-entry-inner">
                    <div class="portfolio-entry-thumbnail">
                        <a href="<?php echo $portfolio_entry_url; ?>" title="<?php the_title(); ?>" class="portfolio-entry-img-link" >
                            <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" class="portfolio-entry-img" />
                            <div class="overlay-icon"><span class="wpex-icon-<?php echo $overlay_icon; ?>"></span></div>
                        </a><!-- /portfolio-entry-img-link -->

                    </div><!-- /portfolio-entry-img -->
                    <div class="portfolio-entry-description">
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

                            <div class="portfolio-entry-excerpt">
                                <?php
                                !empty($post->post_excerpt) ? $excerpt = get_the_excerpt() : $excerpt = wp_trim_words(get_the_content(), 30);
                                echo $excerpt; ?>
                            </div><!-- .portfolio-entry-excerpt -->


                    </div><!-- .portfolio-entry-description -->

                </div><!-- /portfolio-entry-inner -->
            </div><!-- /portfolio-entry -->
            <?php 
        //end loop	
        endwhile;

        //reset the WP query
        wp_reset_query(); ?>
    </div><!-- /portfolio-content -->
</div><!-- /portfolio-wrap -->
        