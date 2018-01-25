<header id="masthead" class="site-header" role="banner">
    <div class="container">
        <div class="site-branding">
            <?php if ( function_exists( 'the_custom_logo' ) ) : ?>
                <div id="site-logo">
                    <?php the_custom_logo();?>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>
    </div>


<div id="search-icon">
        <a id="searchicon">
            <span class="fa fa-search"></span>
        </a>
    </div>


</header><!-- #masthead -->
