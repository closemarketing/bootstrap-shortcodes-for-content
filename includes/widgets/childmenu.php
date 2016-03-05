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

class BSC_ChildMenu extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_childmenu', 'description' => __('It gives you a menu with child pages.', 'bsc'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('childmenutext', __('Menu Child Pages','bsc'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$ordermenu = apply_filters( 'widget_ordermenu', empty( $instance['ordermenu'] ) ? '' : $instance['ordermenu'], $instance );
		$titleparent = apply_filters( 'widget_titleparent', empty( $instance['titleparent'] ) ? '' : $instance['titleparent'], $instance );

		echo $before_widget;

        $wpseo_childmenu = get_option('wpseo_childmenu');

        global $post;

        $current_post_type = get_post_type( $post );
        $post_parent = $post->post_parent;
        $tmp_post = $post;

        if($post_parent == 0) {
            $args = array( 'order' => 'ASC',
             'posts_per_page' => -1,
             'orderby' => $ordermenu,
             'post_type' => $current_post_type,
             'post_parent' => $post->ID
            );
			$post_parent_id = $post->ID;
        } else {
            $args = array( 'order' => 'ASC',
             'posts_per_page' => -1,
             'orderby' => $ordermenu,
             'post_type' => $current_post_type,
             'post_parent' => $post_parent );

			$post_parent_id = $post->post_parent;
            }

        $myposts = get_posts( $args );

        if ($myposts) {
			if($titleparent=='show-title') {
			echo '<h2><a href="'.get_the_permalink($post_parent_id).'">'.get_the_title($post_parent_id).'</a></h2>';
			}
            echo '<ul class="menuchild nav nav-pills">';
            foreach( $myposts as $post ) : setup_postdata($post);
                echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
            endforeach;
            $post = $tmp_post;
            setup_postdata($post);
            echo '</ul>';
        }

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['ordermenu'] =  $new_instance['ordermenu'];
        $instance['titleparent'] =  $new_instance['titleparent'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
					'ordermenu' => '',
					'titleparent' => ''
					 	) );
    ?>
        <p><?php _e('Select the options for this widget.','bsc');?></p>

        <p>
            <label for="<?php echo $this->get_field_id( 'ordermenu' ); ?> ">
                <?php _e('Order Menu', 'bsc'); ?>:
            </label>
            <select id="<?php echo $this->get_field_id( 'ordermenu' ); ?>" name="<?php echo $this->get_field_name( 'ordermenu' ); ?>">

                <option value="menu_order" <?php
                    if($instance['ordermenu'] == "menu_order")
                        echo 'selected="selected"';
                ?>><?php _e('Menu Order','bsc');?></option>

                <option value="title" <?php
                    if($instance['ordermenu'] == "title")
                        echo 'selected="selected"';
                ?>><?php _e('Title','bsc');?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'titleparent' ); ?> ">
                <?php _e('Show Parent Page Title', 'bsc'); ?>:
            </label>
            <select id="<?php echo $this->get_field_id( 'titleparent' ); ?>" name="<?php echo $this->get_field_name( 'titleparent' ); ?>">

                <option value="show-title" <?php
                    if($instance['titleparent'] == "show-title")
                        echo 'selected="selected"';
                ?>><?php _e('Show','bsc');?></option>

                <option value="not-show" <?php
                    if($instance['titleparent'] == "not-show")
                        echo 'selected="selected"';
                ?>><?php _e('Not Show','bsc');?></option>
            </select>
        </p>
		<?php
		}
} //from class


/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */

add_action( 'widgets_init', create_function( '', 'register_widget( "BSC_ChildMenu" );' ) );
