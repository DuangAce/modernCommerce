<?php
	class MC_colorblocks extends WP_Widget{
		private $imgLinkFieldName = array();
		private $productFieldName = array();
		private $imgLinks = array();
		private $productLinks = array();

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array( 
				'classname' => 'mc_colorblocks',
				'description' => 'Rendering Recommended Products in color blocks',
			);
			if($this->imgLinkFieldName == null || $this->productFieldName == null ){
				$this->generate();
			}
			parent::__construct( 'mc_colorblocks', 'ModernCommerce Color Blocks', $widget_ops );
		}

		/**
		* Generate all fields' name
		*/
		public function generate(){
			for ($i=0; $i < 5; $i++) { 
				$this->imgLinkFieldName[$i] = "imgLinks_".$i;
				$this->productFieldName[$i] = "productLinks_".$i;
			}
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
		?>
		<!-- Template for color blocks -->
		<div class="rp_colorblocks_container">
			<div class="rp_colorblocks">
			<ul>
				<?php for($i =0; $i <5; $i++) { ?>
				<li>
					<a href="<?php echo $instance[$this->productFieldName[$i]]; ?>">
						<img src="<?php echo $instance[$this->imgLinkFieldName[$i]]; ?>" />
					</a>
				</li>
				<?php } ?>
			</ul>
			</div>
		</div>
		<?php
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			for ($i=0; $i < 5; $i++) { 
				$this->imgLinks[$i] = !empty($instance[$this->imgLinkFieldName[$i]]) ? $instance[$this->imgLinkFieldName[$i]] : __('');
				$this->productLinks[$i] = !empty($instance[$this->productFieldName[$i]]) ? $instance[$this->productFieldName[$i]] : __('');
		?>
		<p>
			<h2>Blocks <?php echo $i; ?></h2>
			<label for="<?php echo esc_attr( $this->get_field_id( $this->imgLinkFieldName[$i]) ); ?>">
				<?php _e( esc_attr( 'Image Link'.$i.':' ) ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id($this->imgLinkFieldName[$i]) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $this->imgLinkFieldName[$i]) ); ?>" type="text" value="<?php echo esc_attr( $this->imgLinks[$i] ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id($this-> productFieldName[$i]) ); ?>"><?php _e( esc_attr( 'Product Link'.$i.':' ) ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $this-> productFieldName[$i]) ); ?>" name="<?php echo esc_attr( $this->get_field_name($this-> productFieldName[$i]) ); ?>" type="text" value="<?php echo esc_attr( $this->productLinks[$i] ); ?>"> 
		</p>
			<?php 
			}
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
			for ($i=0; $i < 5; $i++) { 
				$instance[$this->imgLinkFieldName[$i]] = ( ! empty( $new_instance[$this->imgLinkFieldName[$i]] ) ) ? strip_tags( $new_instance[$this->imgLinkFieldName[$i]] ) : '';
				$instance[$this->productFieldName[$i]] = ( ! empty( $new_instance[$this->productFieldName[$i]] ) ) ? strip_tags( $new_instance[$this->productFieldName[$i]] ) : '';
			}
			return $instance;
		}
	}