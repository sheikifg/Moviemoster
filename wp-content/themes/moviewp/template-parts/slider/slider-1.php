<?php 
$category_id = get_cat_ID( 'TV Series' );  
$category_link = get_category_link( $category_id ); 
?>
<div class="app-heading">
<div class="text"><?php echo esc_html__('Latest TV Series', 'moviewp'); ?></div>
<a href="<?php echo esc_url( $category_link ); ?>" class="all"><?php echo esc_html__('View All', 'moviewp'); ?></a>
</div>
<div class="carousel" data-flickity='{ "autoPlay": false, "wrapAround": true, "resize": true, "prevNextButtons": true, "pageDots": false, "lazyLoad": true, "lazyLoad": 4, "cellAlign": "left" }'>
	<?php 
		$featured = new WP_Query( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'category_name' => 'TV Series',
		'showposts' => 12,
		'no_found_rows' => true
		) );
		
	?>
	<?php while ($featured->have_posts()) : $featured->the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'carousel-cell' ); ?>>
		<a href="<?php the_permalink() ?>" rel="bookmark">
			<?php echo NumberOfEpisodes(); ?>
			<?php echo itemTV(); ?>
			<img class="carousel-cell-image" src="<?php echo placeholder_slider; ?>" data-flickity-lazyload="<?php echo SliderBackdrop(); ?>" />
			<span class="tt"><?php the_title(); ?></span>
		</a>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<?php wp_reset_postdata(); ?>
</div>