<?php
//Logo Settings
function madhat_customize_register_skins( $wp_customize ) {
    $wp_customize->get_section('colors')->panel = 'madhat_design_panel';
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors', 'madhat');
    $wp_customize->get_setting('background_color')->transport = 'postMessage';

    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->add_setting('madhat_site_titlecolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'madhat_site_titlecolor', array(
            'label' => __('Site Title Color','madhat'),
            'section' => 'colors',
            'settings' => 'madhat_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('madhat_header_desccolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'madhat_header_desccolor', array(
            'label' => __('Site Tagline Color','madhat'),
            'section' => 'colors',
            'settings' => 'madhat_header_desccolor',
            'type' => 'color'
        ) )
    );

    //Select the Default Theme Skin
    function madhat_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'red', 'yellow','pink')))
            return $input;
        else
            return '';
    }

    //Skins
    $wp_customize->add_setting(
        'madhat_skins',
        array(
            'default'	=> 'default',
            'sanitize_callback' => 'madhat_sanitize_skin',
            'transport'	=> 'refresh'
        )
    );

    if(!function_exists('madhat_skin_array')){
        function madhat_skin_array(){
            return array(
                '#151212' => 'default',
                '#e35d5b' => 'red',
                '#fdbb2d' => 'yellow',
                '#F29492' => 'pink',
            );
        }
    }

    $madhat_skin_array = madhat_skin_array();


    $wp_customize->add_control(
        new Madhat_Skin_Chooser(
            $wp_customize,
            'madhat_skins',
            array(
                'settings'		=> 'madhat_skins',
                'section'		=> 'colors',
                'label'			=> __( 'Select Skins', 'madhat' ),
                'type'			=> 'skins',
                'choices'		=> $madhat_skin_array,
            )
        )
    );




}
add_action( 'customize_register', 'madhat_customize_register_skins' );