	</div>
	<footer>
		<div class="foot_element left">			
			<h2><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'left_title', true)); ?></h2>
			<p><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'left_text', true)); ?></p>
			<input>
		</div><!--
		--><div class="foot_element middle" >
			<h2><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_title', true)); ?></h2>
			<p><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_text', true)); ?></p>
			<span>
			
			<div class="middle_bottom_element left">
				<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_location', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
				echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_address', true)); ?>
			</div><!--
			--><div class="middle_bottom_element middle">
				<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_mail', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
				echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_mail', true)); ?>
			</div><!--
			--><div class="middle_bottom_element right">
				<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_pone', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
				echo (get_post_meta( url_to_postid('footer/footer')  , 'middle_phone', true)); ?>
			</div>
			</span>
		</div><!--
		--><div class="foot_element right">
			<h2><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'right_title', true)); ?></h2>
			<p><?php echo (get_post_meta( url_to_postid('footer/footer')  , 'right_text', true)); ?></p>
			
			<a class="social facebook" href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_facebook', true)); ?>'>				
			<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_1', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
			?>
			</a>
			<a class="social twitter"  href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_twritter', true)); ?>'>
						<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_2', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
			?>
			</a>
			<a class="social instagram"  href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_instagram', true)); ?>'>
						<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_3', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
			?>
			</a>
			<a class="social p"  href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_p', true)); ?>'>
						<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_4', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
			?>
			</a>
			<a class="social in"  href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_in', true)); ?>'>
						<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_5', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
			?>
			</a>
			<a class="social mail"  href='http://<?php echo (get_post_meta( url_to_postid('footer/footer')  , 'link_mail', true)); ?>'>
						<?php $image = get_post_meta( url_to_postid('footer/footer') , 'img_6', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full');
						}
			?>
			</a>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>