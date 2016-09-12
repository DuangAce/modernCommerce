<?php

class MC_footercolumns extends WP_Widget{
	#1.constructor
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			"classname" => "footer-column",
			"description" => "Rendering Footer Column at the bottom of the page"
		);
		parent::__construct( 'mc_footercolumns', 'ModernCommerce Footer Column', $widget_ops );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */

	public function widget($args,$instance){
		// echo $args['before_widget'];
		// if( !empty ($instance['title']) ){
		// 	echo $args['before_title'].apply_filters( 'widget_title', $instance['title'].$args['after_title'] );
		// }
		echo '<div class="footer-column-container">';
		if(!empty ( $instance['title'] )){
			echo "<h3>".$instance['title']."</h3>";
		}
		echo "<ul>";
		if(!empty( $instance['content_1'] )){
			if(!empty($instance['link_1'])){
				echo "<li><a href='".$instance['link_1']."'>".$instance['content_1']."</a></span>";
			}else{
				echo "<li><a href='#'>".$instance['content_1']."</a></span>";
			}
			
		}
		if(!empty( $instance['content_2'] )){
			if(!empty($instance['link_2'])){
				echo "<li><a href='".$instance['link_2']."'>".$instance['content_2']."</a></span>";
			}else{
				echo "<li><a href='#'>".$instance['content_2']."</a></span>";
			}
		}
		if(!empty( $instance['content_3'] )){
			if(!empty($instance['link_3'])){
				echo "<li><a href='".$instance['link_3']."'>".$instance['content_3']."</a></span>";
			}else{
				echo "<li><a href='#'>".$instance['content_3']."</a></span>";
			}
		}
		echo "</ul>";
		echo '</div>';
		// echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = !empty ($instance['title']) ? $instance['title'] : __('Footer Title');
		$content_1 = !empty ($instance['content_1']) ? $instance['content_1'] : __('');
		$content_2 = !empty ($instance['content_2']) ? $instance['content_2'] : __('');
		$content_3 = !empty ($instance['content_3']) ? $instance['content_3'] : __('');
		$link_1 = !empty ($instance['link_1']) ? $instance['link_1'] : __('');
		$link_2 = !empty ($instance['link_2']) ? $instance['link_2'] : __('');
		$link_3 = !empty ($instance['link_3']) ? $instance['link_3'] : __('');
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for ="<?php echo esc_attr($this->get_field_id('content_1')); ?>">
				<?php _e(esc_attr('Link Text:')); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('content_1')); ?>" name="<?php echo esc_attr($this->get_field_name('content_1')); ?>" type="textarea" value="<?php echo esc_attr($content_1); ?>">
			<label for ="<?php echo esc_attr($this->get_field_id('link_1')); ?>">
				<?php _e(esc_attr('Link Url:')); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_1')); ?>" name="<?php echo esc_attr($this->get_field_name('link_1')); ?>" type="textarea" value="<?php echo esc_attr($link_1); ?>">
		</p>
		<p>
			<label for ="<?php echo esc_attr($this->get_field_id('content_2')); ?>">
				<?php _e(esc_attr('Link Text:')); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('content_2')); ?>" name="<?php echo esc_attr($this->get_field_name('content_2')); ?>" type="textarea" value="<?php echo esc_attr($content_2); ?>">
			<label for ="<?php echo esc_attr($this->get_field_id('link_2')); ?>">
				<?php _e(esc_attr('Link Url:')); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_2')); ?>" name="<?php echo esc_attr($this->get_field_name('link_2')); ?>" type="textarea" value="<?php echo esc_attr($link_2); ?>">
		</p>
		<p>
			<label for ="<?php echo esc_attr($this->get_field_id('content_3')); ?>">
				<?php _e(esc_attr('Link Text:')); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('content_3')); ?>" name="<?php echo esc_attr($this->get_field_name('content_3')); ?>" type="textarea" value="<?php echo esc_attr($content_3); ?>">
			<label for ="<?php echo esc_attr($this->get_field_id('link_3')); ?>">
				<?php _e(esc_attr('Link Url:')); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_3')); ?>" name="<?php echo esc_attr($this->get_field_name('link_3')); ?>" type="textarea" value="<?php echo esc_attr($link_3); ?>">
		</p>
	<?php }

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
	public function update($new_instance,$old_instance){
		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags($new_instance['title']) : '';
		$instance['content_1'] = ( !empty( $new_instance['content_1'] )) ? strip_tags($new_instance['content_1']) : '';
		$instance['content_2'] = ( !empty( $new_instance['content_1'] )) ? strip_tags($new_instance['content_2']) : '';
		$instance['content_3'] = ( !empty( $new_instance['content_1'] )) ? strip_tags($new_instance['content_3']) : '';
		$instance['link_1'] = ( !empty( $new_instance['link_1'] )) ? strip_tags($new_instance['link_1']) : '';
		$instance['link_2'] = ( !empty( $new_instance['link_2'] )) ? strip_tags($new_instance['link_2']) : '';
		$instance['link_3'] = ( !empty( $new_instance['link_3'] )) ? strip_tags($new_instance['link_3']) : '';
		return $instance; 
	}
}//Class MC_footercolumns