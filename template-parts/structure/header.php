<div id="page" class="site container mx-auto">
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
				<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
			</div><!-- .site-branding -->

			<?php get_template_part( 'template-parts/menus/nav', 'primary' ); ?>

		</div>
	</header><!-- #masthead -->

	<main id="primary" class="site-main">
