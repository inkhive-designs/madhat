<?php
//Settings for Header Image
function madhat_customize_register_header( $wp_customize ) {
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
}
add_action( 'customize_register', 'madhat_customize_register_header' );