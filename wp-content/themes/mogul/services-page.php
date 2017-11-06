 <?php /* Template Name: service */?>
 
 <?php get_header(); ?>
<img src="<?php echo get_template_directory_uri(); ?>/home1.png" style='position: absolute; z-index: 999; opacity: 0.1; top: 0px; margin-left: calc((100% - 1920px) / 2); '/>
<script type="text/javascript">	
	function sort(name){	
			var xhr = $.ajax({
							url: "<?php echo get_template_directory_uri(); ?>/services_sort_ajax.php",
							type: "post",
							data: "name="+name,
							success: function (data) {								
								sort_list.innerHTML=data;								
							},
							error: function (jXHR, textStatus, errorThrown) {
								alert(jXHR+textStatus+errorThrown);
							}	
						});
		}
		</script>
		<section>
<?php the_title(); 

echo('<p onclick="sort(this.innerHTML)">BRIDAL</p>
<p onclick="sort(this.innerHTML)">EVENT</p>
<p onclick="sort(this.innerHTML)">PERSONAL</p>
<p onclick="sort(this.innerHTML)">HOURLY</p><br>');

	
		?>
		<div id="sort_list">
		<?php
		$args = array('post_type' => 'services_gallery',
			'tax_query' => array(
				array(
					'taxonomy' => 'services_type',
					'field' => 'name',
					'terms' => 'event',
					
				),
			),
		 );

		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : $loop->the_post();
				echo (get_post_meta( get_the_ID()  , 'service_name', true));
				echo (get_post_meta( get_the_ID()  , 'service_price', true));
				echo (get_post_meta( get_the_ID()  , 'service_description', true) . '<br>');
			endwhile;
		 }?>
		</div>
		<?php
		wp_reset_query();
		$args = array('post_type' => 'services_gallery',
			'tax_query' => array(
				array(
					'taxonomy' => 'services_type',
					'field' => 'name',
					'terms' => 'additional',
					
				),
			),
		 );

		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : $loop->the_post();
				echo (get_post_meta( get_the_ID()  , 'additional_option', true));
				echo (get_post_meta( get_the_ID()  , 'option_price', true).'<br>');
			endwhile;
		 }
	
		wp_reset_query();
		$args = array('post_type' => 'services_gallery',
			'tax_query' => array(
				array(
					'taxonomy' => 'services_type',
					'field' => 'name',
					'terms' => 'travel',
					
				),
			),
		 );

		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : $loop->the_post();
				echo (get_post_meta( get_the_ID()  , 'travel_option', true));
				echo (get_post_meta( get_the_ID()  , 'travel_price', true).'<br>');
			endwhile;
		 }
	
	
		wp_reset_query();
		$args = array('post_type' => 'services_gallery',
			'tax_query' => array(
				array(
					'taxonomy' => 'services_type',
					'field' => 'name',
					'terms' => 'example',
					
				),
			),
		 );

		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : $loop->the_post();
				echo (get_post_meta( get_the_ID()  , 'service_example', true) . '<br>');
			endwhile;
		 }
	
	
	
	
	
	
	?>
	</section>
<?php get_footer(); ?>