 <?php /* Template Name: reviews */?>
 
 <?php get_header(); ?>
<img src="<?php echo get_template_directory_uri(); ?>/home1.png" style='position: absolute; z-index: 999; opacity: 0.1; top: 0px; margin-left: calc((100% - 1920px) / 2); '/>
<section>
<div id="popup_bg" style="display: none; position: fixed; width: 100%; height: 100%; left:0; top:0; background-color: rgba(0,0,0,0.8);">
	<div id="popup" style="position: fixed; width: 600px; height: 600px; left:calc((100% - 600px)/2); top:calc((100% - 600px)/2); background-color: #fff;">
		
		<svg width='30' style='cursor: pointer; float: right; margin-right: 10px; margin-top: 10px;' onclick="popup_bg.style.display='none';" height='30' version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.9 21.9" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 21.9 21.9">
		  <!-- author: https://www.flaticon.com/authors/eleonor-wang -->
		  <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z"/>
		</svg>
		<div id="img"></div>
		<div id="data"></div>
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
<?php 
$record_per_load = 4;
$record_loaded = 0;
the_title(); 
echo('<br>');
?>
		<div id="review_list">
		<?php
		$args = array('post_type' => 'reviews_collection',
		'offset'=>$record_loaded,
		'showposts' => $record_per_load,
			'tax_query' => array(
				array(
					'taxonomy' => 'review_type',
					'field' => 'name',
					'terms' => 'review',
					
				),
			),
		 );
		 $args_all = array('post_type' => 'reviews_collection',
			'tax_query' => array(
				array(
					'taxonomy' => 'review_type',
					'field' => 'name',
					'terms' => 'review',
					
				),
			),
		 );
		
		 $loop_all = new WP_Query($args_all);
		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : 
				$record_loaded++;
				$loop->the_post();
				echo (get_post_meta( get_the_ID()  , 'text', true));
				echo (get_post_meta( get_the_ID()  , 'name', true));
				echo (get_post_meta( get_the_ID()  , 'location', true) . '<br>');
			endwhile;
		 }
		?>
		</div>
		<?php
		if (($loop_all->post_count - $record_loaded)>0)
		echo('<div id="load" onclick="load_more()"><a href="#">Load More</a></div><br>');
		?>
		<div id="count" style='display: none;'><?php echo $record_loaded ; ?></div>
		<script>
		function load_more(){
			var xhr = $.ajax({
							url: "<?php echo get_template_directory_uri(); ?>/load_more_ajax.php",
							type: "post",
							data: "count="+count.innerHTML  ,
							success: function (data) {
								review_list.innerHTML+=data;
								count.innerHTML=parseInt(count.innerHTML)+<?php echo $record_per_load ; ?>;
								if (parseInt(count.innerHTML)>=<?php echo $loop_all->post_count ; ?>) {
									load.style.display="none";
								}
							},
							error: function (jXHR, textStatus, errorThrown) {
								alert(jXHR+textStatus+errorThrown);
							}	
						});
		}
		</script>
		<?php	
		
	$text3='<form action="'.get_site_url().'/contact" method="post">
			<input type="hidden" name="type" value="review">
			<button type="submit">';
				$image = get_post_meta( url_to_postid('header/header') , 'appointment_button', true); 						
						if( $image ) {
							$text3.=wp_get_attachment_image( $image, 'full',"", ["class" => "button"]);
						}
			$text3.='</button></form>';
			echo($text3);
		wp_reset_query();
		

		$args = array('post_type' => 'reviews_collection',
			'tax_query' => array(
				array(
					'taxonomy' => 'review_type',
					'field' => 'name',
					'terms' => 'logo',
					
				),
			),
		 );
		?>
		<div id="logos">
		<?php
		
		 $loop = new WP_Query($args);
		 if($loop->have_posts()) { 
		 echo('<br>');
			while($loop->have_posts()) : $loop->the_post();
				
				?>
				<div class="all_data">
					<div class="url" style='display: none;'>
						<?php echo (get_post_meta( get_the_ID()  , 'url', true));?> 
					</div>
					<div class="desc" style='display: none;'>
						<?php echo (get_post_meta( get_the_ID()  , 'description', true));?> 
					</div>
					<?php
						$image = get_post_meta( get_the_ID() , 'image', true); 						
							if( $image ) {
								echo wp_get_attachment_image( $image, 'full').'<br>';
							}
					?>
				</div>
				<?php
			endwhile;
		 }?> 
		 </div>
		 		<script>
			$("#logos .all_data").click(function () {
				popup_bg.style.display='block';				
				img.innerHTML='<img src="'+this.getElementsByTagName("img")[0].src+'"/>';
				data.innerHTML='<a href="'+this.getElementsByClassName("url")[0].innerHTML+'" >'+this.getElementsByClassName("url")[0].innerHTML+'</a>';
				data.innerHTML+='<p class="description">'+this.getElementsByClassName("desc")[0].innerHTML+'</p>';
			});
		</script>
		<?php
?>
<?php get_footer(); ?>