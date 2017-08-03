<?php
//Google Fonts
function madhat_customize_register_fonts( $wp_customize ) {
$wp_customize->add_section(
    'madhat_typo_options',
    array(
        'title'     => __('Google Web Fonts','madhat'),
        'description' => __('Defaults: Playfair Display','madhat'),
        'priority'  => 41,
    )
);

$font_array = array('Playfair Display','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
$fonts = array_combine($font_array, $font_array);

$wp_customize->add_setting(
    'madhat_title_font',
    array(
        'default'=> 'Playfair Display',
        'sanitize_callback' => 'madhat_sanitize_gfont'
    )
);

function madhat_sanitize_gfont( $input ) {
    if ( in_array($input, array('Playfair Display','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'madhat_title_font',array(
        'label' => __('Title','madhat'),
        'settings' => 'madhat_title_font',
        'section'  => 'madhat_typo_options',
        'type' => 'select',
        'choices' => $fonts,
    )
);

$wp_customize->add_setting(
    'madhat_body_font',
    array(	'default'=> 'Playfair Display',
        'sanitize_callback' => 'madhat_sanitize_gfont' )
);

$wp_customize->add_control(
    'madhat_body_font',array(
        'label' => __('Body','madhat'),
        'settings' => 'madhat_body_font',
        'section'  => 'madhat_typo_options',
        'type' => 'select',
        'choices' => $fonts
    )
);
}
add_action( 'customize_register', 'madhat_customize_register_fonts' );