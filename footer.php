<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package madhat
 */
?>

		</div><!-- #content -->
	
	</div><!--.mega-container-->

<?php get_template_part('modules/navigation/main','menu'); ?>

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php printf( __( 'Theme Designed by %1$s.', 'madhat' ), '<a target="blank" href="'.esc_url("http://inkhive.com/").'" rel="nofollow">InkHive.com</a>' ); ?>
			<span class="sep">
               <?php echo ( esc_html(get_theme_mod('madhat_footer_text')) == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','madhat')) : get_theme_mod('madhat_footer_text'); ?>
            </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
