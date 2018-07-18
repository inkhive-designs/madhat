<?php
/**
 * Enqueue scripts and styles.
 */
function madhat_scripts() {
    wp_enqueue_style( 'madhat-style', get_stylesheet_uri() );

    wp_enqueue_style('madhat-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('madhat_title_font', 'Playfair Display') ) ).':100,300,400,700' );

    if (get_theme_mod('madhat_body_font') != get_theme_mod('madhat_title_font')) {
        wp_enqueue_style('madhat-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('madhat_body_font', 'Playfair Display') ) ).':100,300,400,700' );
    }

    wp_enqueue_style( 'madhat-fontawesome-style', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'madhat-nivo-style', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

    wp_enqueue_style( 'madhat-nivo-skin-style', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );

    wp_enqueue_style( 'madhat-bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'madhat-hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'madhat-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('madhat_skins', 'default').'.css', array(), null );

    wp_enqueue_script( 'madhat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'madhat-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    // Localize the ext-script for mobile menu text
    wp_localize_script( 'madhat-externaljs', 'menu_object', array( 'nav_text' =>  __( 'Navigation', 'madhat' )) );

    wp_enqueue_script( 'madhat-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'madhat-custom-js', get_template_directory_uri() . '/js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'madhat_scripts' );