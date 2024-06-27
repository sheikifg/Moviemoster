<?php 
$category_id = get_cat_ID( 'TV Series' );  
$category_link = get_category_link( $category_id ); 
?>
<div class="app-heading">
<div class="text"><?php echo esc_html__('Random Series', 'moviewp'); ?></div>
<a href="<?php echo esc_url( $category_link ); ?>" class="all"><?php echo esc_html__('View All', 'moviewp'); ?></a>
</div>
<?php 
	$last_series = new WP_Query( array(
	'orderby' => 'rand', 
	//'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => 'TV Series',
	'showposts' => 8,
	'no_found_rows' => true
	) );
?>
<?php while ($last_series->have_posts()) : $last_series->the_post(); ?>
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