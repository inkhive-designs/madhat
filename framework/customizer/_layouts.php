<?php
// Layout and Design
function madhat_customize_register_layouts( $wp_customize ) {
    $wp_customize->get_section('background_image')->panel = 'madhat_design_panel';
    $wp_customize->get_section('custom_css')->panel = 'madhat_design_panel';

$wp_customize->add_panel( 'madhat_design_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Design & Layout','madhat'),
) );

$wp_customize->add_section(
    'madhat_design_options',
    array(
        'title'     => __('Blog Layout','madhat'),
        'priority'  => 0,
        'panel'     => 'madhat_design_panel'
    )
);


$wp_customize->add_setting(
    'madhat_blog_layout',
    array( 'sanitize_callback' => 'madhat_sanitize_blog_layout' )
);

function madhat_sanitize_blog_layout( $input ) {
    if ( in_array($input, array('grid','grid_2_column','grid_3_column','madhat','grid_alternative') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'madhat_blog_layout',array(
        'label' => __('Select Layout','madhat'),
        'settings' => 'madhat_blog_layout',
        'section'  => 'madhat_design_options',
        'type' => 'select',
        'choices' => array(
            'grid' => __('Basic Blog Layout','madhat'),
            'madhat' => __('MadHat Default Layout','madhat'),
            'grid_2_column' => __('Grid - 2 Column','madhat'),
            'grid_3_column' => __('Grid - 3 Column','madhat'),
            'grid_alternative' => __('Grid - Alternative','madhat'),
        )
    )
);

$wp_customize->add_section(
    'madhat_sidebar_options',
    array(
        'title'     => __('Sidebar Layout','madhat'),
        'priority'  => 0,
        'panel'     => 'madhat_design_panel'
    )
);

$wp_customize->add_setting(
    'madhat_disable_sidebar',
    array(
        'sanitize_callback' => 'madhat_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'madhat_disable_sidebar', array(
        'settings' => 'madhat_disable_sidebar',
        'label'    => __( 'Disable Sidebar Everywhere.','madhat' ),
        'section'  => 'madhat_sidebar_options',
        'type'     => 'checkbox',
        'default'  => false
    )
);

$wp_customize->add_setting(
    'madhat_disable_sidebar_home',
    array(
        'sanitize_callback' => 'madhat_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'madhat_disable_sidebar_home', array(
        'settings' => 'madhat_disable_sidebar_home',
        'label'    => __( 'Disable Sidebar on Home/Blog.','madhat' ),
        'section'  => 'madhat_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'madhat_show_sidebar_options',
        'default'  => false
    )
);

$wp_customize->add_setting(
    'madhat_disable_sidebar_front',
    array(
        'sanitize_callback' => 'madhat_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'madhat_disable_sidebar_front', array(
        'settings' => 'madhat_disable_sidebar_front',
        'label'    => __( 'Disable Sidebar on Front Page.','madhat' ),
        'section'  => 'madhat_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'madhat_show_sidebar_options',
        'default'  => false
    )
);


$wp_customize->add_setting(
    'madhat_sidebar_width',
    array(
        'default' => 4,
        'sanitize_callback' => 'madhat_sanitize_positive_number' )
);

$wp_customize->add_control(
    'madhat_sidebar_width', array(
        'settings' => 'madhat_sidebar_width',
        'label'    => __( 'Sidebar Width','madhat' ),
        'description' => __('Min: 25%, Default: 33%, Max: 40%','madhat'),
        'section'  => 'madhat_sidebar_options',
        'type'     => 'range',
        'active_callback' => 'madhat_show_sidebar_options',
        'input_attrs' => array(
            'min'   => 3,
            'max'   => 5,
            'step'  => 1,
            'class' => 'sidebar-width-range',
            'style' => 'color: #0a0',
        ),
    )
);
    //content Font size
    $wp_customize->add_section(
        'madhat_content_fontsize_sec',
        array(
            'title'     => __('Content Font Size','madhat'),
            'priority'  => 0,
            'panel'     => 'madhat_design_panel'
        )
    );

    $content_font_size = array(
        '15px'   => __('Default', 'madhat'),
        'small' => __('Small', 'madhat'),
        'medium'   => __('Medium', 'madhat'),
        'large'  => __('Large', 'madhat'),
        'x-large' => __('Extra Large', 'madhat'),
    );

    function madhat_sanitize_content_size($nput) {
        $content_font_size = array(
            '15px',
            'small',
            'medium',
            'large',
            'x-large',
        );
        if ( in_array($input, $content_font_size) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_setting(
        'madhat_content_fontsize_set',
        array(
            'default' => '15px',
            'sanitize_callback' => 'madhat_sanitize_content_size',
            'transport'     => 'postMessage',
        )
    );


    $wp_customize->add_control(
        'madhat_content_fontsize_set', array(
            'settings' => 'madhat_content_fontsize_set',
            'label'    => __( 'Font Size','madhat' ),
            'description' => __('Choose your font size. This is only for Posts and Pages. It wont affect your blog page.','madhat'),
            'section'  => 'madhat_content_fontsize_sec',
            'type'     => 'select',
            'choices' => $content_font_size,
        )
    );

/* Active Callback Function */
function madhat_show_sidebar_options($control) {

    $option = $control->manager->get_setting('madhat_disable_sidebar');
    return $option->value() == false ;

}

$wp_customize-> add_section(
    'madhat_custom_footer',
    array(
        'title'			=> __('Custom Footer Text','madhat'),
        'description'	=> __('Enter your Own Copyright Text.','madhat'),
        'priority'		=> 11,
        'panel'			=> 'madhat_design_panel'
    )
);

$wp_customize->add_setting(
    'madhat_footer_text',
    array(
        'default'		=> '',
        'sanitize_callback'	=> 'sanitize_text_field',
        'transport' => 'postMessage',
    )
);

$wp_customize->add_control(
    'madhat_footer_text',
    array(
        'section' => 'madhat_custom_footer',
        'settings' => 'madhat_footer_text',
        'type' => 'text'
    )
);
}
add_action( 'customize_register', 'madhat_customize_register_layouts' );
