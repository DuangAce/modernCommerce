<?php /* template name: User login */ ?>
<html <?php language_attributes(); ?>>
	<head>
	 	<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="main_content_wrapper user-login">
			<div class="header-logo">
				<a href="<?php echo site_url(); ?>"><img src="http://localhost/wordpress/wp-content/uploads/2016/09/logo.png"></a>
			</div>
			<div class="login-content">
				<!-- Login main content -->
				<div class="login-background">
					<a href="#">
						<img src="http://localhost/wordpress/wp-content/uploads/2016/09/M280_02.jpg" />
					</a>
					<div class="login-box">

						<form method="post" class="login">
						<h2 class="login-title">登录罗技官方商城</h2>
						<span>还没有账号? <a href="<?php echo site_url().'/注册' ?>">立即注册</a></span>
						<?php do_action( 'woocommerce_login_form_start' ); ?>

						<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
							<!-- <label for="username"><?php //_e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label> -->
							<input type="text" name="username" id="username" placeholder="用户名/手机/邮箱" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
							<i class="icon-login-user"></i>
						</p>
						<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
							<!-- <label for="password"><?php //_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label> -->
							<input type="password" name="password" id="password" placeholder="密码" />
							<i class="icon-login-password"></i>
						</p>

						<?php do_action( 'woocommerce_login_form' ); ?>
						<p class="form-row">
							<!-- Google reCAPTCHA -->
							<div class="g-recaptcha" data-sitekey="6LcLDgcUAAAAAH90Fm-fJUXYrXH21iOMxsN2TjQy"></div>
						</p>
						<p class="form-row">
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

							<label for="rememberme" class="inline">
								<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
							</label>
							<a class="lost-password" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
							<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
						</p>
<!-- 						<p class="woocommerce-LostPassword lost_password">
							
						</p> -->

						<?php do_action( 'woocommerce_login_form_end' ); ?>

						</form>
					</div>
				</div>
			</div>
		</div>
		<?php get_footer(); ?> 
