<?php
// CREATE THE FCA PANEL
function madhat_customize_register_fp( $wp_customize ) {
    $wp_customize->add_panel( 'madhat_fca_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Featured Content Areas',
    'description'    => '',
    ) );


    //FEATURED AREA 1
    $wp_customize->add_section(
    'madhat_fc_boxes',
    array(
    'title'     => 'Featured Area 1',
    'priority'  => 10,
    'panel'     => 'madhat_fca_panel'
    )
    );

    $wp_customize->add_setting(
    'madhat_box_enable',
    array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
    );

    $wp_customize->add_control(
    'madhat_box_enable', array(
    'settings' => 'madhat_box_enable',
    'label'    => __( 'Enable Featured Area 1.', 'madhat' ),
    'section'  => 'madhat_fc_boxes',
    'type'     => 'checkbox',
    )
    );


    $wp_customize->add_setting(
    'madhat_box_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
    'madhat_box_title', array(
    'settings' => 'madhat_box_title',
    'label'    => __( 'Title for the Boxes','madhat' ),
    'section'  => 'madhat_fc_boxes',
    'type'     => 'text',
    )
    );

    $wp_customize->add_setting(
    'madhat_box_cat',
    array( 'sanitize_callback' => 'madhat_sanitize_category' )
    );

    $wp_customize->add_control(
    new WP_Customize_Category_Control(
    $wp_customize,
    'madhat_box_cat',
    array(
    'label'    => __('Category For Square Boxes.','madhat'),
    'settings' => 'madhat_box_cat',
    'section'  => 'madhat_fc_boxes'
    )
    )
    );

    //FEATURED AREA 2
    $wp_customize->add_section(
    'madhat_fc_fa2',
    array(
    'title'     => __('Featured Area 2','madhat'),
    'priority'  => 10,
    'panel'     => 'madhat_fca_panel'
    )
    );

    $wp_customize->add_setting(
    'madhat_fa2_enable',
    array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
    );

    $wp_customize->add_control(
    'madhat_fa2_enable', array(
    'settings' => 'madhat_fa2_enable',
    'label'    => __( 'Enable Featured Area 2.', 'madhat' ),
    'section'  => 'madhat_fc_fa2',
    'type'     => 'checkbox',
    )
    );


    $wp_customize->add_setting(
    'madhat_fa2_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
    'madhat_fa2_title', array(
    'settings' => 'madhat_fa2_title',
    'label'    => __( 'Title for the featured area 2','madhat' ),
    'section'  => 'madhat_fc_fa2',
    'type'     => 'text',
    )
    );

    $wp_customize->add_setting(
    'madhat_fa2_cat',
    array( 'sanitize_callback' => 'madhat_sanitize_category' )
    );

    $wp_customize->add_control(
    new WP_Customize_Category_Control(
    $wp_customize,
    'madhat_fa2_cat',
    array(
    'label'    => __('Category For featured area 2.','madhat'),
    'settings' => 'madhat_fa2_cat',
    'section'  => 'madhat_fc_fa2'
    )
    )
    );
}
add_action( 'customize_register', 'madhat_customize_register_fp' );