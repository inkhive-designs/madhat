<?php
// Social Icons
function madhat_customize_register_social( $wp_customize ) {
$wp_customize->add_section('madhat_social_section', array(
    'title' => __('Social Icons','madhat'),
    'priority' => 44 ,
    'panel' => 'madhat_header_panel'
));
//social icons style
    $social_style = array(
        'hvr-bounce-to-bottom'  => __('Default', 'madhat'),
        'hvr-wobble-bottom'   => __('Style 1', 'madhat'),
        'hvr-ripple-out'   => __('Style 2', 'madhat'),
        'hvr-rectangle-out'   => __('Style 3', 'madhat'),
        'hvr-bubble-float-bottom'   => __('Style 4', 'madhat'),

    );
    $wp_customize->add_setting(
        'madhat_social_icon_style_set', array(
        'sanitize_callback' => 'madhat_sanitize_social_style',
        'default' => 'hvr-bounce-to-bottom',
        'transport'     => 'postMessage',
    ));
    
    function madhat_sanitize_social_style( $input ) {
        if ( in_array($input, array('hvr-bounce-to-bottom','hvr-wobble-bottom','hvr-ripple-out','hvr-rectangle-out','hvr-bubble-float-bottom') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control( 'madhat_social_icon_style_set', array(
        'settings' => 'madhat_social_icon_style_set',
        'label' => __('Social Icon Style ','madhat'),
        'description' => __('You can choose your icon style','madhat'),
        'section' => 'madhat_social_section',
        'type' => 'select',
        'choices' => $social_style,
    ));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','madhat'),
    'facebook' => __('Facebook','madhat'),
    'twitter' => __('Twitter','madhat'),
    'google-plus' => __('Google Plus','madhat'),
    'instagram' => __('Instagram','madhat'),
    'rss' => __('RSS Feeds','madhat'),
    'vine' => __('Vine','madhat'),
    'vimeo-square' => __('Vimeo','madhat'),
    'youtube' => __('Youtube','madhat'),
    'flickr' => __('Flickr','madhat'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'madhat_social_'.$x, array(
        'sanitize_callback' => 'madhat_sanitize_social',
        'default' => 'none',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control( 'madhat_social_'.$x, array(
        'settings' => 'madhat_social_'.$x,
        'label' => __('Icon ','madhat').$x,
        'section' => 'madhat_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'madhat_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'madhat_social_url'.$x, array(
        'settings' => 'madhat_social_url'.$x,
        'description' => __('Icon ','madhat').$x.__(' Url','madhat'),
        'section' => 'madhat_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function madhat_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'madhat_customize_register_social' );