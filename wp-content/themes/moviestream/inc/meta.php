<?php
add_filter( 'rwmb_meta_boxes', 'sora_register_meta_boxes' );
function sora_register_meta_boxes( $meta_boxes )
{
    $prefix = 'sora_';
	$meta_boxes[] = array(
		'id' => 'autogenerateimgcat',
		'title' => __( 'Automatic', 'meta-box' ),
	        'pages' => array( 'post', 'series' ),
	        'context' => 'normal',
		'priority' => 'high',
		'autosave' => false,
		'fields' => array(
			array(
				
				'id'   => "{$prefix}autogenerateimgcat",
				'desc'  => __( 'Auto Create Featured Image', 'meta-box' ),
				'type' => 'checkbox',
				'std' => 1,
			)
		)
	);
    $meta_boxes[] = array(
        'id'         => 'series',
        'title'      => __( 'Series' ),
        'post_types' => array( 'series' ),
        'context'    => 'normal',
        'autosave'   => true,
        'fields'     => array(
			array(
                'name'  => __( 'Big Cover', 'meta-box' ),
                'id'    => "{$prefix}coverx",
                'type'  => 'image_advanced',
				'max_file_uploads' => '1'
            ),
            array(
                'name'  => __( 'Episodes' ),
                'id'    => "{$prefix}episodes",
                'type'  => 'text',
            ),
            array(
                'name' => __('Type', 'meta-box'),
                'id' => "{$prefix}type",
                'type' => 'select',
                'options' => array(
                    'TV' => __('TV', 'meta-box'),
                    'OVA' => __('OVA', 'meta-box'),
                    'Special' => __('Special', 'meta-box'),
                    'ONA' => __('ONA', 'meta-box'),
                    'Music' => __('Music', 'meta-box')
                ),
                'multiple' => false,
                'std' => 'TV'
            ),
            array(
                'name' => __('Status', 'meta-box'),
                'id' => "{$prefix}status",
                'type' => 'radio',
                'options' => array(
                    'Ongoing' => __('Ongoing', 'meta-box'),
                    'Completed' => __('Completed', 'meta-box'),
                    'Dropped' => __('Dropped', 'meta-box'),
                ),
                'multiple' => false,
                'std' => 'Ongoing'
            ),
            array(
                'name'  => __( 'Score' ),
                'id'    => "{$prefix}imdb",
                'type'  => 'text',
            ),
			array(
                'name'  => __( 'Votes' ),
                'id'    => "{$prefix}votes",
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Runtime' ),
                'id'    => "{$prefix}duration",
                'type'  => 'text',
            ),
            array(
                'name'       => __( 'Released' ),
                'id'         => "{$prefix}date",
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Thumbnail Cover' ),
                'id'         => "{$prefix}cover",
                'type'       => 'text',
            ),
			array(
                'name'       => __( 'Slider' ),
                'id'         => "{$prefix}sliderimage",
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Gallery' ),
                'id'         => "{$prefix}gallery",
                'type'       => 'textarea',
                'desc'       => 'enter url per line',
            ),
            array(
                'name'       => __( 'Youtube Trailer' ),
                'id'         => "{$prefix}trailer",
                'type'       => 'text',
                'desc'       => 'Example: (https://www.youtube.com/watch?v=11Yw47XKgcI) = [youtube id="11Yw47XKgcI"]'
            ),
			array(
                'name' => __('Latest Episode', 'meta-box'),
                'id' => "{$prefix}latest",
                'desc' => __('Do not change this field (auto update)', 'meta-box'),
                'type' => 'text'
            ),
        ),
    );
    $meta_boxes[] = array(
        'id'         => 'general',
        'title'      => __( 'General' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'autosave'   => true,
        'fields'     => array(
			array(
                'name'  => __( 'Big Cover', 'meta-box' ),
                'id'    => "{$prefix}coverx",
                'type'  => 'image_advanced',
				'max_file_uploads' => '1'
            ),
            array(
                'name'  => __( 'IMDB Score' ),
                'id'    => "{$prefix}imdb",
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Votes' ),
                'id'    => "{$prefix}votes",
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Rated' ),
                'id'    => "{$prefix}rated",
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Runtime' ),
                'id'    => "{$prefix}duration",
                'type'  => 'text',
            ),
            array(
                'name'       => __( 'Released' ),
                'id'         => "{$prefix}date",
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Cover' ),
                'id'         => "{$prefix}cover",
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Gallery' ),
                'id'         => "{$prefix}gallery",
                'type'       => 'textarea',
                'desc'       => 'enter url per line',
            ),
            array(
                'name'       => __( 'Youtube Trailer' ),
                'id'         => "{$prefix}trailer",
                'type'       => 'text',
                'desc'       => 'Example: (https://www.youtube.com/watch?v=11Yw47XKgcI) = [youtube id="11Yw47XKgcI"]'
            ),
        ),
    );
    $meta_boxes[] = array(
        'id'         => 'episode',
        'title'      => __( 'Episode' ),
        'post_types' => array( 'watch' ),
        'context'    => 'normal',
        'autosave'   => true,
        'fields'     => array(
			array(
                'name'  => __( 'Season' ),
                'id'    => "{$prefix}season",
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Episode' ),
                'id'    => "{$prefix}eps",
                'type'  => 'text',
				'required' => 1,
            ),
			array(
                'name'  => __( 'Episode Title' ),
                'id'    => "{$prefix}epstitle",
                'type'  => 'text',
            ),
            array(
                'name' => __('Status', 'meta-box'),
                'id' => "{$prefix}lang",
                'type' => 'radio',
                'options' => array(
                    'RAW' => __('RAW', 'meta-box'),
                    'Sub' => __('Sub', 'meta-box'),
                ),
                'multiple' => false,
                'std' => 'Sub'
            ),
            array(
                'name' => __('Series', 'meta-box'),
                'id' => "{$prefix}series",
                'type' => 'post',
                'post_type' => 'series',
				'required' => 1,
                'field_type' => 'select_advanced',
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC'
                )
            ),
        ),
    );
	$meta_boxes[] = array(
        'title'  => 'Embed Video',
		'pages' => array( 'post','watch' ),
		'tabs'      => array(
            'input-version' => array(
                'label' => 'Input Version',
                'icon'  => 'dashicons-admin-customizer',
            ),
            'sc-version'  => array(
                'label' => 'Shortcode Version',
                'icon'  => 'dashicons-editor-code',
            ),
        ),
		'tab_style' => 'default',
        'fields' => array(
            array(
                'id'     => 'ab_embedgroup',
                'type'   => 'group',
                'clone'  => true,
				'sort_clone'  => true,
				'save_state' => true,
				'desc' => '<b style="color:red;">You can insert embed code or shortcode</b>',
				'tab'  => 'input-version',
                'fields' => array(
                    array(
                        'name'  => 'Host Name',
                        'id'    => 'ab_hostname',
                        'type'  => 'text',
                    ),
                    array(
                        'name'   => 'Embed',
                        'id'     => 'ab_embed',
                        'type'   => 'textarea',
						'sanitize_callback' => 'none',
                    ),
                ), //episode
            ), //input-version
			array(
                'name'  => __( 'Shortcode Video', 'meta-box' ),
                'id'    => "{$prefix}embed",
                'type'  => 'textarea',
				'clone' => 'true',
                'sort_clone'  => true,
				'sanitize_callback' => 'none',
				'tab' => 'sc-version',
            ),
        ),
    );
	$meta_boxes[] = array(
        'title'  => 'Download',
		'pages' => array( 'post','watch','series' ),
		'tabs'      => array(
            'input-version' => array(
                'label' => 'Input Version',
                'icon'  => 'dashicons-admin-customizer',
            ),
            'sc-version'  => array(
                'label' => 'Shortcode Version',
                'icon'  => 'dashicons-editor-code',
            ),
        ),
		'tab_style' => 'default',
        'fields' => array(
            array(
                'id'     => 'ab_downloadgroup',
                'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'tab'  => 'input-version',
				'save_state' => true,
                'fields' => array(
                    array(
                        'name'  => 'Host Name',
                        'id'    => 'ab_hostname',
                        'type'  => 'text',
						'columns' => '2',
                    ),
                    array(
                        'name'   => 'Language',
                        'id'     => 'ab_language',
                        'type'   => 'text',
						'columns' => '2',
                    ),
					array(
                        'name'   => 'Quality',
                        'id'     => 'ab_quality',
                        'type'   => 'text',
						'columns' => '2',
                    ),
					array(
                        'name'   => 'Size',
                        'id'     => 'ab_size',
                        'type'   => 'text',
						'columns' => '2',
                    ),
					array(
                        'name'   => 'Link',
                        'id'     => 'ab_linkurl',
                        'type'   => 'text',
						'columns' => '4',
						'sanitize_callback' => 'none',
                    ),
                ),
            ), //input-version
			array(
                'name'  => __( 'Shortcode Download', 'meta-box' ),
                'id'    => "{$prefix}url",
                'type'  => 'textarea',
				'desc'  => 'Example: [dl n="FileHosting" u="http://domain.xxx" s="English" q="HD"]',
				'clone' => 'true',
				'sanitize_callback' => 'none',
				'tab' => 'sc-version',
            ),
        ),
    );
    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'ts_mvs_generate_series_data' );

function ts_mvs_generate_series_data( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'    => __( 'Generate Data From TMDb', 'ts_mvs_generate_series_data' ),
        'id'       => 'moviestream-generate-tmdb',
        'priority' => 'low',
        "post_types" => ['post', 'series'],
        'fields'   => [
            [
                'name' => __( 'TMDb ID', 'ts_mvs_generate_series_data' ),
                'id'   => $prefix . 'ts_mvs_tmdb_id',
                'type' => 'text',
                'desc' => __( 'Example for Movie: https://www.themoviedb.org/movie/10193-toy-story-3 = <b>10193</b><br/> 				Example for TV Series: https://www.themoviedb.org/tv/63119 = <b>63119</b>', 'ts_mvs_generate_series_data' ),
            ],
            [
                'name'        => __( 'Select Language', 'ts_mvs_generate_series_data' ),
                'id'          => $prefix . 'ts_mvs_language',
                'type'        => 'select',
                'placeholder' => __( 'Select Language', 'ts_mvs_generate_series_data' ),
                'save_field'  => false,
                "desc"        => "In case of incomplete data, English language data will be used as a fallback when information in other languages is not available or insufficient."
            ],
            [
                'name'       => __( '&nbsp;', 'ts_mvs_generate_series_data' ),
                'id'         => $prefix . 'ts_mvs_generate_btn',
                'type'       => 'button',
                'std'        => 'Generate',
                'save_field' => false,
            ],
        ],
    ];

    return $meta_boxes;
}

?>