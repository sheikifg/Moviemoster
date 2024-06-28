<?php
if ( ! class_exists( 'Ace_News_Author_Info_Widget' ) ) {
	/**
	 * Adds Ace_News_Author_Info_Widget Widget.
	 */
	class Ace_News_Author_Info_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$ace_news_author_info_widget_ops = array(
				'classname'   => 'blog-author-section ascendoor-widget author-style-1',
				'description' => __( 'Retrive Author Information Widget', 'authentic-news' ),
			);
			parent::__construct(
				'ace_news_author_info_widget',
				__( 'Ascendoor Author Info Widget', 'authentic-news' ),
				$ace_news_author_info_widget_ops
			);
		}

		/**
		 * Front-end display of widget.

		 * @see WP_Widget::widget()

		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$section_title      = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$section_title      = apply_filters( 'widget_title', $section_title, $instance, $this->id_base );
			$author_image_url   = ! empty( $instance['author_image_url'] ) ? $instance['author_image_url'] : '';
			$author_name        = ! empty( $instance['name'] ) ? $instance['name'] : '';
			$author_address     = ! empty( $instance['address'] ) ? $instance['address'] : '';
			$author_description = ! empty( $instance['description'] ) ? $instance['description'] : '';
			$open_link_new_tab  = ! empty( $instance['open_link_new_tab'] ) ? true : false;
			$target             = empty( $open_link_new_tab ) ? '' : 'target="_blank"';

			echo $args['before_widget'];
			?>
			<div class="main-wrap">
				<?php if ( ! empty( $section_title ) ) { ?>
					<div class="title-heading">
						<?php echo $args['before_title'] . esc_html( $section_title ) . $args['after_title']; ?>
					</div>
				<?php } ?>
				<div class=" author-container">
					<div class=" author-info">
						<?php if ( ! empty( $author_image_url ) ) { ?>
							<div class=" author-image">
								<?php
								$sizes = array();
								echo '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( $author_name ) . '"  />';
								?>
							</div>
						<?php } ?>
						<div class="author-bio">
							<p class="author-name">
								<?php echo esc_html( $author_name ); ?>
							</p>
							<p class="author-address">
								<?php echo esc_html( $author_address ); ?>
							</p>
						</div>
					</div>
					<?php if ( ! empty( $author_description ) ) : ?>
						<p class="author-description">
							<?php echo wp_kses_post( $author_description ); ?>
						</p>
					<?php endif; ?>
					<ul class="social-links">
						<?php
						for ( $i = 1; $i <= 4; $i++ ) {
							$link = ( ! empty( $instance[ 'link' . '-' . $i ] ) ) ? $instance[ 'link' . '-' . $i ] : '';
							if ( ! empty( $link ) ) :
								?>
								<li><a href="<?php echo esc_url( $link ) . '" ' . esc_attr( $target ); ?>"></a></li>
								<?php
							endif;
						}
						?>
					</ul>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.

		 * @see WP_Widget::form()

		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$section_title      = isset( $instance['title'] ) ? $instance['title'] : '';
			$author_image_url   = isset( $instance['author_image_url'] ) ? $instance['author_image_url'] : '';
			$author_name        = isset( $instance['name'] ) ? $instance['name'] : '';
			$author_address     = isset( $instance['address'] ) ? $instance['address'] : '';
			$author_description = isset( $instance['description'] ) ? $instance['description'] : '';
			$open_link_new_tab  = isset( $instance['open_link_new_tab'] ) ? $instance['open_link_new_tab'] : false;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'authentic-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $section_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'author_image_url' ) ); ?>"><?php esc_html_e( 'Author Image URL', 'authentic-news' ); ?></label>:<br />
				<input type="url" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'author_image_url' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'author_image_url' ) ); ?>" value="<?php echo esc_url( $author_image_url ); ?>" /><br />
				<input type="button" class="select-img" value="<?php esc_attr_e( 'Upload', 'authentic-news' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'authentic-news' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'authentic-news' ); ?>" style="margin-top:5px;" /><br/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Author Name:', 'authentic-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Author Address:', 'authentic-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" value="<?php echo esc_attr( $author_address ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description :', 'authentic-news' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" value="<?php echo esc_attr( $author_description ); ?>"><?php echo wp_kses_post( $author_description ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'open_link_new_tab' ) ); ?>"><?php esc_html_e( 'Open Social link in New Tab', 'authentic-news' ); ?>:</label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'open_link_new_tab' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'open_link_new_tab' ), 'authentic-news' ); ?>"  <?php checked( $open_link_new_tab, true ); ?> />
			</p>
			<?php
			for ( $i = 1; $i <= 4; $i++ ) {
				$link = isset( $instance[ 'link' . '-' . $i ] ) ? $instance[ 'link' . '-' . $i ] : '';
				?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>"><?php sprintf( esc_html__( 'Link %s :', 'authentic-news' ), $i ); ?></label>
					<input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' . '-' . $i ) ); ?>" value="<?php echo esc_url( $link ); ?>"/>
				</p>
			<?php } ?>

			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.

		 * @see WP_Widget::update()

		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.

		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {

			$instance                      = $old_instance;
			$instance['title']             = sanitize_text_field( $new_instance['title'] );
			$instance['author_image_url']  = esc_url_raw( $new_instance['author_image_url'] );
			$instance['name']              = sanitize_text_field( $new_instance['name'] );
			$instance['address']           = sanitize_text_field( $new_instance['address'] );
			$instance['description']       = wp_kses_post( $new_instance['description'] );
			$instance['open_link_new_tab'] = ace_news_sanitize_checkbox( $new_instance['open_link_new_tab'] );
			for ( $i = 1; $i <= 4; $i++ ) {
				$instance[ 'link' . '-' . $i ] = esc_url_raw( $new_instance[ 'link' . '-' . $i ] );
			}

			return $instance;
		}

	}
}

/**
 * Enqueue admin scripts for Image Widget
 *
 * @since Ace News 1.0
 **/
function authentic_news_author_info_widget_image_upload_enqueue( $hook ) {

	if ( 'widgets.php' !== $hook ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script( 'author-info-widget-image-upload-script', get_template_directory_uri() . '/assets/js/upload.js', array( 'jquery' ), ACE_NEWS_VERSION, true );
}

add_action( 'admin_enqueue_scripts', 'authentic_news_author_info_widget_image_upload_enqueue' );
