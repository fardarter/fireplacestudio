<?php
/**
 * Tag cloud widget class
 *
 * @since 2.8.0
 */
class FF_WP_Widget_Tag_Cloud extends WP_Widget_Tag_Cloud {

    private function _registerWidget( $id_base, $name, $widget_options = array(), $control_options = array() ) {
		$this->id_base = empty($id_base) ? preg_replace( '/(wp_)?widget_/', '', strtolower(get_class($this)) ) : strtolower($id_base);
		$this->name = $name;
		$this->option_name = 'widget_' . $this->id_base;
		$this->widget_options = wp_parse_args( $widget_options, array('classname' => $this->option_name) );
		$this->control_options = wp_parse_args( $control_options, array('id_base' => $this->id_base) );
	}

	public function __construct() {
        $widget_ops = array( 'description' => __( 'A cloud of your most used tags.', 'default') );
        $this->_registerWidget( 'ff_tag_cloud', __('Tag Cloud - Custom Widget', 'default'), $widget_ops );
	}

	public function widget( $args, $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		if ( !empty($instance['title']) ) {
			$title = $instance['title'];
		} else {
			if ( 'post_tag' == $current_taxonomy ) {
				$title = __('Tags', 'default');
			} else {
				$tax = get_taxonomy($current_taxonomy);
				$title = $tax->labels->name;
			}
		}

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo  $args['before_widget'];
		if ( $title ) {
			echo  $args['before_title'] . ff_wp_kses( $title ) .  $args['after_title'];
		}
		echo '<div class="tagcloud tags clearfix">';

        $tagsText = '';
        ob_start();
		/**
		 * Filter the taxonomy used in the Tag Cloud widget.
		 *
		 * @since 2.8.0
		 * @since 3.0.0 Added taxonomy drop-down.
		 *
		 * @see wp_tag_cloud()
		 *
		 * @param array $current_taxonomy The taxonomy to use in the tag cloud. Default 'tags'.
		 */
		wp_tag_cloud( apply_filters( 'widget_tag_cloud_args', array(
			'taxonomy' => $current_taxonomy
		) ) );

        $tagsText = ob_get_contents();
        ob_end_clean();

        $tagsTextReplaced = str_replace('tag-link-', 'button primary small tag-link-', $tagsText );
        echo ff_wp_kses( $tagsTextReplaced );

		echo "</div>\n";
		echo  $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		return $instance;
	}

	public function form( $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy($instance);
?>
	<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e('Title:', 'default') ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
	<p><label for="<?php echo esc_attr( $this->get_field_id('taxonomy') ); ?>"><?php _e('Taxonomy:', 'default') ?></label>
	<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('taxonomy') ); ?>" name="<?php echo esc_attr( $this->get_field_name('taxonomy') ); ?>">
	<?php foreach ( get_taxonomies() as $taxonomy ) :
				$tax = get_taxonomy($taxonomy);
				if ( !$tax->show_tagcloud || empty($tax->labels->name) )
					continue;
	?>
		<option value="<?php echo esc_attr($taxonomy) ?>" <?php selected($taxonomy, $current_taxonomy) ?>><?php echo strip_tags( $tax->labels->name ); ?></option>
	<?php endforeach; ?>
	</select></p><?php
	}

	public function _get_current_taxonomy($instance) {
		if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) )
			return $instance['taxonomy'];

		return 'post_tag';
	}
}

function ff_tag_cloud_widget_registration() {
  register_widget('FF_WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'ff_tag_cloud_widget_registration');