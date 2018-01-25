<?php
//Logo Settings
function madhat_customize_register_skins( $wp_customize ) {
//skins

//Select the Default Theme Skin
    $wp_customize->add_section(
        'madhat_skin_options',
        array(
            'title' => __('Theme Skins', 'madhat'),
            'priority' => 39,
            'panel'   => 'madhat_design_panel'
        )
    );

    $wp_customize->add_setting(
        'madhat_skin',
        array(
            'default' => 'default',
            'sanitize_callback' => 'madhat_sanitize_skin'
        )
    );

    $skins = array('default' => __('Default(Black & white)', 'madhat'),
        'red' => __('Roman', 'madhat'),
        'pink' => __('Sweet Pink', 'madhat'),
        'yellow' => __('Yellow', 'madhat'),

    );

    $wp_customize->add_control(
        'madhat_skin', array(
            'settings' => 'madhat_skin',
            'section' => 'madhat_skin_options',
            'label' => __('Choose from the Skins Below', 'madhat'),
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function madhat_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'red', 'yellow','pink')))
            return $input;
        else
            return '';
    }





}
add_action( 'customize_register', 'madhat_customize_register_skins' );