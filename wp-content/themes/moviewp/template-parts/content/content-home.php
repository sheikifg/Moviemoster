<?php
/**
* Template part for displaying page content in index.php with new layout (sliders)
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

echo '<section id="content" class="inner-container" style="padding-bottom: 30px!important;">';
echo '<div class="item-container">';
get_template_part('template-parts/slider/slider', '0');
echo '</div>';
echo '</section>';
