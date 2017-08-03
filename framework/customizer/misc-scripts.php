<?php
//upgrade
function madhat_customize_register_misc( $wp_customize ) {
$wp_customize->add_section(
    'madhat_sec_pro',
    array(
        'title'     => __('Upgrade to MadHat Plus','madhat'),
        'priority'  => 10,
    )
);

$wp_customize->add_setting(
    'madhat_pro',
    array( 'sanitize_callback' => 'esc_textarea' )
);

$wp_customize->add_control(
    new WP_Customize_Upgrade_Control(
        $wp_customize,
        'madhat_pro',
        array(
            'label' => __('Upgrade to Madhat Plus','madhat'),
            'description' => __('<a href="https://inkhive.com/product/madhat-plus/"><strong>Madhat Plus</strong></a> has so many features that it will make you fall in love with it. <ul class="prolists">
	            <li>Better Responsiveness</li>
	            <li>650+ Google Fonts</li>
	            <li>Carousel, Flex Grid and More Featured Content</li>
	            <li>More Blog Layouts</li>
	            <li>More Page Layouts</li>
	            <li>Advanced Sidebar</li>
	            <li>Advanced Menubar</li>
	            <li>Better Customizer</li>
	            <li><strong>Unlimited Skins, Colors & Designer</strong></li>
	            <li>SEO Optimized</li>
	            <li>Header Layouts</li>
	            <li>Footer Layouts</li>
	            <li>Boxed Layout</li>
	            <li>Custom Widgets</li>
	            <li>More Social Icons</li>
	            <li>Easy to Remove Footer Credit Links</li>
	            <li>And so much more...</li>
	            
	            </ul> <a href="https://inkhive.com/product/madhat-plus/">Upgrade Now</a>.','madhat'),
            'section' => 'madhat_sec_pro',
            'settings' => 'madhat_pro',
        )
    )
);
}
add_action( 'customize_register', 'madhat_customize_register_misc' );