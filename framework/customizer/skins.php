<?php
//Logo Settings
function madhat_customize_register_skins( $wp_customize ) {
$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'madhat' ),
    'priority'   => 30,
) );


$wp_customize->add_setting( 'madhat_logo_resize' , array(
    'default'     => 100,
    'sanitize_callback' => 'madhat_sanitize_positive_number',
) );
$wp_customize->add_control(
    'madhat_logo_resize',
    array(
        'label' => __('Resize & Adjust Logo','madhat'),
        'section' => 'title_tagline',
        'settings' => 'madhat_logo_resize',
        'priority' => 6,
        'type' => 'range',
        'active_callback' => 'madhat_logo_enabled',
        'input_attrs' => array(
            'min'   => 30,
            'max'   => 200,
            'step'  => 5,
        ),
    )
);

function madhat_logo_enabled($control) {
    $option = $control->manager->get_setting('custom_logo');
    return $option->value() == true;
    //return true;
}



//Replace Header Text Color with, separate colors for Title and Description
//Override madhat_site_titlecolor
$wp_customize->remove_control('display_header_text');
$wp_customize->remove_setting('header_textcolor');
$wp_customize->add_setting('madhat_site_titlecolor', array(
    'default'     => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
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

//Settings For Logo Area

$wp_customize->add_setting(
    'madhat_hide_title_tagline',
    array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
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
    array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
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
        'default' => true )
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
add_action( 'customize_register', 'madhat_customize_register_skins' );