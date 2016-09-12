<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}

	wp_register_sidebar_widget( 
		'ft_services',
		'ModernCommerce Footer Services',
		'render_footer_services', // For Display
		 array(
			'description' => 'Rendering Services in the footer area'
		) 
	);

	//Register controller for rp_colorblocks widget
	wp_register_widget_control(
		'ft_services',
		'ModernCommerce Footer Services',
		'render_footer_services_control'	// For Setting page display
	);

	function render_footer_services_control($args=array(),$params=array()){
		$service_titles = array();
		$service_icon_links = array();
		if(isset($_POST['submitted'])){
			//Assign form name values to the arrays
			for($i = 0; $i < 5;$i++){
				$service_titles[$i] = 'service-title-'.$i;
				$service_icon_links[$i] = 'service-icon-links-'.$i;
			}
			//update database with User Entered value
			for ($counter = 0; $counter < 5; $counter++){
				update_option($service_titles[$counter],$_POST[$service_titles[$counter]]);
				update_option($service_icon_links[$counter],$_POST[$service_icon_links[$counter]]);
			}
		}
		

		for($i = 0; $i<5; $i++){
			$service_titles[$i] = get_option('service-title-'.$i);
			$service_icon_links[$i] = get_option('service-icon-links-'.$i);
		}
	?>
	<section>
		<h2>Service One</h2>
		Service Name:
		<input type="text" class="widefat" name="service-title-0" value="<?php echo stripslashes($service_titles[0]); ?>" />
		<br />
		Service Icon:
		<input type="text" class="widefat" name="service-icon-links-0" value="<?php echo stripslashes($service_icon_links[0]); ?>" />
	</section>
	<section>
		<h2>Service Two</h2>
		Service Name:
		<input type="text" class="widefat" name="service-title-1" value="<?php echo stripslashes($service_titles[1]); ?>" />
		<br />
		Service Icon:
		<input type="text" class="widefat" name="service-icon-links-1" value="<?php echo stripslashes($service_icon_links[1]); ?>" />
	</section>
	<section>
		<h2>Service Three</h2>
		Service Name:
		<input type="text" class="widefat" name="service-title-2" value="<?php echo stripslashes($service_titles[2]); ?>" />
		<br />
		Service Icon:
		<input type="text" class="widefat" name="service-icon-links-2" value="<?php echo stripslashes($service_icon_links[2]); ?>" />
	</section>
	<section>
		<h2>Service Four</h2>
		Service Name:
		<input type="text" class="widefat" name="service-title-3" value="<?php echo stripslashes($service_titles[3]); ?>" />
		<br />
		Service Icon:
		<input type="text" class="widefat" name="service-icon-links-3" value="<?php echo stripslashes($service_icon_links[3]); ?>" />
	</section>
	<section>
		<h2>Service Five</h2>
		Service Name:
		<input type="text" class="widefat" name="service-title-4" value="<?php echo stripslashes($service_titles[4]); ?>" />
		<br />
		Service Icon:
		<input type="text" class="widefat" name="service-icon-links-4" value="<?php echo stripslashes($service_icon_links[4]); ?>" />
	</section>
	<br />
	<br />
	<input type="hidden" name="submitted" value="1" />
	<?php }

	function render_footer_services($args = array(),$params = array()){
		$service_titles = array();
		$service_icon_links = array();

		for($i = 0; $i<5; $i++){
			$service_titles[$i] = get_option('service-title-'.$i);
			$service_icon_links[$i] = get_option('service-icon-links-'.$i);
		}

	?>
	<div class="services-container">
		<span><i class="service-0"><img src="<?php echo $service_icon_links[0]; ?>" /></i><?php echo $service_titles[0]; ?></span>
		<span><i class="service-1"><img src="<?php echo $service_icon_links[1]; ?>" /></i><?php echo $service_titles[1]; ?></span>
		<span><i class="service-2"><img src="<?php echo $service_icon_links[2]; ?>" /></i><?php echo $service_titles[2]; ?></span>
		<span><i class="service-3"><img src="<?php echo $service_icon_links[3]; ?>" /></i><?php echo $service_titles[3]; ?></span>
		<span><i class="service-4"><img src="<?php echo $service_icon_links[4]; ?>" /></i><?php echo $service_titles[4]; ?></span>
	</div>
	<?php }