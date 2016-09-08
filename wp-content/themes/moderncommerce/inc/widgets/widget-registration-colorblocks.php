<?php
	//Register recommended products in color blocks
	wp_register_sidebar_widget( 
		'RP_colorblocks',
		'ModernCommerce ColorBlocks',
		'render_colorblocks_recommend',
		 array(
			'description' => 'Rendering 5 Color Blocks to display Recommended Products'
		) 
	);

	//Register controller for rp_colorblocks widget
	wp_register_widget_control(
		'RP_colorblocks',		// id
		'ModernCommerce ColorBlocks',		// name
		'rp_colorblocks_control'	// callback function
	);

	//Allowed setting for rp_colorblocks widget
	function rp_colorblocks_control($args= array(),$params= array()){	
		if(isset($_POST['submitted'])){
			update_option( 'img_link_1', $_POST['img_link_1'] );
			update_option( 'img_link_2', $_POST['img_link_2'] );
			update_option( 'img_link_3', $_POST['img_link_3'] );
			update_option( 'img_link_4', $_POST['img_link_4'] );
			update_option( 'img_link_5', $_POST['img_link_5'] );
		}
		// require_once(get_template_directory().'/inc/templates/mc_rp_colorblocks.php');
		$img_link_1 = get_option('img_link_1');
		$img_link_2 = get_option('img_link_2');
		$img_link_3 = get_option('img_link_3');
		$img_link_4 = get_option('img_link_4');
		$img_link_5 = get_option('img_link_5');
	?>
		Images Link Url:<br />
		1:<input type="text" class="widefat" name="img_link_1" value="<?php echo stripslashes($img_link_1);?>" />
		2:<input type="text" class="widefat" name="img_link_2" value="<?php echo stripslashes($img_link_2);?>" />
		3:<input type="text" class="widefat" name="img_link_3" value="<?php echo stripslashes($img_link_3);?>" />
		4:<input type="text" class="widefat" name="img_link_4" value="<?php echo stripslashes($img_link_4);?>" />
		5:<input type="text" class="widefat" name="img_link_5" value="<?php echo stripslashes($img_link_5);?>" />
		<br />
		<br />

		<input type="hidden" name="submitted" value="1" />	
	<?php }

	//How Widget Will Display
	function render_colorblocks_recommend($args= array(),$params= array()){
		//load options
		$img_link_1 = get_option('img_link_1');
		$img_link_2 = get_option('img_link_2');
		$img_link_3 = get_option('img_link_3');
		$img_link_4 = get_option('img_link_4');
		$img_link_5 = get_option('img_link_5');
	?>

	<!-- Template for color blocks -->
		<div class="rp_colorblocks_container">
			<div class="rp_colorblocks">
			<ul>
				<li>
					<a href="#"><img src="<?php echo $img_link_1; ?>" /></a>
				</li>
				<li>
					<a href="#"><img src="<?php echo $img_link_2; ?>" /></a>
				</li>
				<li>
					<a href="#"><img src="<?php echo $img_link_3; ?>" /></a>
				</li>
				<li>
					<a href="#"><img src="<?php echo $img_link_4; ?>" /></a>
				</li>
				<li>
					<a href="#"><img src="<?php echo $img_link_5; ?>" /></a>
				</li>
			</ul>
			</div>
		</div>
	<?php }

	function get_product_by_sku( $sku ) {
  		global $wpdb;
  		$product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $sku ) );
  		if ( $product_id ) {
  			return new WC_Product( $product_id );
  		}else{
  			return null;
  		}
}