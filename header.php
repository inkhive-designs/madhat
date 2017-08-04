<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package madhat
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'madhat' ); ?></a>

    <?php get_template_part('modules/header/jumbosearch'); ?>
    <?php get_template_part('modules/header/top-bar'); ?>
    <?php get_template_part('modules/header/masthead'); ?>
    <?php get_template_part('modules/navigation/top','menu'); ?>

<div class="mega-container">
    <?php if( class_exists('rt_slider') ) {
        rt_slider::render('slider', 'nivo' );
    } ?>

<?php get_template_part('framework/featured-components/featured', 'skew'); ?>
<?php get_template_part('framework/featured-components/featured', 'area2'); ?>
		
<div id="content" class="site-content container">