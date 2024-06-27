<?php
/**
 * The template for displaying category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author: fr0zen
 * @author URI: https://fr0zen.store
 * @copyright: (c) 2023 Vincenzo Piromalli. All rights reserved
 * ----------------------------------------------------
 * @since 3.8.8
 * 20 May 2022
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part('template-parts/content/content', 'category');
get_footer();

