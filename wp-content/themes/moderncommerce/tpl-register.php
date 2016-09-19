<?php /* template name: User register */ ?>
<html <?php language_attributes(); ?>>
	<head>
	 	<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="main_content_wrapper user-register">
			<div class="header-logo">
				<a href="<?php echo site_url(); ?>">
					<img src="http://localhost/wordpress/wp-content/uploads/2016/09/logo.png">
				</a>
			</div>
			<div class="registeration-container">
				<form method="post" class="register">

				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<span class="required">*</span><label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> </label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
					</p>

				<?php endif; ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<span class="required">*</span><label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?>:</label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
				</p>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<span class="required">*</span><label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?>:</label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
					</p>

				<?php endif; ?>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<span class="required">*</span><label class="strong-label" for="password_strength"><?php _e( '密码强度', 'woocommerce' ); ?>:</label>
					<span class="password-strong">
                        <i class="strong-01"></i>
                        <i class="strong-02"></i>
                        <i class="strong-03"></i>
                    </span>
				</p>

				<!-- Spam Trap -->
				<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?>:</label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

				<?php do_action( 'woocommerce_register_form' ); ?>
				<?php do_action( 'register_form' ); ?>

				<p class="form-row">
					<!-- Google reCAPTCHA -->
					<div class="g-recaptcha" data-sitekey="6LcLDgcUAAAAAH90Fm-fJUXYrXH21iOMxsN2TjQy"></div>
				</p>

				<p class="woocomerce-FormRow form-row">
					<span class="terms-conditions">我已经认证阅读《用户服务协议》，并完全同意协议中的所有条款。</span>
				</p>
				<p class="woocomerce-FormRow form-row">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
				</p>
				<?php do_action( 'woocommerce_register_form_end' ); ?>
			</form>
			</div>
		</div>
	<?php get_footer(); ?>