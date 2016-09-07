<h1>ModernCommerce Theme Option</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields('moderncommerce-settings-group'); ?>
	<?php do_settings_sections( 'Moderncommerce-Settings' ); ?>
	<?php submit_button(); ?>
</form>
