<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
	<!-- Header - Top Bar -->
	<header class="header_topbar">
		<div class="content_box_container">
			<div class="greeting">
				<span>您好,欢迎来到罗技官方商城</span>
				<a href="#">请登录</a> <span class="division">|</span>
				<a href="#">注册</a>
			</div>
			<div class="tools">
				<a href="http://localhost/wordpress/my-account/">我的账户</a><span class="division">|</span>
				<a href="http://localhost/wordpress/cart/">购物车</a>
			</div>
		</div>
	</header>
	<!-- Header - Logo and Search -->
	<div class="header_logo_wrapper">
		<div class="content_box_container">
				<div class="logo_search_wrapper">
				<div class="header_logo">
				<?php $home_url = get_site_url(); ?>
					<!-- Logo Images -->
					<a href="<?php echo $home_url; ?>">
						<img src="http://store.logitech.com.cn/images/logo.png">
					</a>
				</div>
				<div class="header_search">
					<form role="search" method="get" id="headersearchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
					    <div class="group formborder header_search_bar">
					    	<input  type="text" value="" name="s" id="header_search_bar" placeholder="罗技游戏节" />
					        <input  type="submit" class="button" id="headersearchsubmit" value="" />
					    </div>
					    <input type="hidden" name="post_type" value="product" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Header - Navigation and Banner -->
	<nav class="navigation-container">
		<div class="content_box_container">
			<?php display_menu(); ?>
		</div>
	</nav>
	