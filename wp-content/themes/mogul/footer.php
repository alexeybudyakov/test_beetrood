	</div>
	<footer>
		<div style="width: 33%; display: inline-block; vertical-align: top;">			
			<h2><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'left_title', true)); ?></h2>
			<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'left_text', true)); ?>
		</div>
		<div style="width: 33%; display: inline-block; vertical-align: top;">
			<h2><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_title', true)); ?></h2>
			<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_text', true)); ?><br>
			<div style="width: 33%; display: inline-block">
				<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_address', true)); ?>
			</div>
			<div style="width: 33%; display: inline-block">
				<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_mail', true)); ?>
			</div>
			<div style="width: 33%; display: inline-block">
				<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_phone', true)); ?>
			</div>
		</div>
		<div style="width: 33%; display: inline-block; vertical-align: top;">
			<h2><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'right_title', true)); ?></h2>
			<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'right_text', true)); ?>
			
			<a href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_facebook', true)); ?>'>facebook</a>
			<a href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_twritter', true)); ?>'>twitter</a>
			<a href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_instagram', true)); ?>'>instagram</a>
			<a href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_p', true)); ?>'>p</a>
			<a href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_in', true)); ?>'>in</a>
			<a href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_mail', true)); ?>'>mail</a>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>