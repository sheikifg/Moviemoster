<?php
/**
 * Theme Customizer
 *
 * @package Authentic_News
 */

function authentic_news_customize_register( $wp_customize ) {

	// Upsell Section.
	$wp_customize->add_section(
		new Authentic_News_Upsell_Section(
			$wp_customize,
			'upsell_sections',
			array(
				'title'            => __( 'Authentic News Pro', 'authentic-news' ),
				'button_text'      => __( 'Buy Pro', 'authentic-news' ),
				'url'              => 'https://ascendoor.com/themes/authentic-news-pro/',
				'background_color' => '#ff9b38',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

}
add_action( 'customize_register', 'authentic_news_customize_register' );

function authentic_news_custom_control_scripts() {

	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'authentic-news-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array( 'ace-news-custom-controls-css' ), '1.0', 'all' );
	wp_enqueue_script( 'authentic-news-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'ace-news-custom-controls-js', 'jquery', 'jquery-ui-core' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'authentic_news_custom_control_scripts' );
