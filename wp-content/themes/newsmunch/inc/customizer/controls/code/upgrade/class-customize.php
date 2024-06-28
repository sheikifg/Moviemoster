<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Newsmunch_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
        require_once NEWSMUNCH_THEME_INC_DIR . '/customizer/controls/code/upgrade/section-pro.php';

        // Register custom section types.
		$manager->register_section_type( 'Newsmunch_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Newsmunch_Customize_Section_Pro(
				$manager,
				'newsmunch',
				array(
                    'pro_text' => esc_html__( 'Upgrade to NewsMunch Pro','newsmunch' ),
                    'pro_url'  => 'https://desertthemes.com/themes/newsmunch-pro/',
                    'priority' => 0
                )
			)
		);
	}
}
// Doing this customizer thang!
Newsmunch_Customize::get_instance();