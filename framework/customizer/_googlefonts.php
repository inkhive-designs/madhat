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

    //Page and Post content Font size start
    $wp_customize->add_setting(
        'madhat_content_page_post_fontsize_set',
        array(
            'default' => 'default',
            'sanitize_callback' => 'madhat_sanitize_content_size'
        )
    );
    function madhat_sanitize_content_size( $input ) {
        if ( in_array($input, array('default','small','medium','large','extra-large') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'madhat_content_page_post_fontsize_set', array(
            'settings' => 'madhat_content_page_post_fontsize_set',
            'label'    => __( 'Page/Post Font Size','madhat' ),
            'description' => __('Choose your font size. This is only for Posts and Pages. It wont affect your blog page.','madhat'),
            'section'  => 'madhat_typo_options',
            'type'     => 'select',
            'choices' => array(
                'default'   => 'Default',
                'small' => 'Small',
                'medium'   => 'Medium',
                'large'  => 'Large',
                'extra-large' => 'Extra Large',
            ),
        )
    );

    //Page and Post content Font size end


    //site title Font size start
    $wp_customize->add_setting(
        'madhat_content_site_title_fontsize_set',
        array(
            'default' => '42',
            'sanitize_callback' => 'absint',
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