<?php

//Exit if Directly accessed

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Template Name: contact-us Page Template
 *
 * Handles to show home Page Content
 * @since Belliny
 **/

get_header();
// Loop Start Here
while (have_posts()): the_post();
	// Include the Home Page Content template.
	get_template_part('page-contents/content', 'contact-us');
endwhile; //end of while
get_footer();?>