<?php
/**
 * Core theme functions.
 *
 * @package Quad
 */

/**
 * Theme setup.
 */
function quad_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Menu registrations.
	register_nav_menus(
		array(
			'primary' => __( 'Primary', 'quad' ),
		)
	);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}

/**
 * Helper: read the Vite manifest so we can enqueue hashed asset filenames.
 *
 * @return array|null
 */
function quad_asset_manifest() {
	static $manifest      = null;
	static $manifest_path = null;

	if ( null !== $manifest ) {
		return $manifest;
	}

	// Prefer Vite 5+ default location (dist/.vite/manifest.json), fall back to dist/manifest.json.
	$paths = array(
		get_theme_file_path( '/dist/.vite/manifest.json' ),
		get_theme_file_path( '/dist/manifest.json' ),
	);

	foreach ( $paths as $path ) {
		if ( file_exists( $path ) ) {
			$manifest_path = $path;
			break;
		}
	}

	if ( ! $manifest_path ) {
		return null;
	}

	if ( function_exists( 'wp_json_file_decode' ) ) {
		$manifest = wp_json_file_decode( $manifest_path, array( 'associative' => true ) );
	} else {
		$manifest = json_decode( file_get_contents( $manifest_path ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	}

	if ( ! is_array( $manifest ) ) {
		return null;
	}

	return $manifest;
}

/**
 * Build asset URLs from the manifest entry.
 *
 * @param string $entry Entry key in the manifest.
 * @return array|null
 */
function quad_asset_urls( $entry ) {
	$manifest = quad_asset_manifest();

	if ( ! $manifest || ! isset( $manifest[ $entry ] ) ) {
		return null;
	}

	$asset = $manifest[ $entry ];
	$base  = trailingslashit( get_stylesheet_directory_uri() . '/dist' );

	return array(
		'file' => isset( $asset['file'] ) ? $base . $asset['file'] : null,
		'css'  => ! empty( $asset['css'] ) ? array_map(
			static function ( $path ) use ( $base ) {
				return $base . $path;
			},
			$asset['css']
		) : array(),
	);
}

/**
 * Enqueue scripts and styles.
 */
function quad_scripts() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );

	// Remove jQuery.
	wp_deregister_script( 'jquery' );

	$asset = quad_asset_urls( 'src/app.js' );

	// Styles.
	if ( $asset && ! empty( $asset['css'] ) ) {
		foreach ( $asset['css'] as $index => $css_path ) {
			$handle = 0 === $index ? 'css/app' : "css/app-{$index}";
			wp_enqueue_style( $handle, $css_path, array(), $version );
		}
	} else {
		wp_enqueue_style( 'css/app', get_stylesheet_directory_uri() . '/dist/css/app.css', array(), $version );
	}

	// Main JavaScript.
	$script_path = ( $asset && $asset['file'] )
		? $asset['file']
		: get_stylesheet_directory_uri() . '/dist/app.js';

	wp_enqueue_script( 'js/app', $script_path, array(), $version, true );
}

// Implement setup + scripts.
add_action( 'after_setup_theme', 'quad_setup' );
add_action( 'wp_enqueue_scripts', 'quad_scripts' );

// Function extras.
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/gutenberg.php';

// Disable redirection if site in development mode.
if ( isset( $_ENV['WP_ENV'] ) && 'development' === $_ENV['WP_ENV'] ) {
	remove_action( 'template_redirect', 'redirect_canonical' );
}
