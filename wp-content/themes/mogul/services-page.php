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
<section id="services">
<?php echo ('<h1 class="title">'.get_the_title().'</h1>'); 
echo('
<div class="container">
<div class="row">
<div class="wrap">
<h2 onclick="sort(this.innerHTML)">BRIDAL</h2>
<h2 onclick="sort(this.innerHTML)">EVENT</h2>
<h2 onclick="sort(this.innerHTML)">PERSONAL</h2>
<h2 onclick="sort(this.innerHTML)">HOURLY</h2>
</div>
</div>');

	
		?>
		<div id="sort_list" class="row">
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
				echo ("<div class='service_element col-sm-6 col-md-6 col-lg-6'><div class='name'>".get_post_meta( get_the_ID()  , 'service_name', true)."</div><div class='price'>".get_post_meta( get_the_ID()  , 'service_price', true)
				."</div><div class='text'>".get_post_meta( get_the_ID()  , 'service_description', true) . '</div></div>');
			endwhile;
		 }?>
		</div>
		<div class="row second">
			<div class="wrap">
			<h2>ADDITIONAL</h2>
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
					echo ("<div class='element'><div class='text'>".get_post_meta( get_the_ID()  , 'additional_option', true)."</div><div class='price'>".get_post_meta( get_the_ID()  , 'option_price', true)."</div></div>");
				endwhile;
			 }
			?>
			</div>
			<div class="wrap">
			<h2>TRAVEL</h2>
			<?php
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
					echo ("<div class='element'><div class='text'>".get_post_meta( get_the_ID()  , 'travel_option', true)."</div><div class='price'>".get_post_meta( get_the_ID()  , 'travel_price', true)."</div></div>");
				endwhile;
			 }
		
			?>
			</div>
				<div class="wrap">
				<h2>SERVICE EXAMPLES</h2>
					<div class="examples-container">
					<?php
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
							$i=0;
						 $loop = new WP_Query($args);
						 if($loop->have_posts()) {
							while($loop->have_posts()) : 
								$i++;
								$loop->the_post();
								if ($i % 2 !== 0) { 
									echo ("<div class='text left'>".get_post_meta( get_the_ID()  , 'service_example', true) . '</div>');
								}
								else{
									echo ("<div class='text right'>".get_post_meta( get_the_ID()  , 'service_example', true) . '</div>');
								}
							endwhile;
						 }	
					?>
					</div>
				</div>
			</div>
		</div>

	</section>
<?php get_footer(); ?>