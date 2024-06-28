<?php

// List Posts Thumbnail Widget.
require get_theme_file_path() . '/inc/widgets/list-posts-thumbnail-widget.php';

// Two Column Posts Widget.
require get_theme_file_path() . '/inc/widgets/two-column-posts-widget.php';

// Grid List Posts Widget.
require get_theme_file_path() . '/inc/widgets/grid-list-posts-widget.php';

// Info Author Widget.
require get_theme_file_path() . '/inc/widgets/info-author-widget.php';

/**
 * Register Widgets
 */
function authentic_news_register_widgets() {

	register_widget( 'Ace_News_List_Posts_Thumbnail_Widget' );

	register_widget( 'Ace_News_Two_Column_Posts_Widget' );

	register_widget( 'Ace_News_Grid_List_Posts_Widget' );

	register_widget( 'Ace_News_Author_Info_Widget' );

}
add_action( 'widgets_init', 'authentic_news_register_widgets' );

