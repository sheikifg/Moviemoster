<?php

add_action( 'tgmpa_register', 'moviewp_register_required_plugins' );

function moviewp_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'Moviewp Core', // The plugin name.
			'slug'               => 'moviewp-core', // The plugin slug (typically the folder name).
			'source'             => 'https://dl.dropboxusercontent.com/scl/fi/6bdq4w941fxtheduzsiyo/moviewp-core.zip?rlkey=ncmyof5965cxx586kwaccuk5p&dl=0', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. 
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Custom Post Template', // The plugin name.
			'slug'               => 'custom-post-template', // The plugin slug (typically the folder name).
			'source'             => 'https://dl.dropboxusercontent.com/scl/fi/ui9tjp5zx61li686qoo4z/custom-post-template.zip?rlkey=940e5oexqpbqho5v3s26v89b6&dl=0', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher. 
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Advanced Custom Fields PRO', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => 'https://dl.dropboxusercontent.com/scl/fi/ppwc62zj5mgh2zbyf0qtv/advanced-custom-fields-pro.zip?rlkey=ojq2ejifzkmxep0x0oj6t7pbo&dl=0', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.9.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Category and Taxonomy Image', // The plugin name.
			'slug'               => 'wp-custom-taxonomy-image', // The plugin slug (typically the folder name).
			'source'             => 'https://dl.dropboxusercontent.com/scl/fi/k7jdyho1la733l5c8ctrm/wp-custom-taxonomy-image.zip?rlkey=8u7crln8vxl4251ju4k01fr5r&dl=0', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		), 
		
		array(
			'name'               => 'Importer', // The plugin name.
			'slug'               => 'Importer', // The plugin slug (typically the folder name).
			'source'             => 'https://dl.dropboxusercontent.com/scl/fi/y3gr6ovj7382xh3a7465x/Importer.zip?rlkey=4x410netcop2t7xd94zylvyi5&dl=0', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '8.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		), 
		 
	);

	$config = array(
		'id'           => 'moviewp',               // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'moviewp' ),
			'menu_title'                      => __( 'Install Plugins', 'moviewp' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'moviewp' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'moviewp' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'moviewp' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'moviewp'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'moviewp'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'moviewp'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'moviewp'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'moviewp'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'moviewp'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'moviewp'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'moviewp'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'moviewp'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'moviewp' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'moviewp' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'moviewp' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'moviewp' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'moviewp' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'moviewp' ),
			'dismiss'                         => __( 'Dismiss this notice', 'moviewp' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'moviewp' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'moviewp' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
