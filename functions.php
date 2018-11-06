<?php 
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/walker.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/ajax.php';
function awesome_theme_setup(){ 
add_theme_support( 'menus' );

register_nav_menu('primary','Primary Header Navigation');

}
add_action( 'init', 'awesome_theme_setup');

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
add_theme_support( 'html5',array('search-form') );



// Contact Form shortcode
function mi_contact_form($atts,$content = null){
	// [contact_form]
	
	// get the attributes
	
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	); 

	// return HTML
	#return 'This is the contact form generated HTML';
	ob_start();
	include 'template-parts/contact-form.php';
	return ob_get_clean();
}
add_shortcode( 'contact_form', 'mi_contact_form' );
 ?>
