<?php
/**
 * Closemarketing 
 * 
 * @package WordPress
 * @subpackage Closemarketing
 * @author Closemarketing <info@closemarketing.es>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if( !class_exists( 'recent_posts' ) ) :
class recent_posts extends WP_Widget {
    function recent_posts() {
    	unregister_widget( 'WP_Widget_Recent_Posts' );
		
        $widget_ops = array( 
            'classname' => 'recent-posts', 
            'description' => __('The latest posts, with a preview thumb.', 'bsc') 
        );

        $control_ops = array( 'id_base' => 'recent-posts' );

        WP_Widget::__construct( 'recent-posts', __('Recent Posts', 'bsc'), $widget_ops, $control_ops );
    }
    
    function widget( $args, $instance ) {
        extract( $args );

        /* User-selected settings. */
        if( !isset( $instance['title'] ) )
            $instance['title'] = '';
            
        $title = apply_filters('widget_title', $instance['title'] );

        $items = isset( $instance['items']) ? $instance['items'] : '';
        $show = isset( $instance['show'] ) ? $instance['show'] : 'nothing';
        $excerpt = isset( $instance['excerpt']) ? $instance['excerpt'] : 'no';
        $excerpt_length = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 10;
        $show_comments = isset( $instance ['show_comments'] ) ? $instance['show_comments'] : 'no';
        $show_date = isset( $instance ['show_date'] ) ? $instance['show_date'] : 'no';

        echo $before_widget;
        
        if ( $title ) echo $before_title . $title . $after_title;

        $args = array(
           'posts_per_page' => $items,
           'orderby' => 'date',
           'ignore_sticky_posts' => 1
        );                            
        
        $args['order'] = 'DESC'; 
        
        $myposts = new WP_Query( $args );
    	
        $html = "\n";       
        $html .= '<div class="recent-post group">'."\n";
        
        if( $myposts->have_posts() ) : while( $myposts->have_posts() ) { $myposts->the_post();
            
            $img = '';
            if(has_post_thumbnail())
                { $img = get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); }
    		    
            $html .= '<div class="hentry-post group row">'."\n";	
				
            if ( $show == 'thumb' ) {
                $html .= '<div class="thumb-img col-sm-4">';
                $html .= '<a href="'.get_permalink().'" title="'.get_the_title().'" class="title">';
                $html .= $img . '</a></div>';
                $html .= '<div class="col-sm-8 text">';
            } elseif ( $show == 'date' ) {
                $html .= '<div class="thumb-date"><span class="month">' . get_the_date('M') . '</span><span class="day">' . get_the_date('d') . '</span></div>';
                $html .= '<div class="col-sm-8 text">';
            } else {
                $html .= '<div class="col-sm-8 text without-thumbnail">';
            }
            
            $html .= the_title( '<a href="'.get_permalink().'" title="'.get_the_title().'" class="title">', '</a>', false );
            
            if ( $excerpt == 'yes' ) {
                $html .= get_the_excerpt();
            }
            if ( $show_date == 'yes' ) {
                $html .= '<p class="post-date">';
                $html .= '<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> ';
                $html .= '<time datetime="'.get_the_time(__('F jS, Y','bsc')).'" pubdate>';
                $html .= get_the_time(__('F jS, Y','bsc'));
                $html .= '</time></p>';
            }

            if ( $show_comments == 'yes' ) {
                $html .= '<p class="post-comments">';
                $number_comments = get_comments_number();
                if ( $number_comments == 0 ) {
                    $html .= __('0 comments', 'bsc');
                } elseif ( $number_comments == 1 ) {
                    $html .= __('1 comment', 'bsc');
                } else {
                    $html .= $number_comments .' '. __('comments', 'bsc');
                }
                $html .= '</p>';
            }
			
            $html .= '</div>'."\n";
    		$html .= '</div>'."\n".'<hr/>';
        
        } endif;
        
        wp_reset_query();
        $html .= '</div>';
        
        echo $html;
        
        add_filter( 'the_content_more_link', 'yit_sc_more_link', 10, 3 );  //shortcode in more links
        
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );

        $instance['items'] = $new_instance['items'];

        $instance['show'] = $new_instance['show'];

        $instance['excerpt'] = $new_instance['excerpt'];

        $instance['excerpt_length'] = $new_instance['excerpt_length'];
        
        $instance['show_date'] = $new_instance['show_date'];
        
        $instance['show_comments'] = $new_instance['show_comments'];

        return $instance;
    }

    function form( $instance ) {   
        /* Impostazioni di default del widget */
        $defaults = array( 
            'title' => __('Recent Posts', 'bsc'), 
            'items' => 3,
            'show' => 'thumb',
            'excerpt' => 'no',
            'excerpt_length' => '10',
            'more_text' => '|| ' . __( 'Read More', 'bsc' ),
            'show_comments' => 'no'
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'bsc' ) ?>:
                 <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'items' ); ?>"><?php _e( 'Items', 'bsc' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'items' ); ?>" name="<?php echo $this->get_field_name( 'items' ); ?>" value="<?php echo $instance['items']; ?>" size="3" />
            </label>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'show' ); ?>"><?php _e( 'Show', 'bsc' ) ?>:
                 <select id="<?php echo $this->get_field_id( 'show' ); ?>" name="<?php echo $this->get_field_name( 'show' ); ?>">
                    <option value="nothing" <?php selected( $instance['show'], 'nothing' ) ?>><?php _e( 'Nothing', 'bsc' ) ?></option>
                     <option value="thumb" <?php selected( $instance['show'], 'thumb' ) ?>><?php _e( 'Thumbnails', 'bsc' ) ?></option>
                     <option value="date" <?php selected( $instance['show'], 'date' ) ?>><?php _e( 'Date', 'bsc' ) ?></option>
                 </select>
            </label>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e( 'Show Excerpt', 'bsc' ) ?>:
                 <select id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>">
                    <option value="yes" <?php selected( $instance['excerpt'], 'yes' ) ?>><?php _e( 'Yes', 'bsc' ) ?></option>
                    <option value="no" <?php selected( $instance['excerpt'], 'no' ) ?>><?php _e( 'No', 'bsc' ) ?></option>
                 </select>
            </label>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>"><?php _e( 'Excerpt Lenght', 'bsc' ) ?>:
                 <input type="text" id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" value="<?php echo $instance['excerpt_length']; ?>"  size="3" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Show Date', 'bsc' ) ?>:
                <select id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>">
                    <option value="yes" <?php selected( $instance['show_date'], 'yes' ) ?>><?php _e( 'Yes', 'bsc' ) ?></option>
                    <option value="no" <?php selected( $instance['show_date'], 'no' ) ?>><?php _e( 'No', 'bsc' ) ?></option>
                </select>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php _e( 'Show Comments', 'bsc' ) ?>:
                <select id="<?php echo $this->get_field_id( 'show_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_comments' ); ?>">
                    <option value="yes" <?php selected( $instance['show_comments'], 'yes' ) ?>><?php _e( 'Yes', 'bsc' ) ?></option>
                    <option value="no" <?php selected( $instance['show_comments'], 'no' ) ?>><?php _e( 'No', 'bsc' ) ?></option>
                </select>
            </label>
        </p>
    <?php
    }
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */

add_action( 'widgets_init', create_function( '', 'register_widget( "recent_posts" );' ) );
endif;