 <?php /* Template Name: contact */?>
 
<?php get_header(); ?>
<section id='contact_page'>
<?php 
if (!isset($_POST['type'])){
	$_POST['type']='contact';
}
if (isset($_POST['added'])){
	echo ('thanks for your review<br>');
	$name = $_POST['user_name'];
	$text = $_POST['text'];
	$location = 'Test Address';
	
	$insert = wp_insert_post(
	array('post_type' => 'reviews_collection',
	'post_title'=>'New Review'.time(),
	'post_status' => 'publish',
	'text'=>$text,
			'tax_input' => array(
				array(
					'taxonomy' => 'review_type',
					'field' => 'name',
					'terms' => [review],
					
				))));
	wp_set_object_terms($insert, 'review', 'review_type', true);
  update_post_meta( $insert, 'text', $text);
  update_post_meta( $insert, 'name', $name);
  update_post_meta( $insert, 'location', $location);
  
	
}
switch($_POST['type']){
	case 'contact':
		echo("<h1>".get_the_title()."</h1>"); 
		$image = get_post_meta( url_to_postid('header/header') , 'submit_button', true); 						
						if( $image ) {
							$text1.=wp_get_attachment_image( $image, 'full',"", ["class" => "button"]);
						}
		$text = '<form action="'.get_site_url().'/contact" method="post">'.
			'<input type="hidden" name="added" value="true">'.
			'<input type="hidden" name="type" value="contact">'.
			'<label>Name <input required name="user_name"></label>'.
			'<label>E-mail <input required type="email" name="email"></label>'.
			'<label>Phone Number <input required  name="phone"></label>'.
			'<label>Inqury <textarea required name="text"></textarea>
			<div class="line"></div></label>'.
			'<button type="submit">'.$text1.'</button>'.
			'</form>';
		echo($text);
		$text2='<form action="'.get_site_url().'/contact" method="post">
			<input type="hidden" name="type" value="appointment">
			<button type="submit">';
				$image = get_post_meta( url_to_postid('header/header') , 'appointment_button', true); 						
						if( $image ) {
							$text2.=wp_get_attachment_image( $image, 'full',"", ["class" => "button"]);
						}
			$text2.='</button></form>';
			echo($text2);
		$text3='<form action="'.get_site_url().'/contact" method="post">
			<input type="hidden" name="type" value="review">
			<button type="submit">';
				$image = get_post_meta( url_to_postid('header/header') , 'review_button', true); 						
						if( $image ) {
							$text3.=wp_get_attachment_image( $image, 'full',"", ["class" => "button"]);
						}
			$text3.='</button></form>';
			echo($text3);
	break;
	case 'appointment':
		echo("<h1>".'Book Your Appointment'."</h1>");
		$image = get_post_meta( url_to_postid('header/header') , 'submit_button', true); 						
						if( $image ) {
							$text1.=wp_get_attachment_image( $image, 'full',"", ["class" => "button"]);
						}		
		$text = '<form action="'.get_site_url().'/contact" method="post">'.
			'<input type="hidden" name="added" value="true">'.
			'<input type="hidden" name="type" value="appointment">'.
			'<label>Name <input required name="user_name"></label>'.
			'<label>E-mail <input required type="email" name="email"></label>'.
			'<label>Phone Number <input required  name="phone"></label>'.
			'<label>Inqury <textarea required name="text"></textarea><div class="line"></div></label>'.
			'<button type="submit">'.$text1.'</button>'.
			'</form>';
		echo($text);
	break;
	case 'review':
		echo("<h1>".'Leave a Review'."</h1>");	
		$image = get_post_meta( url_to_postid('header/header') , 'submit_button', true); 						
						if( $image ) {
							$text1.=wp_get_attachment_image( $image, 'full',"", ["class" => "button"]);
						}
		$text = '<form action="'.get_site_url().'/contact" method="post">'.
			'<input type="hidden" name="added" value="true">'.
			'<input type="hidden" name="type" value="review">'.
			'<label>Name <input required name="user_name"></label>'.
			'<label>E-mail <input required type="email" name="email"></label>'.
			'<label>Phone Number <input required  name="phone"></label>'.
			'<label>Inqury <textarea required name="text"></textarea><div class="line"></div></label>'.
			'<button type="submit">'.$text1.'</button>'.
			'</form>';
		echo($text);
	break;	
}
echo('<br>');
?>
</section>
<?php get_footer(); ?>