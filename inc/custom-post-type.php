<?php
/*
	
@package mitheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/
	add_action( 'init', 'mi_contact_custom_post_type' );

	add_filter( 'manage_mi-contact_posts_columns', 'mi_set_contact_columns' );
	add_action( 'manage_mi-contact_posts_custom_column', 'mi_contact_custom_column', 10, 2 );

	add_action( 'add_meta_boxes', 'mi_contact_add_meta_box' );
	add_action( 'save_post', 'mi_save_contact_email_data' );

/* CONTACT CPT */
function mi_contact_custom_post_type() {
	$labels = array(
		'name' 				=> 'Messages',
		'singular_name' 	=> 'Message',
		'menu_name'			=> 'Messages',
		'name_admin_bar'	=> 'Message'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title', 'editor', 'author' ),
		'capabilities' => array(
   	//'create_posts' => false, // false < WP 4.5, credit @Ewout
  ),
	);
	
	register_post_type( 'mi-contact', $args );
	
}

// Set Custom Columns
function mi_set_contact_columns( $columns){
//unset($columns['author']);
$newColumns = array();
$newColumns['title'] = 'Full Name';
$newColumns['message'] = 'Message';
$newColumns['email'] = 'Email';
$newColumns['date'] = 'Date';
return $newColumns;
}

//  Create Custom Columns

function mi_contact_custom_column( $column, $post_id ){
	
	switch( $column ){
		
		case 'message' :
		// message column
			echo get_the_excerpt();
			break;
			
		case 'email' :
			//email column
			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
	}
	
}


/* CONTACT META BOXES */
function mi_contact_add_meta_box() {
	add_meta_box( 'contact_email', 'User Email', 'sunset_contact_email_callback', 'mi-contact', 'side' ,'default');
}
function sunset_contact_email_callback( $post ) {
	wp_nonce_field( 'mi_save_contact_email_data', 'mi_contact_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	
	echo '<label for="sunset_contact_email_field">User Email Address: </label>';
	echo '<input type="email" id="sunset_contact_email_field" name="sunset_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}
function mi_save_contact_email_data( $post_id ) {
	
	if( ! isset( $_POST['mi_contact_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['mi_contact_email_meta_box_nonce'], 'mi_save_contact_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['sunset_contact_email_field'] ) ) {
		return;
	}
	
	$email_data = sanitize_text_field( $_POST['sunset_contact_email_field'] );
	
	update_post_meta( $post_id, '_contact_email_value_key', $email_data );
	
}