 <?php /* Template Name: portfolio */?>
 
 <?php get_header(); ?>
<img src="<?php echo get_template_directory_uri(); ?>/home1.png" style='position: absolute; z-index: 999; opacity: 0.1; top: 0px; margin-left: calc((100% - 1920px) / 2); '/>
<script type="text/javascript">	
	function sort(name){	
			var xhr = $.ajax({
							url: "<?php echo get_template_directory_uri(); ?>/portfolio_sort_ajax.php",
							type: "post",
							data: "name="+name,
							success: function (data) {								
								sort_list.innerHTML=data;	
								click();
							},
							error: function (jXHR, textStatus, errorThrown) {
								alert(jXHR+textStatus+errorThrown);
							}	
						});
		}
		</script>
<section id="portfolio">
<div id="popup_bg" style="">
	<div id="popup" style="">
		
		<svg width='30' style='cursor: pointer; float: right; margin-right: 10px; margin-top: 10px;' onclick="popup_bg.style.display='none';" height='30' version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.9 21.9" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 21.9 21.9">
		  <!-- author: https://www.flaticon.com/authors/eleonor-wang -->
		  <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z"/>
		</svg>
		<div id="img" style=""></div>
	</div>
</div>
<script>
		$("#popup_bg").click(function () {
				popup_bg.style.display='none';
			});
		$("#popup").click(function (event) {				
				event.stopPropagation();
			});
</script>
<?php echo ('<h1 class="title">'.get_the_title().'</h1>'); 
echo('
<div class="container">
	<div class="row">
		<div class="wrap">');
			$custom_terms = get_terms('photo_gallery');
			foreach($custom_terms as $custom_term) {
				echo('<h2 onclick="sort(this.innerHTML)">'.$custom_term->name.'</h2>');
			}
			?>
		</div>
	</div>
	<div id="sort_list" class="row">
		<?php
		$args = array('post_type' => 'portfolio_gallery',
			'tax_query' => array(
				array(
					'taxonomy' => 'photo_gallery',
					'field' => 'name',
					'terms' => [beauty],
					
				),
			),
		 );
		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : $loop->the_post();
				the_content();
			endwhile;
		 }	
		?>
	</div>
		<script>
			function click(){
				$("#sort_list img").click(function () {
					popup_bg.style.display='block';
					img.innerHTML='<img src="'+this.src+'"/>';
				});
			}
			click();
		</script>
		<div class="bottom_content">
			<?php if (have_posts()): while (have_posts()): the_post(); ?>		
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
	</section>
<?php get_footer(); ?>