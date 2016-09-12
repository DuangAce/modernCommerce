<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}

	//Register recommended products in color blocks
	wp_register_sidebar_widget( 
		'product_big_blocks',
		'ModernCommerce BigBlocks',
		'render_product_big_blocks',
		 array(
			'description' => 'Rendering 6 Products in a big blocks section'
		) 
	);

	wp_register_widget_control(
		'product_big_blocks',		// id
		'ModernCommerce BigBlocks',		// name
		'product_bigblocks_control'	// callback function
	);

	function product_bigblocks_control($arg=array(),$params= array()){
		if(isset($_POST['submitted'])){
			update_option( 'product-big-block-title', $_POST['product-big-block-title'] );
			update_option('vertical-banner',$_POST['vertical-banner']);
			update_option('product-banner-small-1',$_POST['product-banner-small-1']);
			update_option('product-banner-small-2',$_POST['product-banner-small-2']);
			update_option('product-banner-small-3',$_POST['product-banner-small-3']);
			update_option('product-banner-small-4',$_POST['product-banner-small-4']);
			update_option('product-banner-small-5',$_POST['product-banner-small-5']);
		}
		$product_big_block_title = get_option('product-big-block-title');
		$vertical_banner = get_option('vertical-banner');
		$product_banner_small = array();
		for($i = 1; $i<6 ; $i++){
			$product_banner_small[$i] = get_option('product-banner-small-'.$i);
		}
		// $product_banner_small_1 = get_option('product-banner-small-1');
		// $product_banner_small_2 = get_option('product-banner-small-2');
		// $product_banner_small_3 = get_option('product-banner-small-3');
		// $product_banner_small_4 = get_option('product-banner-small-4');
		// $product_banner_small_5 = get_option('product-banner-small-5');
	?>
	<br />
	<!-- Template For Big Block Setting -->
		Title:<input type="text" class="widefat" name="product-big-block-title" value="<?php echo stripslashes($product_big_block_title); ?>" />
		<br />
		Verical Banner Image Url:<br />
		<input type="text" class="widefat" name="vertical-banner" value="<?php echo stripslashes($vertical_banner); ?>">
		<br />
		Product Banner Small Image Url:<br />
		1:<input type="text" class="widefat" name="product-banner-small-1" value="<?php echo stripslashes($product_banner_small[1]); ?>">
		2:<input type="text" class="widefat" name="product-banner-small-2" value="<?php echo stripslashes($product_banner_small[2]); ?>">
		3:<input type="text" class="widefat" name="product-banner-small-3" value="<?php echo stripslashes($product_banner_small[3]); ?>">
		4:<input type="text" class="widefat" name="product-banner-small-4" value="<?php echo stripslashes($product_banner_small[4]); ?>">
		5:<input type="text" class="widefat" name="product-banner-small-5" value="<?php echo stripslashes($product_banner_small[5]); ?>">
	<br />
	<br />
	<input type="hidden" name="submitted" value="1" />
	<?php }

	function render_product_big_blocks($arg=array(),$params= array()){
		$product_big_block_title = get_option('product-big-block-title');
		$vertical_banner = get_option('vertical-banner');
		$product_banner_small = array();
		for($i = 1; $i<6 ; $i++){
			$product_banner_small[$i] = get_option('product-banner-small-'.$i);
		}
		// $product_banner_small_1 = get_option('product-banner-small-1');
		// $product_banner_small_2 = get_option('product-banner-small-2');
		// $product_banner_small_3 = get_option('product-banner-small-3');
		// $product_banner_small_4 = get_option('product-banner-small-4');
		// $product_banner_small_5 = get_option('product-banner-small-5');
	?>
		<!-- template for frontend -->
		<div class="product-big-block-title">
			<h3 class="main-widget-title">
				<span>
					<?php echo $product_big_block_title; ?>
				</span>
			</h3>
		</div>
		<!-- Main Content -->
		<div class="big_blocks_content">
			<div class="vertical_banner">
				<a href="#"><img src="<?php echo $vertical_banner; ?>" /></a>
			</div>
			<div class="product_blocks_small">
				<ul>
					<?php for($j=1;$j<6;$j++) { ?>
					<li>
						<a href="#"><img class="<?php if($j>=3){ echo 'last_3_small_banner'; } ?>" src="<?php echo $product_banner_small[$j];?>" /></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	<?php }

