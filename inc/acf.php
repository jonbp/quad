<?php

/**
 * Advanced Custom Fields option pages.
 *
 * Define sub-option pages in $sub_option_pages to register them under a parent
 * "Options" page when ACF is active.
 */

// Option sub pages.
$sub_option_pages = array();

// Check for ACF + sub pages.
if ( function_exists( 'acf_add_options_page' ) && ! empty( $sub_option_pages ) ) {

	acf_add_options_page(
		array(
			'menu_title' => __( 'Options', 'quad' ),
			'icon_url'   => 'dashicons-admin-settings',
			'menu_slug'  => 'theme-options',
			'capability' => 'edit_posts',
			'redirect'   => true,
		)
	);

	foreach ( $sub_option_pages as $sub_option ) {
		acf_add_options_sub_page(
			array(
				'page_title'  => sprintf( __( 'Theme %s Settings', 'quad' ), $sub_option ),
				'menu_title'  => $sub_option,
				'parent_slug' => 'theme-options',
			)
		);
	}
}
