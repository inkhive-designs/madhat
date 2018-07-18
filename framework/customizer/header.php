<?php
//Settings for Header Image
function madhat_customize_register_header( $wp_customize ) {
    $wp_customize->get_section('header_image')->panel = 'madhat_header_panel';

    $wp_customize->add_panel('madhat_header_panel', array(
        'title' => __('Header Settings', 'madhat'),
        'priority' => 20
    ));

$wp_customize->add_setting( 'madhat_himg_style' , array(
    'default'     => true,
    'sanitize_callback' => 'madhat_sanitize_himg_style'
) );

/* Sanitization Function */
function madhat_sanitize_himg_style( $input ) {
    if (in_array( $input, array('contain','cover') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'madhat_himg_style', array(
    'label' => __('Header Image Arrangement','madhat'),
    'section' => 'header_image',
    'settings' => 'madhat_himg_style',
    'type' => 'select',
    'choices' => array(
        'contain' => __('Contain','madhat'),
        'cover' => __('Cover Completely','madhat'),
    )
) );

$wp_customize->add_setting( 'madhat_himg_align' , array(
    'default'     => true,
    'sanitize_callback' => 'madhat_sanitize_himg_align'
) );

/* Sanitization Function */
function madhat_sanitize_himg_align( $input ) {
    if (in_array( $input, array('center','left','right') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'madhat_himg_align', array(
    'label' => __('Header Image Alignment','madhat'),
    'section' => 'header_image',
    'settings' => 'madhat_himg_align',
    'type' => 'select',
    'choices' => array(
        'center' => __('Center','madhat'),
        'left' => __('Left','madhat'),
        'right' => __('Right','madhat'),
    )

) );

$wp_customize->add_setting( 'madhat_himg_repeat' , array(
    'default'     => true,
    'sanitize_callback' => 'madhat_sanitize_checkbox'
) );

$wp_customize->add_control(
    'madhat_himg_repeat', array(
    'label' => __('Repeat Header Image','madhat'),
    'section' => 'header_image',
    'settings' => 'madhat_himg_repeat',
    'type' => 'checkbox',
) );
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'madhat' ),
        'priority'   => 30,
        'panel' => 'madhat_header_panel'
    ) );

    function madhat_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
        //return true;
    }



//Replace Header Text Color with, separate colors for Title and Description
//Override madhat_site_titlecolor
    $wp_customize->remove_control('display_header_text');
//Settings For Logo Area

    $wp_customize->add_setting(
        'madhat_hide_title_tagline',
        array(
            'sanitize_callback' => 'madhat_sanitize_checkbox',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'madhat_hide_title_tagline', array(
            'settings' => 'madhat_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'madhat' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'madhat_branding_below_logo',
        array(
            'sanitize_callback' => 'madhat_sanitize_checkbox',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'madhat_branding_below_logo', array(
            'settings' => 'madhat_branding_below_logo',
            'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'madhat' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
            'active_callback' => 'madhat_title_visible'
        )
    );

    function madhat_title_visible( $control ) {
        $option = $control->manager->get_setting('madhat_hide_title_tagline');
        return $option->value() == false ;
    }

    $wp_customize->add_setting(
        'madhat_center_logo',
        array(
            'sanitize_callback' => 'madhat_sanitize_checkbox',
            'default' => true,
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'madhat_center_logo', array(
            'settings' => 'madhat_center_logo',
            'label'    => __( 'Center Align.', 'madhat' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );
}
add_action( 'customize_register', 'madhat_customize_register_header' );