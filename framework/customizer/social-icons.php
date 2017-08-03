<?php
// Social Icons
function madhat_customize_register_social( $wp_customize ) {
$wp_customize->add_section('madhat_social_section', array(
    'title' => __('Social Icons','madhat'),
    'priority' => 44 ,
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
        'default' => 'none'
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