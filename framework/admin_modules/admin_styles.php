<?php /**
* Enqueue Scripts for Admin
*/
function madhat_custom_wp_admin_style() {
    wp_enqueue_style( 'madhat-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
    wp_enqueue_style( 'madhat-admin-fontawesome-style', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
}
add_action( 'admin_enqueue_scripts', 'madhat_custom_wp_admin_style' );