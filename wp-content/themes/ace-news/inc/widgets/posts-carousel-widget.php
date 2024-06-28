<?php
if ( ! class_exists( 'Ace_News_Posts_Carousel_Widget' ) ) {
	/**
	 * Adds Ace_News_Posts_Carousel_Widget Widget.
	 */
	class Ace_News_Posts_Carousel_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$ace_news_posts_carousel_widget_ops = array(
				'classname'   => 'carousel-widget ascendoor-widget',
				'description' => __( 'Retrive Posts Carousel Widgets', 'ace-news' ),
			);
			parent::__construct(
				'ace_news_posts_carousel_widget',
				__( 'Ascendoor Posts Carousel Widget', 'ace-news' ),
				$ace_news_posts_carousel_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$carousel_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$carousel_title        = apply_filters( 'widget_title', $carousel_title, $instance, $this->id_base );
			$carousel_button_label = ( ! empty( $instance['button_label'] ) ) ? $instance['button_label'] : '';
			$carousel_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$carousel_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$carousel_button_link  = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : esc_url( get_category_link( $carousel_category ) );

			echo $args['before_widget'];
			?>
			<div class="main-wrap">
				<?php if ( ! empty( $carousel_title || $carousel_button_label ) ) { ?>
					<div class="title-heading">
						<?php echo $args['before_title'] . esc_html( $carousel_title ) . $args['after_title']; ?>
						<a href="<?php echo esc_url( $carousel_button_link ); ?>" class="view-all"><?php echo esc_html( $carousel_button_label ); ?></a>
					</div>
				<?php } ?>
				<div class="carousel-post-wrapper">
					<div class="carousel-post slick-button">
						<?php
						$carousel_widgets_args = array(
							'post_type'      => 'post',
							'posts_per_page' => absint( 5 ),
							'offset'         => absint( $carousel_post_offset ),
							'cat'            => absint( $carousel_category ),
						);

						$query = new WP_Query( $carousel_widgets_args );
						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="blog-post-container tile-layout">
									<div class="blog-post-inner">
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="blog-post-image">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</div>
										<?php } ?>
										<div class="blog-post-detail">
											<div class="post-categories">
												<?php ace_news_categories_list(); ?>
											</div>
											<h2 class="entry-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h2>
											<div class="post-meta">
												<?php ace_news_posted_by(); ?>
												<?php ace_news_posted_on(); ?>
											</div>
										</div>	
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$carousel_title        = isset( $instance['title'] ) ? $instance['title'] : '';
			$carousel_button_label = isset( $instance['button_label'] ) ? $instance['button_label'] : '';
			$carousel_button_link  = isset( $instance['button_link'] ) ? $instance['button_link'] : '';
			$carousel_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$carousel_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'ace-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $carousel_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'ace-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $carousel_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'ace-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $carousel_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'ace-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $carousel_post_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'ace-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = ace_news_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $carousel_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                 = $old_instance;
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			$instance['button_label'] = sanitize_text_field( $new_instance['button_label'] );
			$instance['button_link']  = esc_url_raw( $new_instance['button_link'] );
			$instance['offset']       = (int) $new_instance['offset'];
			$instance['category']     = (int) $new_instance['category'];
			return $instance;
		}
	}
}
