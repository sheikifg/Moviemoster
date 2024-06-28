<?php
function corpiva_information_customize_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Information Section
	=========================================*/
	$wp_customize->add_section(
		'information_options', array(
			'title' => esc_html__( 'Information Section', 'desert-companion' ),
			'panel' => 'corpiva_frontpage_options',
			'priority' => 2,
		)
	);
	
	/*=========================================
	Information Content
	=========================================*/
	$wp_customize->add_setting(
		'information_options_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'corpiva_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'information_options_head',
		array(
			'type' => 'hidden',
			'label' => __('Information Contents','desert-companion'),
			'section' => 'information_options',
		)
	);
	
	// Information 
		$wp_customize->add_setting( 'corpiva_information_option', 
			array(
			 'sanitize_callback' => 'corpiva_repeater_sanitize',
			 'priority' => 5,
			 'default' => corpiva_information_options_default()
			)
		);
		
		$wp_customize->add_control( 
			new Corpiva_Repeater( $wp_customize, 
				'corpiva_information_option', 
					array(
						'label'   => esc_html__('Information','desert-companion'),
						'section' => 'information_options',
						'add_field_label'                   => esc_html__( 'Add New Information', 'desert-companion' ),
						'item_name'                         => esc_html__( 'Information', 'desert-companion' ),
						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_icon_control' => true
					) 
				) 
			);
}
add_action( 'customize_register', 'corpiva_information_customize_setting' );