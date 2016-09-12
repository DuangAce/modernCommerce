<?php if ( is_active_sidebar( 'footer-column-1' ) ) : ?>
	<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-column-1' ); ?>
			<?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
				<?php dynamic_sidebar( 'footer-column-2' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
				<?php dynamic_sidebar( 'footer-column-3' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
				<?php dynamic_sidebar( 'footer-column-4' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-5' ) ) : ?>
				<?php dynamic_sidebar( 'footer-column-5' ); ?>
			<?php endif; ?>
	</div>
<?php endif; ?>
<?php if ( is_active_sidebar( 'footer-copyright' ) ) : ?>
	<div class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'footer-copyright' ); ?>
	</div>
<?php endif; ?>


