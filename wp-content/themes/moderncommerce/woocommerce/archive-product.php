<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<!-- main content area -->
<div class="main_content_wrapper">
    <div class="content_box_container">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
                echo "<div class='filter-container'>";
				do_action( 'woocommerce_before_shop_loop' );
                echo "</div>";
			?>

			<?php 
				/**
			    *	Woocommerce Product Filter
			    */
			     echo "<div class='product-filter-container'>";
			     	echo "<div class='product-filter-breadcrump'>";
			     		echo "<a href='#'>全部分类</a> > <a href='#'> 个人电脑周边产品 </a> >";
		?>
			<form role="search" method="get" class="woocommerce-product-search" action="<?php echo site_url() ?>">
				<input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Search Products…" value="" name="s" title="Search for:">
				<input type="submit" id="filtersearchsubmit" value="">
				<input type="hidden" name="post_type" value="product">
			</form>
		<?php
			     	echo "</div>";
			     	get_sidebar('filter');
				echo "<div class='price-filter'><h2>价格:</h2>
                <a href=".site_url().'/?min_price=0&max_price=49&post_type=product'.">$0-$49</a>
                <a href=".site_url().'/?min_price=50&max_price=99&post_type=product'.">$50-$99</a>
                <a href=".site_url().'/?min_price=100&max_price=149&post_type=product'.">$100-$149</a>
                <a href=".site_url().'/?min_price=150&max_price=199&post_type=product'.">$150-$199</a>
                <a href=".site_url().'/?min_price=200&post_type=product'.">Over $200</a>
                </div>";
			     echo "</div>";
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
    </div>
</div>

<?php get_footer( 'shop' ); ?>
