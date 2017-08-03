<?php
//Settings for Nav Area
function madhat_customize_register_nav( $wp_customize ) {
$wp_customize->add_setting( 'madhat_disable_active_nav' , array(
    'default'     => true,
    'sanitize_callback' => 'madhat_sanitize_checkbox',
) );

$wp_customize->add_control(
    'madhat_disable_active_nav', array(
    'label' => __('Disable Highlighting of Current Active Item on the Menu.','madhat'),
    'section' => 'nav',
    'settings' => 'madhat_disable_active_nav',
    'type' => 'checkbox'
) );
}
add_action( 'customize_register', 'madhat_customize_register_nav' );