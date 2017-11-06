<?php get_header(); ?>
<img src="<?php echo get_template_directory_uri(); ?>/home1.png" style='position: absolute; z-index: 999; opacity: 0.1; top: 0px; margin-left: calc((100% - 1920px) / 2); '/>
<section>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_title(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>