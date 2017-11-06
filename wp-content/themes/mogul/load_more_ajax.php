
 <?php 
define('WP_USE_THEMES', false);  
require_once('../../../wp-load.php');
$record_per_load = 4;
$record_loaded = $_POST['count'];
echo('<br>');
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