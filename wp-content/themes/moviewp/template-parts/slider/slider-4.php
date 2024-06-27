<div class="app-heading">
<div class="text"><?php echo esc_html__('Top 10 List', 'moviewp'); ?></div>
<a href="<?php echo esc_url( home_url() ); ?>/top/" class="all"><?php echo esc_html__('View All', 'moviewp'); ?></a>
</div>
<div class="flex_container">
	<div class="outer_container">
		<div class="inner_container">
			<ul class="ul_container">
				<?php query_posts(
					array(
					'meta_key' => 'end_time',
					'meta_compare' =>'>=',
					'meta_value'=>time(),
					'meta_key' => 'popularity',
					'post_type' => 'post',
					'post_status' => 'publish',
					'orderby' => 'meta_value_num',
					'showposts' => 10,
					'order' => 'DESC',
					'no_found_rows' => true
					));
					$counter = 10;
					
					while ( have_posts() ) : the_post(); 
					
					$vote_count = get_post_meta($post->ID, "popularity", $single = true); 
					$backdrop_path = get_post_meta($post -> ID, 'backdrop_path', $single = true);
					$topten_backdrop = 'https://image.tmdb.org/t/p/w1280' . $backdrop_path;
					$postId = get_the_ID();
					$allPosts = get_posts(array(
					'fields' => 'ids',
					'meta_key' => 'end_time',
					'meta_compare' =>'>=',
					'meta_value'=>time(),
					'meta_key' => 'popularity',
					'post_type' => 'post',
					'post_status' => 'publish',
					'showposts' => 10,
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
					'no_found_rows' => true
					));
					$postNumber = array_search($postId, $allPosts) + 1;
					//$arrayreversed = array_reverse($allPosts);
					//$count = count($arrayreversed) -1;
					
				?>
				<div class="item_container<?php if($postNumber == '1') { ?> expanded<?php } ?>" style="z-index: <?php echo $counter; ?>">
					<div class="item_number">
						<?php echo $postNumber; ?>
					</div>
					<div class="image_info_container">
						<div class="info_container">
							<div class="info_container_inner">
								<div class="info_number">
									<img class="number_image" width="512" height="512" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/numbers/<?php echo $postNumber; ?>.webp?format=auto" alt="<?php echo $postNumber; ?>">
								</div>
								<div class="info_bottom_container">
									<div class="info_bottom_text">
										<?php echo esc_html__('Watched ', 'moviewp'); ?><strong><?php echo $vote_count; ?><?php echo esc_html__(' times', 'moviewp'); ?></strong><?php echo esc_html__(' this month.', 'moviewp'); ?>
										<a href="<?php the_permalink() ?>"><?php echo play; ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="image">
							<picture>
								<img class="netflix" style="margin-left: 0px;" src="<?php echo $topten_backdrop; ?>" alt="<?php the_title(); ?>">
							</picture>
							<div class="bottom_title">
								<?php the_title( '<div class="bottom_title_text">', '</div>' ); ?>
							</div>
						</div>
					</div>
				</div>
				<?php $counter--; ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</div>