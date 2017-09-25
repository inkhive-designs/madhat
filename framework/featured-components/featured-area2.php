<div id="featured-area-2">
<div class="container">
<?php if ( get_theme_mod('madhat_fa2_enable') && is_front_page() ) : ?>
	<div class="col-md-12">
        <?php if(get_theme_mod('madhat_fa2_title')):?>
		<div class="section-title">
			<span><?php echo get_theme_mod('madhat_fa2_title',__('Popular Articles','madhat')); ?></span>
		</div>
        <?php endif;?>
		
		<?php /* Start the Loop */ $count=0; ?>
				<?php
		    		$args = array( 'posts_per_page' => 3, 'category' => get_theme_mod('madhat_fa2_cat') );
					$lastposts = get_posts( $args );

					foreach ( $lastposts as $post ) :
					  setup_postdata( $post ); ?>
					
				    <?php 
				    		$thumb = 'pop-thumb'; 
				    		$class = 'col-md-6 col-sm-6';
							if ($count == 0) {
								$thumb = 'pop-thumb-half-full';
								$class = 'col-md-12';
							}
				    	?>
				    	
				    	
				    <div class="<?php echo $class; ?> imgcontainer">
				    
				    	<div class="popimage">
				        <?php if (has_post_thumbnail()) : ?>	
								<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail( $thumb ); ?></a>
						<?php else : ?>
								<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
						<?php endif; ?>
							<div class="titledesc">
					            <h2><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h2>
					        </div>
				    	</div>	
				        
				    </div>
				    
				<?php $count++;
				if ($count == 4) break;
				 endforeach;
				 wp_reset_postdata(); ?>
		
	</div>

<?php endif; ?>
</div><!--.container-->
</div>