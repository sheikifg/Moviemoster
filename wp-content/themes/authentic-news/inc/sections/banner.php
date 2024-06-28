<?php
if ( ! get_theme_mod( 'ace_news_enable_banner_section', false ) ) {
	return;
}

$recent_content_ids  = $slider_content_ids = array();
$recent_content_type = get_theme_mod( 'ace_news_recent_news_content_type', 'post' );
$slider_content_type = get_theme_mod( 'ace_news_banner_slider_content_type', 'post' );

if ( $recent_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$recent_content_ids[] = get_theme_mod( 'ace_news_recent_news_content_post_' . $i );
	}
	$recent_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $recent_content_ids ) ) ) {
		$recent_args['post__in'] = array_filter( $recent_content_ids );
		$recent_args['orderby']  = 'post__in';
	} else {
		$recent_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'ace_news_recent_news_content_category' );
	$recent_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}
$recent_args = apply_filters( 'ace_news_banner_section_args', $recent_args );

if ( $slider_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$slider_content_ids[] = get_theme_mod( 'ace_news_banner_slider_content_post_' . $i );
	}
	$banner_slider_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $slider_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $slider_content_ids ) ) ) {
		$banner_slider_args['post__in'] = array_filter( $slider_content_ids );
		$banner_slider_args['orderby']  = 'post__in';
	} else {
		$banner_slider_args['orderby'] = 'date';
	}
} else {
	$cat_content_id     = get_theme_mod( 'ace_news_banner_slider_content_category' );
	$banner_slider_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$banner_slider_args = apply_filters( 'ace_news_banner_section_args', $banner_slider_args );

ace_news_render_banner_section( $recent_args, $banner_slider_args );

/**
 * Render Banner Section.
 */
function ace_news_render_banner_section( $recent_args, $banner_slider_args ) {
	?>

	<section id="ace_news_banner_section" class="banner-section ascendoor-customizer-section banner-style-3">
		<?php
		if ( is_customize_preview() ) :
			ace_news_section_link( 'ace_news_banner_section' );
		endif;
		?>
		<div class="section-wrapper">
			<div class="banner-container-wrapper">

				<!-- Start Banner Recent News -->
				<?php
				$recent_title   = get_theme_mod( 'ace_news_recent_news_title', __( 'Recent News', 'authentic-news' ) );
				$viewall_button = get_theme_mod( 'ace_news_recent_news_button_label', __( 'View All', 'authentic-news' ) );
				$button_url     = get_theme_mod( 'ace_news_recent_news_button_link' );
				$content_type   = get_theme_mod( 'ace_news_recent_news_content_type', 'post' );
				if ( 'category' === $content_type ) {
					$recent_category = get_theme_mod( 'ace_news_recent_news_content_category' );
					$button_url      = ! empty( $button_url ) ? $button_url : get_category_link( $recent_category );
				} else {
					$button_url = ! empty( $button_url ) ? $button_url : '#';
				}
				?>
				<div class="recent-stories">
					<div class="main-wrap">
						<?php if ( ! empty( $recent_title || $viewall_button ) ) : ?>
							<div class="title-heading">
								<h3 class="widget-title">
									<span><?php echo esc_html( $recent_title ); ?></span>
								</h3>
								<a href="<?php echo esc_url( $button_url ); ?>" class="view-all"><?php echo esc_html( $viewall_button ); ?></a>
							</div>
						<?php endif ?>
						<div class="post-wrapper">
							<?php
							$recent_query = new WP_Query( $recent_args );
							if ( $recent_query->have_posts() ) {
								while ( $recent_query->have_posts() ) :
									$recent_query->the_post();
									?>
									<div class="blog-post-container list-layout">
										<div class="blog-post-inner">
											<?php if ( has_post_thumbnail() ) { ?>
												<div class="blog-post-image">
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
												</div>
											<?php } ?>
											<div class="blog-post-detail">
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
				</div>
				<!-- End Banner Recent News -->

				<!-- Start Banner Slider -->
				<?php
				$slider_title   = get_theme_mod( 'ace_news_banner_slider_title', __( 'Banner Slider', 'authentic-news' ) );
				$autoplay_speed = get_theme_mod( 'ace_news_banner_slider_autoplay_speed', 4000 );
				?>
				<div class="banner-slider-part">
					<div class="main-wrap">
						<div class="banner-slider-header">
							<?php if ( ! empty( $slider_title ) ) { ?>
								<div class="title-heading">
									<h3 class="widget-title">
										<span><?php echo esc_html( $slider_title ); ?></span>
									</h3>
								</div>
							<?php } ?>
							<div class="banner-slider-navigation"></div>
						</div>
						<div class="banner-slider slick-button" data-slick='{"autoplaySpeed": <?php echo esc_attr( $autoplay_speed ); ?> }'>
							<?php
							$banner_slider_query = new WP_Query( $banner_slider_args );
							if ( $banner_slider_query->have_posts() ) {
								while ( $banner_slider_query->have_posts() ) :
									$banner_slider_query->the_post();
									?>
									<div class="blog-post-container tile-layout">
										<div class="blog-post-inner">
											<?php if ( has_post_thumbnail() ) { ?>
												<div class="blog-post-image">
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
												</div>
											<?php } ?>
											<div class="blog-post-detail">
												<div class="post-categories">
													<?php ace_news_categories_list(); ?>
												</div>
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>
												<p class="post-excerpt">
													<?php echo wp_kses_post( wp_trim_words( get_the_content(), 15 ) ); ?>
												</p>
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
				</div>
				<!-- End Banner Slider -->

			</div>
		</div>
	</section>

	<?php

}
