<?php if ( is_active_sidebar( 'after-slider' ) ) : ?>
	<div class="widget-area-first" role="complementary">
		<div class="content_box_container">
			<?php dynamic_sidebar( 'after-slider' ); ?>
		</div>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'product-blocks' ) ) : ?>
	<div class="widget-area" role="complementary">
		<div class="content_box_container">
			<?php dynamic_sidebar( 'product-blocks' ); ?>
		</div>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

