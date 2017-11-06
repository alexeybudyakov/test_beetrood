
 <?php 
define('WP_USE_THEMES', false);  
require_once('../../../wp-load.php');
$name = $_POST['name'];

$args = array('post_type' => 'services_gallery',
			'tax_query' => array(
				array(
					'taxonomy' => 'services_type',
					'field' => 'name',
					'terms' => $name,
					
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
		 }
?>