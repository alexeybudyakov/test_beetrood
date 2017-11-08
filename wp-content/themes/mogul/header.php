<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_get_document_title(); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body <?php body_class(); ?> style='overflow-x: hidden; position: relative;'>
	<header>
		<div class="menu">
			<div class="container">
				<div class="row">
					<div class="col-12 mobile_menu" onclick="show_hide_menu()">
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
					</div>
					<div class="left_menu_mobile">
						<?php wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
					</div>
					
					<?php wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
				</div>
			</div>
		</div>
		<?php 
			$imageURI = get_post_meta(url_to_postid('header/header'), 'background-image', true);
			$imagearray = wp_get_attachment_image_src( $imageURI, 'fullsize');
			$imageURI = $imagearray[0];
		?>
		
		<div class="header"  style="background:url(<?php echo $imageURI ;?>) center center no-repeat; background-size: 100% 100%; ">
			<form action="<?php echo get_site_url(); ?>/contact" method="post">
			<input type="hidden" name="type" value="appointment">
			<button type='submit' >
			<?php 
				$image = get_post_meta( url_to_postid('header/header') , 'appointment_button', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full',"", ["class" => "button"]);
						}
			?>
			</button>
			</form>
			<?php 
				$image = get_post_meta( url_to_postid('header/header') , 'above_image', true); 						
						if( $image ) {
							echo wp_get_attachment_image( $image, 'full',"", ["class" => "logo"]);
						}
			?>
		</div>
	</header>
	<script>
	function show_hide_menu(){
			$("body").toggleClass('show_left_menu');
		}
	</script>