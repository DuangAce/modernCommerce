<?php /* Template Name: Modernshop Template */ ?>

<?php get_header(); ?>

      <?php get_template_part( 'content', 'page' ); ?>

      <?php woocommerce_content(); ?>

      <?php comments_template( '', true ); ?>
      
<?php get_footer(); ?>