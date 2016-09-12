<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Moderncommerce
 * @since Moderncommerce
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while (have_posts()) : the_post(); ?>

		<?php the_content(); ?>

		<?php endwhile; ?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>