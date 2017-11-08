<?php get_header(); ?>
<img src="<?php echo get_template_directory_uri(); ?>/home1.png" style='position: absolute; z-index: 999; opacity: 0.1; top: 0px; margin-left: calc((100% - 1920px) / 2); '/>
<section id="home">
	<div class="container" >
		<div class="row">
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</section>

	<script>
		$("#home img:first").wrap( "<div class='border-first-img'></div>" );		
		$("#home img:odd").wrap( "<div class='border-second-img'></div>" );
	</script>
<?php get_footer(); ?>