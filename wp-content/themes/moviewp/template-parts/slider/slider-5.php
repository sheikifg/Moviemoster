<?php 
$category_movies = get_cat_ID( 'Movies' ); 
$category_link_movies = get_category_link( $category_movies );
?>
<div class="app-heading">
<div class="text"><?php echo esc_html__('Latest Movies', 'moviewp'); ?></div>
<a href="<?php echo esc_url( $category_link_movies ); ?>" class="all"><?php echo esc_html__('View All', 'moviewp'); ?></a>
</div>
<?php 
	$last_movies = new WP_Query( array(
	'orderby' => 'post_date', 
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => 'Movies',
	'showposts' => 8,
	'no_found_rows' => true
	) );
?>
<?php while ($last_movies->have_posts()) : $last_movies->the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'item normal front' ); ?>>
	<a href="<?php the_permalink() ?>" rel="bookmark">
		<div class="item-flip">
			<div class="item-inner">
				<?php echo itemQuality(); ?>
				<?php echo itemTV(); ?>
				<img class="lazy" loading="lazy" src="<?php echo placeholder; ?>" data-src="<?php echo poster370(); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="item-details">
				<div class="item-details-inner">
					<?php the_title( '<h2 class="movie-title">', '</h2>' ); ?>
					<p class="movie-description"><?php SinglePlot('500'); ?></p>
					<div class="watch-btn">
						<?php echo itemRating(); ?>
						<?php echo itemYear(); ?>
						<span class="play"><?php echo play; ?></span>
					</div>
				</div>
			</div>
		</div>
	</a>
</div><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php wp_reset_postdata(); ?>