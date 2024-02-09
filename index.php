<?php

get_header();

// Home
if(is_front_page()) {
	get_template_part('templates/core/home');
	
// Blog
} elseif(is_home()) {
	get_template_part('templates/core/blog');

// Page
} elseif(is_page()) {
	get_template_part('templates/core/page');

// Single
} elseif(is_single()) {
	get_template_part('templates/core/single');

// Archive
} elseif(is_archive()) {
	get_template_part('templates/core/archive');

// 404
} elseif(is_404()) {
	get_template_part('templates/core/404');

}

get_footer();