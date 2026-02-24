<div class="post-listing">
	<h3><?php the_title(); ?></h3>
	<?php the_excerpt(); ?>
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="button"><?php esc_html_e( 'View Post', 'quad' ); ?></a>
</div>
