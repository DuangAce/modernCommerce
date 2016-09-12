<?php
class MC_footercontact extends WP_Widget {
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'footer_contact',
			'description' => 'Rendering footer Contact us part',
		);
		parent::__construct( 'footer_contact', 'ModernCommerce Footer Contact', $widget_ops );
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
		if(!empty($instance['contact']) || !empty($instance['opentime'])){
			echo "<div class='footer_contact'>";
				echo "<p class='footer_p1'>".$instance['contact']."</p>";
				echo "<p class='footer_p2'>".$instance['opentime']."</p>";
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
		$contact = ! empty( $instance['contact'] ) ? $instance['contact'] : __( '' );
		$opentime = ! empty( $instance['opentime'] ) ? $instance['opentime'] : __( '' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'contact' ) ); ?>"><?php _e( esc_attr( 'Contact Method:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contact' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact' ) ); ?>" type="text" value="<?php echo esc_attr( $contact ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'opentime' ) ); ?>"><?php _e( esc_attr( 'Open Day:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'opentime' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'opentime' ) ); ?>" type="text" value="<?php echo esc_attr( $opentime ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['contact'] = ( ! empty( $new_instance['contact'] ) ) ? strip_tags( $new_instance['contact'] ) : '';
		$instance['opentime'] = ( ! empty( $new_instance['opentime'] ) ) ? strip_tags( $new_instance['opentime'] ) : '';
		return $instance;
	}

}