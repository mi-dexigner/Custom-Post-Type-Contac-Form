<?php 
/* Collection of walker classes*/

/* wp_nav_menu()
<div class="menu-container">
<ul> // start_lvl
<li><a href=''><span> // start_el()
Link
</a></span></li> // end_el()
<li><a href=''>Link</a></li>
<li><a href=''>Link</a></li>
</ul> // end_lvl()
</div>
*/


class Walker_Nav_Primary extends Walker_Nav_menu { 
	function start_lvl( &$output, $depth = 0, $args = array() ){ // gernerate open tag ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
		// generate open tag li a span

	}

	/*function end_el(){
		// generate closing tag li a span
	}

	function end_lvl(){
		// gernerate closing tag ul
	}*/

}


