<?php 
/*
 This is the template for the Page No title
 Template Name: Page No title
 @package awesome_theme
 */
 ?>
<?php get_header(); ?>
<?php 
	if(have_posts()):
		while(have_posts()): the_post();?>
	<?php //the_title('<h3>','</h3>'); ?>
	<small>posted On: <?php the_time('F,j,Y'); ?> at <?php the_time('g:i a') ?>, in <?php the_category(); ?></small>
	<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>