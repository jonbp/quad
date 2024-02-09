<?php

function quad_allowed_block_types( $allowed_blocks, $post ) {
  
  $allowed_blocks = array(
    'core/image',
		'core/paragraph',
		'core/heading',
		'core/list'
	);
  
	if( $post->post_type === 'page' ) {
    $allowed_blocks[] = 'core/shortcode';
	}
  
	return $allowed_blocks;
  
}

//add_filter('allowed_block_types', 'quad_allowed_block_types', 10, 2);