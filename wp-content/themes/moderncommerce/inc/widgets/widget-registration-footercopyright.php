<?php
/**
 * Adds Foo_Widget widget.
 */
class MC_footercopyright extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'footer_copyright',
			'description' => 'Rendering footer Copyright Section',
		);
		parent::__construct( 'footer_copyright', 'ModernCommerce Footer Copyright', $widget_ops );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( ! empty( $instance['copyright'] ) ) {
			echo "<div class='footer_copyright'>";
				echo "<span class='mc_copyright'>".$instance['copyright']."</span>";
			echo "</div>";
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$copyright = ! empty( $instance['copyright'] ) ? $instance['copyright'] : __( '' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'copyright' ) ); ?>"><?php _e( esc_attr( 'Copyright:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'copyright' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'copyright' ) ); ?>" type="text" value="<?php echo esc_attr( $copyright ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['copyright'] = ( ! empty( $new_instance['copyright'] ) ) ? strip_tags( $new_instance['copyright'] ) : '';

		return $instance;
	}

}