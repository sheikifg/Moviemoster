<?php 
$category_movies = get_cat_ID( 'Movies' ); 
$category_link_movies = get_category_link( $category_movies );
?>
<div class="app-heading">
<div class="text"><?php echo esc_html__('Featured Movies', 'moviewp'); ?></div>
<a href="<?php echo esc_url( $category_link_movies ); ?>?order=views" class="all"><?php echo esc_html__('View All', 'moviewp'); ?></a>
</div>
<div class="carousel collections" data-flickity='{ "autoPlay": true, "wrapAround": true, "resize": true, "prevNextButtons": true, "pageDots": false, "lazyLoad": true, "lazyLoad": 6 }'>
	<?php 
		$logos = new WP_Query( array(

					'post_type' => 'post',
					'post_status' => 'publish',
					'ignore_sticky_posts' => true,
					'meta_key' => 'end_time',
					'meta_compare' =>'>=',
					'meta_value'=>time(),
					'meta_key' => 'revenue',
					'category_name' => 'Movies',
					'orderby' => 'meta_value_num',
					'showposts' => 12,
					'order' => 'DESC',
					'no_found_rows' => true
		) );
		
	?>
	<?php while ($logos->have_posts()) : $logos->the_post(); $imdbid = esc_html(get_post_meta($post -> ID, 'imdb_id', true)); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'carousel-cell collections' ); ?>>
		<a href="<?php the_permalink() ?>" rel="bookmark">
			<img class="carousel-cell-image-collections" id="logos" data-title="<?php the_title(); ?>" src="<?php echo placeholder_slider; ?>" data-flickity-lazyload="//images.metahub.space/logo/medium/<?php echo $imdbid; ?>/img?format=.webp" />
		</a>
	</div><!-- #post-<?php the_ID(); ?> -->	
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<?php wp_reset_postdata(); ?>
</div>