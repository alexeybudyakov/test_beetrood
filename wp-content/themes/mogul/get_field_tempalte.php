<?php /* Template Name: get_field */?>
<?php get_header(); ?>
<h1 style='text-align: center'>get field page</h1> 
<?php 
	$filed_value=$_GET['field'];
	$page_id = $_GET['page_value'];

	echo ($filed_value.'='.get_post_field('post_'.$filed_value, $page_id, 'display'));
?>
<?php get_footer(); ?>