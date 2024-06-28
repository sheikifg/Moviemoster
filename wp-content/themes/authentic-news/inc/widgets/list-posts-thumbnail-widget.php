<?php
if ( ! class_exists( 'Ace_News_List_Posts_Thumbnail_Widget' ) ) {
	/**
	 * Adds Ace_News_List_Posts_Thumbnail_Widget Widget.
	 */
	class Ace_News_List_Posts_Thumbnail_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$ace_news_list_posts_thumbnail_widget_ops = array(
				'classname'   => 'thumbnail-list-post ascendoor-widget',
				'description' => __( 'Retrive List Posts Thumbnail Widgets', 'authentic-news' ),
			);
			parent::__construct(
				'ace_news_list_posts_thumbnail_widget',
				__( 'Ascendoor List Posts Thumbnail Widget', 'authentic-news' ),
				$ace_news_list_posts_thumbnail_widget_ops
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
			$list_posts_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$list_posts_title        = apply_filters( 'widget_title', $list_posts_title, $instance, $this->id_base );
			$list_posts_button_label = ( ! empty( $instance['button_label'] ) ) ? $instance['button_label'] : '';
			$list_posts_count        = isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;
			$list_posts_offset       = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$list_posts_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$list_posts_button_link  = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : esc_url( get_category_link( $list_posts_category ) );

			echo $args['before_widget'];
			?>
			<div class="main-wrap">
				<?php if ( ! empty( $list_posts_title || $list_posts_button_label ) ) { ?>
					<div class="title-heading">
						<?php echo $args['before_title'] . esc_html( $list_posts_title ) . $args['after_title']; ?>
						<a href="<?php echo esc_url( $list_posts_button_link ); ?>" class="view-all"><?php echo esc_html( $list_posts_button_label ); ?></a>
					</div>
				<?php } ?>
				<div class="thumbnail-list-post-wrapper">
					<?php
					$list_posts_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( $list_posts_count ),
						'offset'         => absint( $list_posts_offset ),
						'cat'            => absint( $list_posts_category ),
					);
					$query                   = new WP_Query( $list_posts_widgets_args );
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="blog-post-container list-layout">
								<div class="blog-post-inner">
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
					}
					?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
			?>
			<?php
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$list_posts_title        = isset( $instance['title'] ) ? $instance['title'] : '';
			$list_posts_button_label = isset( $instance['button_label'] ) ? $instance['button_label'] : '';
			$list_posts_button_link  = isset( $instance['button_link'] ) ? $instance['button_link'] : '';
			$list_posts_count        = isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;
			$list_posts_offset       = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$list_posts_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'authentic-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $list_posts_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'authentic-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $list_posts_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'authentic-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $list_posts_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show ( Min: 1 | Max: 6 ):', 'authentic-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="6" value="<?php echo absint( $list_posts_count ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'authentic-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $list_posts_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'authentic-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = ace_news_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $list_posts_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
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
			$instance['number']       = (int) $new_instance['number'];
			$instance['offset']       = (int) $new_instance['offset'];
			$instance['category']     = (int) $new_instance['category'];
			return $instance;
		}
	}
}
