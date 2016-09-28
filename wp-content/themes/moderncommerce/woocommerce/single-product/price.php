<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
<!-- Only display special price for the products which has no variable ( such as color, size ) -->
<!-- Product with variables will read special price as zero ( Need to fix ) -->
<!-- Also, The product with variables, will not display different price when choosing different size or color ( need to fix ) -->
	<!-- <p class="price"><?php //echo $product->get_price_html(); ?></p> -->
	<?php //var_dump($product) ?>
	<?php if ( $product->is_on_sale() && !$product->has_child()) {?>
		<div class="origin-price">
			<label for="origin-price">原价</label>
			<span id="origin-price">
				<?php echo get_woocommerce_currency_symbol(); echo $product->regular_price; ?>
			</span>
		</div>
		<div class="special-price">
			<label for="special-price">特价</label>
			<span id="special-price">
				<?php echo get_woocommerce_currency_symbol();echo $product->sale_price; ?>
			</span>
		</div>
	<?php } else if( isset( $product->regular_price ) && !isset( $product->sale_price ) ) { ?>
		<div class="final-price">
			<label for="final-price">商场价:</label><span id="final-price" class="final-price"><?php echo get_woocommerce_currency_symbol(); echo $product->regular_price; ?></span>
		</div>
	<?php } else { ?>
		<label class="price-label">商场价:</label><p class="price"><?php echo $product->get_price_html(); ?></p>
	<?php } ?>
	<meta itemprop="price" content="<?php echo esc_attr( $product->get_display_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
