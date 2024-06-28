<?php
/**
 * Authentic News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Authentic News
 */

if ( ! function_exists( 'authentic_news_setup' ) ) :
	function authentic_news_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'authentic-news', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'authentic_news_setup' );

if ( ! function_exists( 'authentic_news_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function authentic_news_enqueue_styles() {
		$parenthandle = 'ace-news-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'ace-news-slick-css',
				'ace-news-fontawesome-css',
				'ace-news-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'authentic-news-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'authentic_news_enqueue_styles' );

function authentic_news_admin_style() {
	?>
	<style type="text/css">
		.ocdi .notice.ace-news-demo-content {
			display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'authentic_news_admin_style' );

function authentic_news_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'ace_news_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => 'ff9b38',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'ace_news_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'authentic_news_custom_header_setup' );

/**
 * Customizer.
 */
require get_theme_file_path() . '/inc/customizer.php';

/**
 * Custom Controls.
 */
require get_theme_file_path() . '/inc/custom-controls.php';

/**
 * Widgets.
 */
require get_theme_file_path() . '/inc/widgets/widgets.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/ocdi.php';
}
