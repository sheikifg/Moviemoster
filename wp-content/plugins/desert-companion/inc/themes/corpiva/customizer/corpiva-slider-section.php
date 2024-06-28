<?php
function corpiva_slider_customize_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
	$wp_customize->add_panel(
		'corpiva_frontpage_options', array(
			'priority' => 32,
			'title' => esc_html__( 'Theme Frontpage', 'desert-companion' ),
		)
	);
	
	$wp_customize->add_section(
		'slider_options', array(
			'title' => esc_html__( 'Slider Section', 'desert-companion' ),
			'panel' => 'corpiva_frontpage_options',
			'priority' => 1,
		)
	);
	
	/*=========================================
	Slider Content
	=========================================*/
	$wp_customize->add_setting(
		'slider_options_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'corpiva_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_options_head',
		array(
			'type' => 'hidden',
			'label' => __('Slider Contents','desert-companion'),
			'section' => 'slider_options',
		)
	);
	
	// Slider 
		$wp_customize->add_setting( 'corpiva_slider_option', 
			array(
			 'sanitize_callback' => 'corpiva_repeater_sanitize',
			 'priority' => 5,
			  'default' => corpiva_slider_options_default()
			)
		);
		
		$wp_customize->add_control( 
			new Corpiva_Repeater( $wp_customize, 
				'corpiva_slider_option', 
					array(
						'label'   => esc_html__('Slide','desert-companion'),
						'section' => 'slider_options',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'desert-companion' ),
						'item_name'                         => esc_html__( 'Slider', 'desert-companion' ),
						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_link2_control' => true,
						'customizer_repeater_button2_control' => true,
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_subtitle3_control' => true,
						'customizer_repeater_link3_control' => true,
						'customizer_repeater_slide_align' => true,
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
			
	// slider opacity
	if ( class_exists( 'Corpiva_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'corpiva_slider_opacity',
			array(
				'default'	      => '0.6',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'corpiva_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Corpiva_Customizer_Range_Control( $wp_customize, 'corpiva_slider_opacity', 
			array(
				'label'      => __( 'opacity', 'desert-companion' ),
				'section'  => 'slider_options',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 0,
							'max'           => 1,
							'step'          => 0.1,
							'default_value' => 0.6,
						),
					),
			) ) 
		);
	}
	
	 // Overlay Color
	$wp_customize->add_setting(
	'corpiva_slider_overlay', 
	array(
		'default'	      => '#000000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'priority' => 8,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'corpiva_slider_overlay', 
			array(
				'label'      => __( 'Overlay Color', 'desert-companion' ),
				'section'    => 'slider_options'
			) 
		) 
	);
}
add_action( 'customize_register', 'corpiva_slider_customize_setting' );