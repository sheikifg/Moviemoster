<?php
function episode() {

	$labels = array(
		'name'                  => 'Episodes',
		'singular_name'         => 'Episodes',
		'menu_name'             => 'Episodes',
		'name_admin_bar'        => 'Episodes',
		'archives'              => 'Episode Archives',
		'parent_item_colon'     => 'Parent Episode:',
		'all_items'             => 'All Episodes',
		'add_new_item'          => 'Add New Episode',
		'add_new'               => 'Add New',
		'new_item'              => 'New Episode',
		'edit_item'             => 'Edit Episode',
		'update_item'           => 'Update Episode',
		'view_item'             => 'View Episode',
		'search_items'          => 'Search Episode',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into episode',
		'uploaded_to_this_item' => 'Uploaded to this episode',
		'items_list'            => 'Episodes list',
		'items_list_navigation' => 'Episodes list navigation',
		'filter_items_list'     => 'Filter episodes list',
	);
	$args = array(
		'label'                 => 'Episodes',
		'description'           => 'Episode post for series',
		'labels'                => $labels,
		'supports'              => array( 'title', 'comments', 'author' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt3',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite' => array( 
			'slug' => 'watch',
			'with_front' => FALSE,
		),
	);
	register_post_type( 'watch', $args );

}
add_action( 'init', 'episode', 0 );

// Register Custom Post Type
function series() {

	$labels = array(
		'name'                  => _x( 'Series', 'Post Type General Name', 'mvs' ),
		'singular_name'         => _x( 'Series', 'Post Type Singular Name', 'mvs' ),
		'menu_name'             => __( 'Series', 'mvs' ),
		'name_admin_bar'        => __( 'Series', 'mvs' ),
		'archives'              => __( 'Series Archives', 'mvs' ),
		'parent_item_colon'     => __( 'Parent Series:', 'mvs' ),
		'all_items'             => __( 'All Series', 'mvs' ),
		'add_new_item'          => __( 'Add New Series', 'mvs' ),
		'add_new'               => __( 'Add New', 'mvs' ),
		'new_item'              => __( 'New Series', 'mvs' ),
		'edit_item'             => __( 'Edit Series', 'mvs' ),
		'update_item'           => __( 'Update Series', 'mvs' ),
		'view_item'             => __( 'View Series', 'mvs' ),
		'search_items'          => __( 'Search Series', 'mvs' ),
		'not_found'             => __( 'Not found', 'mvs' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mvs' ),
		'featured_image'        => __( 'Featured Image', 'mvs' ),
		'set_featured_image'    => __( 'Set featured image', 'mvs' ),
		'remove_featured_image' => __( 'Remove featured image', 'mvs' ),
		'use_featured_image'    => __( 'Use as featured image', 'mvs' ),
		'insert_into_item'      => __( 'Insert into series', 'mvs' ),
		'uploaded_to_this_item' => __( 'Uploaded to this series', 'mvs' ),
		'items_list'            => __( 'Series list', 'mvs' ),
		'items_list_navigation' => __( 'Series list navigation', 'mvs' ),
		'filter_items_list'     => __( 'Filter series list', 'mvs' ),
	);
	$args = array(
		'label'                 => __( 'Series', 'mvs' ),
		'description'           => __( 'Series for episodes', 'mvs' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'author'),
		'taxonomies'            => array( 'category', 'post_tag', 'director', 'actor', 'country', 'quality', 'years' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite' => array( 
			'slug' => 'series',
			'with_front' => FALSE,
		),
	);
	register_post_type( 'series', $args );

}
add_action( 'init', 'series', 0 );

function genre() {

    $labels = array(
        'name'                       => _x( 'Genre', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Genre', 'text_domain' ),
        'all_items'                  => __( 'All Genres', 'text_domain' ),
        'parent_item'                => __( 'Parent Genre', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Genre:', 'text_domain' ),
        'new_item_name'              => __( 'New Genre Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Genre', 'text_domain' ),
        'edit_item'                  => __( 'Edit Genre', 'text_domain' ),
        'update_item'                => __( 'Update Genre', 'text_domain' ),
        'view_item'                  => __( 'View Genre', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Genre with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Genres', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Genres', 'text_domain' ),
        'search_items'               => __( 'Search Genres', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No Genres', 'text_domain' ),
        'items_list'                 => __( 'Genres list', 'text_domain' ),
        'items_list_navigation'      => __( 'Genres list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'genre',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'genre', array( 'post','series' ), $args );

}
add_action( 'init', 'genre', 0 );
function director() {

    $labels = array(
        'name'                       => _x( 'Director', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Director', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Director', 'text_domain' ),
        'all_items'                  => __( 'All Directors', 'text_domain' ),
        'parent_item'                => __( 'Parent Director', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Director:', 'text_domain' ),
        'new_item_name'              => __( 'New Director Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Director', 'text_domain' ),
        'edit_item'                  => __( 'Edit Director', 'text_domain' ),
        'update_item'                => __( 'Update Director', 'text_domain' ),
        'view_item'                  => __( 'View Director', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Director with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Directors', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Directors', 'text_domain' ),
        'search_items'               => __( 'Search Directors', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No Directors', 'text_domain' ),
        'items_list'                 => __( 'Directors list', 'text_domain' ),
        'items_list_navigation'      => __( 'Directors list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'director',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'director', array( 'post','series' ), $args );

}
add_action( 'init', 'director', 0 );

function actor() {

    $labels = array(
        'name'                       => _x( 'Actor', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Actor', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Actor', 'text_domain' ),
        'all_items'                  => __( 'All Actors', 'text_domain' ),
        'parent_item'                => __( 'Parent Actor', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Actor:', 'text_domain' ),
        'new_item_name'              => __( 'New Actor Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Actor', 'text_domain' ),
        'edit_item'                  => __( 'Edit Actor', 'text_domain' ),
        'update_item'                => __( 'Update Actor', 'text_domain' ),
        'view_item'                  => __( 'View Actor', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Actor with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Actors', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Actors', 'text_domain' ),
        'search_items'               => __( 'Search Actors', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No Actors', 'text_domain' ),
        'items_list'                 => __( 'Actors list', 'text_domain' ),
        'items_list_navigation'      => __( 'Actors list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'actor',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'actor', array( 'post','series' ), $args );

}
add_action( 'init', 'actor', 0 );
function country() {

    $labels = array(
        'name'                       => _x( 'Country', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Country', 'text_domain' ),
        'all_items'                  => __( 'All Countries', 'text_domain' ),
        'parent_item'                => __( 'Parent Country', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Country:', 'text_domain' ),
        'new_item_name'              => __( 'New Country Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Country', 'text_domain' ),
        'edit_item'                  => __( 'Edit Country', 'text_domain' ),
        'update_item'                => __( 'Update Country', 'text_domain' ),
        'view_item'                  => __( 'View Country', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate countries with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove countries', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Countries', 'text_domain' ),
        'search_items'               => __( 'Search Countries', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No countries', 'text_domain' ),
        'items_list'                 => __( 'Countries list', 'text_domain' ),
        'items_list_navigation'      => __( 'Countries list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'country',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'country', array( 'post','series' ), $args );

}
add_action( 'init', 'country', 0 );

function quality() {

    $labels = array(
        'name'                       => _x( 'Quality', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Quality', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Quality', 'text_domain' ),
        'all_items'                  => __( 'All Quality', 'text_domain' ),
        'parent_item'                => __( 'Parent Quality', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Quality:', 'text_domain' ),
        'new_item_name'              => __( 'New Quality Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Quality', 'text_domain' ),
        'edit_item'                  => __( 'Edit Quality', 'text_domain' ),
        'update_item'                => __( 'Update Quality', 'text_domain' ),
        'view_item'                  => __( 'View Quality', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate quality with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove quality', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Quality', 'text_domain' ),
        'search_items'               => __( 'Search Quality', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No quality', 'text_domain' ),
        'items_list'                 => __( 'Quality list', 'text_domain' ),
        'items_list_navigation'      => __( 'Quality list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'quality',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'quality', array( 'post','series' ), $args );

}
add_action( 'init', 'quality', 0 );

function years() {

    $labels = array(
        'name'                       => _x( 'Year', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Year', 'text_domain' ),
        'all_items'                  => __( 'All Year', 'text_domain' ),
        'parent_item'                => __( 'Parent Year', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Year:', 'text_domain' ),
        'new_item_name'              => __( 'New Year Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Year', 'text_domain' ),
        'edit_item'                  => __( 'Edit Year', 'text_domain' ),
        'update_item'                => __( 'Update Year', 'text_domain' ),
        'view_item'                  => __( 'View Year', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate year with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove year', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Year', 'text_domain' ),
        'search_items'               => __( 'Search Year', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No year', 'text_domain' ),
        'items_list'                 => __( 'Year list', 'text_domain' ),
        'items_list_navigation'      => __( 'Year list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'years',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'years', array( 'post','series' ), $args );

}
add_action( 'init', 'years', 0 );

function network() {

    $labels = array(
        'name'                       => _x( 'Network', 'Taxonomy General Name', 'mvs' ),
        'singular_name'              => _x( 'Network', 'Taxonomy Singular Name', 'mvs' ),
        'menu_name'                  => __( 'Network', 'mvs' ),
        'all_items'                  => __( 'All Networks', 'mvs' ),
        'parent_item'                => __( 'Parent Network', 'mvs' ),
        'parent_item_colon'          => __( 'Parent Network:', 'mvs' ),
        'new_item_name'              => __( 'New Network Name', 'mvs' ),
        'add_new_item'               => __( 'Add New Network', 'mvs' ),
        'edit_item'                  => __( 'Edit Network', 'mvs' ),
        'update_item'                => __( 'Update Network', 'mvs' ),
        'view_item'                  => __( 'View Network', 'mvs' ),
        'separate_items_with_commas' => __( 'Separate networks with commas', 'mvs' ),
        'add_or_remove_items'        => __( 'Add or remove networks', 'mvs' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'mvs' ),
        'popular_items'              => __( 'Popular Networks', 'mvs' ),
        'search_items'               => __( 'Search Networks', 'mvs' ),
        'not_found'                  => __( 'Not Found', 'mvs' ),
        'no_terms'                   => __( 'No networks', 'mvs' ),
        'items_list'                 => __( 'Networks list', 'mvs' ),
        'items_list_navigation'      => __( 'Networks list navigation', 'mvs' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'network',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'network', array( 'series' ), $args );

}
add_action( 'init', 'network', 0 );

function movie_series() {

    $labels = array(
        'name'                       => _x( 'Movie Series', 'Taxonomy General Name', 'mvs' ),
        'singular_name'              => _x( 'Movie Series', 'Taxonomy Singular Name', 'mvs' ),
        'menu_name'                  => __( 'Movie Series', 'mvs' ),
        'all_items'                  => __( 'All Movie Series', 'mvs' ),
        'parent_item'                => __( 'Parent Movie Series', 'mvs' ),
        'parent_item_colon'          => __( 'Parent Movie Series:', 'mvs' ),
        'new_item_name'              => __( 'New Movie Series Name', 'mvs' ),
        'add_new_item'               => __( 'Add New Movie Series', 'mvs' ),
        'edit_item'                  => __( 'Edit Movie Series', 'mvs' ),
        'update_item'                => __( 'Update Movie Series', 'mvs' ),
        'view_item'                  => __( 'View Movie Series', 'mvs' ),
        'separate_items_with_commas' => __( 'Separate series with commas', 'mvs' ),
        'add_or_remove_items'        => __( 'Add or remove series', 'mvs' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'mvs' ),
        'popular_items'              => __( 'Popular Movie Series', 'mvs' ),
        'search_items'               => __( 'Search Movie Seriess', 'mvs' ),
        'not_found'                  => __( 'Not Found', 'mvs' ),
        'no_terms'                   => __( 'No series', 'mvs' ),
        'items_list'                 => __( 'Movie Series list', 'mvs' ),
        'items_list_navigation'      => __( 'Movie Series list navigation', 'mvs' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug' => 'movie-series',
			'with_front' => FALSE,
		),
    );
    register_taxonomy( 'movie-series', array( 'post' ), $args );

}
add_action( 'init', 'movie_series', 0 );
?>