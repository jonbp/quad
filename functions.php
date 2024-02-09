<?php

// Setup
function quad_setup() {

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  // Let WordPress manage the document title.
  add_theme_support('title-tag' );

  // Enable support for Post Thumbnails on posts and pages.
  add_theme_support('post-thumbnails');
  
  // Menu Registrations
  register_nav_menus(array(
    'primary' => 'Primary'
  ));

  // Switch default core markup for search form, comment form, and comments to output valid HTML5.
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));

}

// Scripts and Styles
function quad_scripts() {

  // Versioning
  $theme = wp_get_theme();
  $version = $theme->get('Version');

  // Remove jQuery
  wp_deregister_script('jquery');

	// Styles
  wp_enqueue_style('css/app', get_stylesheet_directory_uri().'/dist/css/app.css', [], $version);

	// Main JavaScript
  wp_enqueue_script('js/app', get_stylesheet_directory_uri().'/dist/app.js', ['jquery'], $version, true);

}

// Implement Setup + Scripts
add_action('after_setup_theme', 'quad_setup');
add_action('wp_enqueue_scripts', 'quad_scripts');

// Function Extras
require get_template_directory().'/inc/acf.php';
require get_template_directory().'/inc/assets.php';
require get_template_directory().'/inc/customizer.php';
require get_template_directory().'/inc/gutenberg.php';

// Disable redirection if site in development mode
if(isset($_ENV['WP_ENV']) && $_ENV['WP_ENV'] == 'development') {
  remove_action('template_redirect', 'redirect_canonical');
}