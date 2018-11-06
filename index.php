<?php 
/*
 This is the template for the index
 @package awesome_theme
 */
 ?>
<?php get_header(); ?>

<?php 
	if(have_posts()):
		while(have_posts()): the_post(); echo "this is the format: ".get_post_format(); 
			get_template_part('template-parts/content',get_post_format() );
 endwhile; endif; ?>


<?php get_footer(); ?>