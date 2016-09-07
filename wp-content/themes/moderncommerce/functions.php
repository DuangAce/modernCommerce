<?php
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