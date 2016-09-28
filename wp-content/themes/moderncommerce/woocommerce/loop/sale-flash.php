<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>

<!-- Only Display onsale tag on the products which has no variable ( such as color, size ) -->
<!-- Product with variables will read special price as zero ( Need to fix ) --> 
<?php if ( $product->is_on_sale() && !$product->has_child()  ): ?>

	<?php $percent = 100 - ceil(100 * ($product->sale_price / $product->regular_price )); ?>
	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale"><span class="off-percent">'.$percent.'% OFF</span></span>', $post, $product ); ?>
	<?php //echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale"><span class="off-percent"></span>' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>

<?php endif; ?>
