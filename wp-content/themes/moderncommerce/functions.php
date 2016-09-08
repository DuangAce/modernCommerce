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
}
add_action( 'widgets_init','widgets_initial');

//Add Custom Module to Visual Composer

// add_filter('avf_option_page_data_init', 'add_option_to_settings_page', 10, 1); 
// //Adds options to the "Custom Post Types" option page
// add_filter('avf_option_page_init', 'add_option_tab', 10, 1); 
// //Adds option page to Enfold theme option panel
//     function add_option_tab($avia_pages)
//     {
//         $avia_pages[] = array( 'slug' => 'mysettings', 'parent'=>'avia', 'icon'=>"hammer_screwdriver.png", 'title'=>__('My Tab','avia_framework'));
//         return $avia_pages;
//     }

//     function add_option_to_settings_page($avia_elements)
//     {
//         $avia_elements[] =  array(
//                     "slug"  => "mysettings",
//                     "name"  => __("Custom Message",'avia_framework'),
//                     "desc"  => __("Please enter the message that you would like to dispay to your visitors.",'avia_framework'),
//                     "id"    => "message",
//                     "type"  => "textarea",
//                     "std"   => ""
//                     );

//         return $avia_elements;
//     }