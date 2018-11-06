<?php 
/*
 This is the template for the header
 @package awesome_theme
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<title><?php echo bloginfo('name'); wp_title( ) ?></title>
	<meta name="description" content="<?php echo bloginfo('description') ?>">
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<?php 
if(is_home()):
$awesome_classes = array('awesome-theme','my-class');
else:
$awesome_classes = array('no-awesome-theme');	
endif;
 ?>
<body <?php body_class($awesome_classes);?> >

	<img src="<?php header_image(); ?>" class="img-responsive" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>">
<nav class="navbar navbar-default navbar-awesome-theme">
	<div class="container">
	<?php 
	$args = array(
							'theme_location' =>'primary',
							'container'=> false,
							'menu_class' => 'nav navbar-nav',
							'walker' => new Walker_Nav_Primary()
							);
	wp_nav_menu($args); 
	?>
	</div>
</nav>