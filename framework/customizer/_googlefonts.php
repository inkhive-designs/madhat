<?php
//Google Fonts
function madhat_customize_register_fonts( $wp_customize ) {
$wp_customize->add_section(
    'madhat_typo_options',
    array(
        'title'     => __('Google Web Fonts','madhat'),
        'description' => __('Defaults: Playfair Display','madhat'),
        'priority'  => 41,
        'panel' => 'madhat_design_panel'
    )
);

$font_array = array('Playfair Display','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
$fonts = array_combine($font_array, $font_array);

$wp_customize->add_setting(
    'madhat_title_font',
    array(
        'default'=> 'Playfair Display',
        'sanitize_callback' => 'madhat_sanitize_gfont',
        'transport' => 'postMessage',
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
        'sanitize_callback' => 'madhat_sanitize_gfont',
        'transport'     => 'postMessage',
    )
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

    //site title Font size start
    $wp_customize->add_setting(
        'madhat_content_site_title_fontsize_set',
        array(
            'default' => '42',
            'sanitize_callback' => 'absint',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'madhat_content_site_title_fontsize_set', array(
            'settings' => 'madhat_content_site_title_fontsize_set',
            'label'    => __( 'Site Title Font Size','madhat' ),
            'description' => __('Choose your font size. This is only for Site Title.','madhat'),
            'section'  => 'madhat_typo_options',
            'type'     => 'number',
        )
    );
    //site title Font size end

    //site description Font size start
    $wp_customize->add_setting(
        'madhat_content_site_desc_fontsize_set',
        array(
            'default' => '15',
            'sanitize_callback' => 'absint',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'madhat_content_site_desc_fontsize_set', array(
            'settings' => 'madhat_content_site_desc_fontsize_set',
            'label'    => __( 'Site Description Font Size','madhat' ),
            'description' => __('Choose your font size. This is only for Site Description.','madhat'),
            'section'  => 'madhat_typo_options',
            'type'     => 'number',
        )
    );
    //site description Font size end


}
add_action( 'customize_register', 'madhat_customize_register_fonts' );