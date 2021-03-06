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

    $wp_customize->add_section(
        'madhat_important_links_section',
        array(
            'title'     => __('Important Links','madhat'),
            'priority'  => 11,
        )
    );

    $wp_customize->add_setting(
        'madhat_important_links',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'madhat_important_links',
            array(
                'settings'		=> 'madhat_important_links',
                'section'		=> 'madhat_important_links_section',
                'description'	=> '<a class="madhat-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'madhat').'</a>
                                    <a class="madhat-important-links" href="https://demo.inkhive.com/madhat-plus/" target="_blank">'.__('Madhat Live Demo', 'madhat').'</a>
                                    <a class="madhat-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'madhat').'</a>
                                    <a class="madhat-important-links" href="https://wordpress.org/support/theme/madhat/reviews" target="_blank">'.__('Review Us', 'madhat').'</a>'
            )
        )
    );
}
add_action( 'customize_register', 'madhat_customize_register_misc' );