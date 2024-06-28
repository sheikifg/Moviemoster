<?php

/**
 * Active Callbacks
 *
 * @package Ace News
 */

// Theme Options.
function ace_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'ace_news_enable_pagination' )->value() );
}
function ace_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'ace_news_enable_breadcrumb' )->value() );
}

// Flash News Section.
function ace_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ace_news_enable_flash_news_section' )->value() );
}
function ace_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_flash_news_content_type' )->value();
	return ( ace_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ace_news_is_flash_news_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_flash_news_content_type' )->value();
	return ( ace_news_is_flash_news_section_enabled( $control ) && ( 'page' === $content_type ) );
}
function ace_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_flash_news_content_type' )->value();
	return ( ace_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section.
function ace_news_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ace_news_enable_banner_section' )->value() );
}

// Banner Section - Recent News.
function ace_news_is_recent_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_recent_news_content_type' )->value();
	return ( ace_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ace_news_is_recent_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_recent_news_content_type' )->value();
	return ( ace_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section - Banner Slider.
function ace_news_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_banner_slider_content_type' )->value();
	return ( ace_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ace_news_is_banner_slider_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_banner_slider_content_type' )->value();
	return ( ace_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section - Editor Choice.
function ace_news_is_editor_picks_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_editor_choice_content_type' )->value();
	return ( ace_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ace_news_is_editor_picks_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ace_news_editor_choice_content_type' )->value();
	return ( ace_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function ace_news_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
