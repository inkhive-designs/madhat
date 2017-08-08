<?php
/*
** Template to Render Social Icons on Top Bar
*/
$social_style = get_theme_mod('madhat_social_icon_style_set','hvr-bounce-to-bottom');
for ($i = 1; $i < 8; $i++) :
	$social = esc_html(get_theme_mod('madhat_social_'.$i));
	if ( ($social != '') && ($social != 'none')) : ?>
	<a class="social-style <?php echo $social_style; ?>" href="<?php echo esc_url( get_theme_mod('madhat_social_url'.$i) ); ?>"><i class="fa fa-<?php echo $social; ?>"></i></a>
	<?php endif;
endfor; ?>