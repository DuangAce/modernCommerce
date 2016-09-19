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
    wp_register_script('captcha',"https://www.google.com/recaptcha/api.js",array());
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($current_url == 'http://localhost/wordpress/%E7%99%BB%E9%99%86/' || $current_url == 'http://localhost/wordpress/%E6%B3%A8%E5%86%8C/'){
        wp_enqueue_script('captcha');
    }
    
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
    register_widget( 'MC_colorblocks' );
    register_widget( 'MC_productblocks' );
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

/**

* Add new register fields for WooCommerce registration.

*

* @return string Register fields HTML.

*/

function wooc_extra_register_fields() {
?>
       <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">

       <span class="required">*</span><label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?>:</label>

       <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />

       </p>

       <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">

       <span class="required">*</span><label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?>:</label>

       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p>

       <div class="clear"></div>

       <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">

       <span class="required">*</span><label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?>:</label>

       <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
       </p>

       <?php
    }

 

add_action( 'woocommerce_register_form', 'wooc_extra_register_fields' );