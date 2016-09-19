<?php
	class MC_productblocks extends WP_Widget{
		private $imgLinkFieldName = array();
		private $productFieldName = array();
		private $imgLinks = array();
		private $productLinks = array();
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array( 
				'classname' => 'mc_productblocks',
				'description' => 'Rendering Products in big blocks',
			);
			if($this->imgLinkFieldName == null || $this->productFieldName == null ){
				$this->generate();
			}
			parent::__construct( 'mc_productblocks', 'ModernCommerce Product Blocks', $widget_ops );
		}

		/**
		* Generate all fields' name
		*/
		public function generate(){
			for ($i=0; $i < 6; $i++) { 
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
		<!-- template for frontend -->
		<div class="product-big-block-title">
			<h3 class="main-widget-title">
				<span>
					<?php echo $instance['blocktitle']; ?>
				</span>
			</h3>
		</div>
		<!-- Main Content -->
		<div class="big_blocks_content">
			<div class="vertical_banner">
				<a href="<?php echo $instance[$this->productFieldName[0]] ?>">
					<img src="<?php echo $instance[$this->imgLinkFieldName[0]]; ?>" />
				</a>
			</div>
			<div class="product_blocks_small">
				<ul>
					<?php for($j=1;$j<6;$j++) { ?>
					<li>
						<a href="<?php echo $instance[$this->productFieldName[$j]] ?>">
							<img class="<?php if($j>=3){ echo 'last_3_small_banner'; } ?>" src="<?php echo $instance[$this->imgLinkFieldName[$j]];?>" />
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
			$blocktitle = !empty($instance['blocktitle']) ? $instance['blocktitle'] : __('Block Title');
			echo "<h2>Block Title:</h2>";
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('blocktitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blocktitle' ) ); ?>" type="text" value="<?php echo esc_attr( $blocktitle ); ?>">
		<?php 
			for ($i=0; $i < 6; $i++) { 
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
			$instance['blocktitle'] = ( ! empty( $new_instance['blocktitle'] ) ) ? strip_tags( $new_instance['blocktitle'] ) : '';
			for ($i=0; $i < 6; $i++) { 
				$instance[$this->imgLinkFieldName[$i]] = ( ! empty( $new_instance[$this->imgLinkFieldName[$i]] ) ) ? strip_tags( $new_instance[$this->imgLinkFieldName[$i]] ) : '';
				$instance[$this->productFieldName[$i]] = ( ! empty( $new_instance[$this->productFieldName[$i]] ) ) ? strip_tags( $new_instance[$this->productFieldName[$i]] ) : '';
			}
			return $instance;
		}
	}