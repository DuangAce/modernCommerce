<?php
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
		if(isset($_POST['bigblocks'])){
			
		}
	}

	function render_product_big_blocks(){

	}

