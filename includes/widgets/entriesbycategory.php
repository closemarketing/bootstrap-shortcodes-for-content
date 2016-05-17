<?php
/*
Widget Name: Entries by category
Description: Show entries by category in a widget.
Author: davidperez, closemarketing
Author URI: https://www.closemarketing.es
*/
function widget_entcat() {
	register_widget( 'widget_entcat' );
}
add_action( 'widgets_init', 'widget_entcat' );

class widget_entcat extends WP_Widget {

	// CONSTRUCT WIDGET
	function widget_entcat() {
		$widget_ops = array(
			'classname' 	=> 'widget_entcat',
			'description' => __('Entries by category','bsc'),
			'panels_icon' => 'dashicons dashicons-admin-post',
		);
		parent::__construct( 'widget_entcat', __( 'Entries by category', 'bsc' ), $widget_ops );
	}

	// CREATE WIDGET FORM (WORDPRESS DASHBOARD)
  function form($instance) {
  	  if ( isset( $instance[ 'widget_title' ] ) && isset( $instance[ 'widget_cat' ] ) ) {
      		$widget_title = $instance[ 'widget_title' ];
            $widget_cat = $instance[ 'widget_cat' ];
  		}


  		?>
        <p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e( 'Title for Widget', 'bsc' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo esc_attr( $widget_title );?>" class="widefat"/>
		</p>
          <p>
              <label for="<?php echo $this->get_field_id( 'widget_cat' ); ?> ">
                  <?php _e('Departamento de los Profesionales', 'bsc'); ?>:
              </label>
  			<br />
              <select name="<?php echo $this->get_field_name( 'widget_cat' ); ?>">
                  <option value=""><?php _e('Select a category','bsc');?></option>
                  <?php
                  $categories = get_terms( 'category', array(
	              'orderby' => 'name',
	              'order'   => 'ASC'
	              ) );
                  foreach ( $categories as $category ) {
                      if($widget_cat == $category->term_ID ) $selected = ' selected="selected"'; else $selected ='';
                      printf( '<option value="%1$s"'.$selected.'>%2$s (%3$s '.__('entries','bsc').')</option>',
                          esc_attr( $category->term_id ),
                          esc_html( $category->name ),
                          esc_html( $category->count )
                      );
                  }
                  ?>
              </select>
          </p>
  		<?php


  }

  // UPDATE WIDGET
  function update( $new_instance, $old_instance ) {

    $instance = $old_instance;
    $instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ? strip_tags( $new_instance['widget_title'] ) : '';
	$instance['widget_cat'] = ( ! empty( $new_instance['widget_cat'] ) ) ? strip_tags( $new_instance['widget_cat'] ) : '';

	return $instance;

  }

  // DISPLAY WIDGET ON FRONT END
  function widget( $args, $instance ) {

	  extract( $args );

	// Widget starts to print information
	$widget_title = apply_filters( 'widget_title', $instance[ 'widget_title' ] );
	$widget_cat = apply_filters( 'widget_cat', $instance[ 'widget_cat' ] );

	//$before_widget = str_replace('" id=', ' widget_fullwidth gray" id=', $before_widget);
	echo $before_widget;


     global $wp_query;

     $args = array(
        'order' => 'DESC',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'post_type' => 'post',
        'cat' => $widget_cat
      );

     $the_query = new WP_Query( $args );

	 ?>
     <div class="container">
		 <?php if($widget_title) {?>
		 <div class="title">
			 <h2 class=" section-title text-center"><?php echo $widget_title; ?></h2>
			 <hr class="deblineprof" />
		 </div>
	 	<?php }
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $col = 4;
        include(locate_template('loop-blog.php'));
    endwhile;
    wp_reset_query();?>

    </div>
    <?php
		// Widget ends printing information
		echo $after_widget;

  }

}
