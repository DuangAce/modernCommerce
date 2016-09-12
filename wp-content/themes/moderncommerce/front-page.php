<?php get_header(); ?>
<!-- main content area -->
<div class="main_content_wrapper">
	<!-- get all the widgets -->
	<?php get_sidebar(); ?>
	<div class="content_box_container">
		<!-- display Page Content dynamicly -->
		<?php while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>
	</div>
</div>

<?php get_sidebar('service'); ?>
<?php 
	/*if(is_active_sidebar( 'product-blocks' )){ 
		echo "yeah!"; 
	}else { 
		echo "Whoooops"; 
	}*/ 
?>

<!-- end of main content area -->
<?php get_footer(); ?>
<!-- <script>
	window.onload = function(){
		var count = 0;
		var colorList = ['#ff6861', '#02eacf'];
		var length =  colorList.length;
		var interval = setInterval(function(){
			var background  = document.getElementById('whole_banner_container');
			background.style.backgroundColor = colorList[count];
			background.style.transitionDuration = '1s';
			count++;
			if(count>length){
				count = 0;
			}
		},2000);
	}
</script> -->
</body>
</html>