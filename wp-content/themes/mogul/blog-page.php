 <?php /* Template Name: blog */?>
 
<?php get_header(); ?>
<section id="blog">
	<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
 <div class="left_content">
<?php if ( $wpb_all_query->have_posts() ) : ?>
 
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
    <?php endwhile; ?>
    <!-- end of the loop -->
  
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
<div class="right_content">
<h2>RECENT POSTS</h2>
<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>4)); ?>
<?php if ( $wpb_all_query->have_posts() ) : ?>
 
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    <!-- end of the loop -->
     <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<h2>CATEGORIES</h2>
<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>4, 'orderby'=>'category')); ?>
<?php if ( $wpb_all_query->have_posts() ) : ?>

    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    <!-- end of the loop -->
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<h2>ARCHIVES</h2>
<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'trash', 'posts_per_page'=>4)); ?>
<?php if ( $wpb_all_query->have_posts() ) : ?>
<!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    <!-- end of the loop -->
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
</section>
<?php get_footer(); ?>