<?php
/*
@package mitheme
    ========================
        AJAX FUNCTIONS
    ========================
*/

add_action('wp_ajax_nopriv_mi_save_user_contact_form', 'mi_save_contact');
add_action('wp_ajax_mi_save_user_contact_form', 'mi_save_contact');

function mi_save_contact()
{
    $title = wp_strip_all_tags($_POST['name']);
    $email = wp_strip_all_tags($_POST['email']);
    $message = wp_strip_all_tags($_POST['message']);
    $args = array(
        'post_title' => $title,
        'post_content' => $message,
        'post_author' => 1,
        'post_status' => 'publish',
        'post_type' => 'mi-contact',
        'meta_input' => array(
            '_contact_email_value_key' => $email,
        ),
    );
    $postID = wp_insert_post($args);
        if ($postID !== 0) {
        $to = get_bloginfo('admin_email');
        $subject = 'MI Contact Form - '.$title;
        $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: MI <me@midexigner.com>'
        $headers[] = 'Reply-To: '.$title.' <'.$email.'>';
        $headers[] = 'Content-Type: text/html: charset=UTF-8';
        wp_mail($to, $subject, $message, $headers);
    }
    echo $postID;
    die();
}