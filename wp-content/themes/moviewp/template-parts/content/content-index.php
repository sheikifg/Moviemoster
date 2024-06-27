<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @author: fr0zen
 * @author URI: https://fr0zen.sellix.io
 * @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
 * ----------------------------------------------------
 * @since 3.8.8
 * 20 May 2022
 */

/* Exit if accessed directly */
if (!defined('ABSPATH'))
{
    exit;
}

if (isset($_GET['order'])) {
//main page no slider
get_template_part( 'template-parts/content/content', 'main' );
} elseif ( !is_paged() && is_home() ) {
//main page with sliders
get_template_part( 'template-parts/content/content', 'home' );
}