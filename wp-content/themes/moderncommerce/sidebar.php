<?php if ( is_active_sidebar( 'recommend-products' ) ) : ?>
	<div class="widget-area" role="complementary">
		<div class="content_box_container">
			<?php dynamic_sidebar( 'recommend-products' ); ?>
		</div>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'product_blocks' ) ) : ?>
	<div class="widget-area" role="complementary">
		<div class="content_box_container">
			<?php dynamic_sidebar( 'product_blocks' ); ?>
		</div>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

