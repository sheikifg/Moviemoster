<?php
/**
* Get started notice
*/

add_action( 'wp_ajax_newsmunch_dismissed_notice_handler', 'newsmunch_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function newsmunch_ajax_notice_handler() {
    // Verify nonce
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'newsmunch_nonce' ) ) {
        if ( isset( $_POST['type'] ) ) {
            $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
            update_option( 'dismissed-' . $type, TRUE );
        }
    } else {
        // Nonce verification failed, handle error
        wp_die( 'Nonce verification failed' );
    }
}

function newsmunch_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="newsmunch-getting-started-notice clearfix">
                    <div class="newsmunch-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'newsmunch' ); ?>" />
                    </div><!-- /.newsmunch-theme-screenshot -->
                    <div class="newsmunch-theme-notice-content">
                        <h2 class="newsmunch-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'newsmunch' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('To take full advantage of all the features of this theme, Please click the <strong>Import Demo</strong> and Install and Activate the plugin then use the demo importer and <strong>install the Demo</strong> according to your need.', 'newsmunch')) ?></p>

                        <a class="newsmunch-btn-get-started button button-primary button-hero newsmunch-button-padding" href="#" data-name="" data-slug="">
						<?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Import Demo', 'newsmunch' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
						
						</a>
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                '%1$sCustomize theme%2$s</a>',
                                '<a class="button button-primary button-hero newsmunch-button-padding" target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
						<span class="newsmunch-push-down"><span aria-hidden="true" class="dashicons dashicons-external"></span>
						<?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                '%1$sView Demos%2$s</a></span>',
                                '<a class="" target="_blank" href="' . esc_url('https://preview.desertthemes.com/newsmunch/') . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.newsmunch-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'newsmunch_deprecated_hook_admin_notice' );

/**
* Plugin installer
*/

add_action( 'wp_ajax_install_act_plugin', 'newsmunch_admin_install_plugin' );

function newsmunch_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/desert-companion' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'desert-companion' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'desert-companion/desert-companion.php' );
    }
}