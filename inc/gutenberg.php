<?php

/**
 * Allowed block types for the editor.
 *
 * @param array   $allowed_blocks Blocks allowed by default.
 * @param WP_Post $post           Current post object.
 * @return array
 */
function quad_allowed_block_types( $allowed_blocks, $post ) {
	$allowed_blocks = array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
	);

	if ( 'page' === $post->post_type ) {
		$allowed_blocks[] = 'core/shortcode';
	}

	return $allowed_blocks;
}

// add_filter( 'allowed_block_types', 'quad_allowed_block_types', 10, 2 );
