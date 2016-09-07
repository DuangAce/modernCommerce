<?php
// Admin Page
function moderncommerce_add_admin_page(){
	add_menu_page( 'ModernCommerce Option', 'ModernCommerce', 'manage_options', 'Moderncommerce-Settings', 'moderncommerce_theme_create_page', 'dashicons-store', 85 );
	add_submenu_page( 'Moderncommerce-Settings', 'ModernCommerce Option', 'Settings', 'manage_options', 'Moderncommerce-Settings', 'moderncommerce_create_theme_setting_page' );
	add_submenu_page( 'Moderncommerce-Settings','Color Options','Color Options', 'manage_options', 'moderncommerce-color', 'moderncommerce_create_theme_color_page' );

	//Active Custom Settings
	add_action('admin_init','moderncommerce_settings');
}
add_action('admin_menu','moderncommerce_add_admin_page');

function moderncommerce_theme_create_page(){
	require_once (get_template_directory().'/inc/templates/moderncommerce-admin.php');
}

function moderncommerce_settings(){
	register_setting( 'moderncommerce-settings-group', 'theme_logo');
	add_settings_section( 'moderncommerce-options-wrapper', 'Theme Options', 'moderncommerce_theme_options', 'Moderncommerce-Settings');
	add_settings_field( 'Theme-logo','Theme Logo', 'moderncommerce_theme_logo', 'Moderncommerce-Settings', 'moderncommerce-options-wrapper');
}

function moderncommerce_theme_logo(){
	$logo_name = esc_attr(get_option('theme_logo'));
	echo '<input type="text" name="theme_logo" value="'.$logo_name.'" placeholder="Logo Name" />';
}

function moderncommerce_theme_options(){
	echo "Customize Theme";
}

function moderncommerce_create_theme_setting_page(){

}
function moderncommerce_create_theme_color_page(){

}