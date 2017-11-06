
 <?php 
define('WP_USE_THEMES', false);  
require_once('../../../wp-load.php');
$name = $_POST['name'];

		$args = array('post_type' => 'portfolio_gallery',
			'tax_query' => array(
				array(
					'taxonomy' => 'photo_gallery',
					'field' => 'name',
					'terms' => $name,
					
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