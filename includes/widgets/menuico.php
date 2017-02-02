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

class BSC_MenuIco extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_MenuIco', 'description' => __('It gives you a menu with child pages.', 'bootstrap-shortcodes-for-content'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('MenuIcotext', __('Menu Child Pages','bootstrap-shortcodes-for-content'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$ordermenu = apply_filters( 'widget_ordermenu', empty( $instance['ordermenu'] ) ? '' : $instance['ordermenu'], $instance );

		echo $before_widget;

        $menu_name = 'menu-homepage';
        echo '<section class="menu-ico clearfix">';

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list = '<ul id="menu-' . $menu_name . '">';

            foreach ( (array) $menu_items as $key => $menu_item ) { ?>
                <div class="col-xs-6 col-sm-4 col-md-2 about-apolo-item">
                <a href="<?php echo get_the_permalink($menu_item->object_id);?>">
                    <?php echo get_the_post_thumbnail($menu_item->object_id, 'menuico'); ?>
                    <span><?php echo $menu_item->title; ?></span></a>
                </div>
        <?php  }
        }
        echo '</section>';

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['ordermenu'] =  $new_instance['ordermenu'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance,
                        array( 'ordermenu' => '' ) );

        $menus = get_registered_nav_menus();

        foreach ( $menus as $location => $description ) {

        	echo $location . ': ' . $description . '<br />';
        }
    ?>
        <p><?php _e('Select the options for this widget.','bootstrap-shortcodes-for-content');?></p>

        <p>
            <label for="<?php echo $this->get_field_id( 'ordermenu' ); ?> ">
                <?php _e('Order Menu', 'bootstrap-shortcodes-for-content'); ?>:
            </label>
            <select id="<?php echo $this->get_field_id( 'ordermenu' ); ?>" name="<?php echo $this->get_field_name( 'ordermenu' ); ?>">

                <option value="menu_order" <?php
                    if($instance['ordermenu'] == "menu_order")
                        echo 'selected="selected"';
                ?>><?php _e('Menu Order','bootstrap-shortcodes-for-content');?></option>

                <option value="title" <?php
                    if($instance['ordermenu'] == "title")
                        echo 'selected="selected"';
                ?>><?php _e('Title','bootstrap-shortcodes-for-content');?></option>
            </select>
        </p>
		<?php
		}
} //from class


/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */

add_action( 'widgets_init', create_function( '', 'register_widget( "BSC_MenuIco" );' ) );
