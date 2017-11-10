<?php /* Template Name: get_meta */?>
<?php get_header(); ?>
<h1 style='text-align: center'>get meta page</h1> 
<?php
	$filed_value=$_GET['meta_key'];
	$page_id = $_GET['page_value'];
	
	echo ($filed_value.'='.$wpdb->get_var("SELECT meta_value FROM wp_postmeta where post_id='".$page_id."' and meta_key='".$filed_value."' limit 1"));
	
	

?>
<?php get_footer(); ?>