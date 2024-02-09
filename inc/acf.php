<?php

// Option Sub Pages
$sub_option_pages = [];

// Check for ACF + Sub Pages
if(function_exists('acf_add_options_page') && !empty($sub_option_pages)) {
	
  acf_add_options_page(array(
    'menu_title'	=> 'Options',
    'icon_url'    	=> 'dashicons-admin-settings',
    'menu_slug' 	=> 'theme-options',
    'capability'	=> 'edit_posts',
    'redirect'		=> true
  ));

  foreach($sub_option_pages as $sub_option) {
    acf_add_options_sub_page(array(
      'page_title' 	=> 'Theme '.$sub_option.' Settings',
      'menu_title'	=> $sub_option,
      'parent_slug'	=> 'theme-options',
    ));
  }
}
