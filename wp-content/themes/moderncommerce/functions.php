<?php
require get_template_directory().'/inc/function-admin.php';
/**
* Include All Css Files
*/ 
function include_all_css()
{
    // Register the style like this for a theme:
    wp_register_style( 'theme-default', get_template_directory_uri() . '/css/theme-default.css', array(), '1.0.0', 'all' );
 
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'theme-default' );
}
add_action( 'wp_enqueue_scripts', 'include_all_css' );

/**
* Register Menus
*/
function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'vertical-menu' => __( 'Vertical Menu' )
    )
  );
}
add_action( 'init', 'register_menus' );

function display_menu_header(){
	if(has_nav_menu('header-menu')){
		wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
	}
}

function display_menu_side(){
  if(has_nav_menu('vertical-menu')){
    wp_nav_menu( array( 'theme_location' => 'vertical-menu' ) );
  }
}

// Remove Admin Bar in the front end
function admin_bar() {
    return false;
}
add_filter('show_admin_bar', 'admin_bar');

//Add Widgets Functionality
function widgets_initial(){
    require_once (get_template_directory().'/inc/widgets/widget-area-declare.php');
    require_once (get_template_directory().'/inc/widgets/widget-registration-colorblocks.php');
    require_once(get_template_directory().'/inc/widgets/widget-registration-productblocks.php');
    require_once(get_template_directory().'/inc/widgets/widget-registration-footerservices.php');
    require_once(get_template_directory().'/inc/widgets/widget-registration-footercolumns.php');
    require_once(get_template_directory().'/inc/widgets/widget-registration-footercontact.php');
    require_once(get_template_directory().'/inc/widgets/widget-registration-footercopyright.php');
    register_widget( 'MC_footercolumns' );
    register_widget( 'MC_footercontact' );
    register_widget( 'MC_footercopyright' );
}
add_action( 'widgets_init','widgets_initial');

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Appartment'
    $defaults['home'] = '首页';
    return $defaults;
}