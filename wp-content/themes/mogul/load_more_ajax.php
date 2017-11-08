
 <?php 
define('WP_USE_THEMES', false);  
require_once('../../../wp-load.php');
$record_per_load = 4;
$record_loaded = $_POST['count'];
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
		 $i=0;
		 $loop = new WP_Query($args);
		 if($loop->have_posts()) {
			while($loop->have_posts()) : 
				$record_loaded++;
				$loop->the_post();
				$i++;
				if ($i % 2 !== 0) { 
						echo ("<div class='review_element left col-sm-6 col-md-6 col-lg-6'><div class='text'>".
							get_post_meta( get_the_ID()  , 'text', true)."</div>".
							"<div class='name'>".get_post_meta( get_the_ID()  , 'name', true)."</div>".
							"<div class='location'>".get_post_meta( get_the_ID()  , 'location', true) .'</div></div>');
					}
					else{
						echo ("<div class='review_element right col-sm-6 col-md-6 col-lg-6'><div class='text'>".
							get_post_meta( get_the_ID()  , 'text', true)."</div>".
							"<div class='name'>".get_post_meta( get_the_ID()  , 'name', true)."</div>".
							"<div class='location'>".get_post_meta( get_the_ID()  , 'location', true) .'</div></div>');
					}
			endwhile;
		 }
		
?>