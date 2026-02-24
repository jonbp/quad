<?php

/**
 * Image size definitions.
 *
 * Registers custom image sizes used by the theme.
 */
function quad_image_sizes() {
	add_image_size( 'large-square', 800, 800, true );
}

add_action( 'after_setup_theme', 'quad_image_sizes' );
