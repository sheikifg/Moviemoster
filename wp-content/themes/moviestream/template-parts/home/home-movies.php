<?php
	$lm = get_option('totalmovie');
	$notcat = get_option('notcatmovie');
	$addlink = get_option('addlinklatest');
	if($addlink==''){
		$addlink = '1';
	}
	$current_page = get_query_var("paged")?:1;
	$no_found_rows = get_option("enable_movie_pagination")?FALSE:TRUE;
	if ($lm){
		$movie_query = new WP_Query(array(
			"paged" => $no_found_rows?1:$current_page,
			"post_type"  => "post",
			"showposts"     => $lm,
			"ignore_sticky_posts" => 1,
			"category__not_in" => $notcat,
			"no_found_rows"  => $no_found_rows,
			//"update_post_term_cache" => false,
			//"update_post_meta_cache" => false,
			//"cache_results" => false
		)); 
	}
	if($lm && $movie_query->have_posts()){ 
?>
<div class="latest">
	<div class="more">
		<h2><?php echo GOV_lang::get('home_latest_movies_label'); ?></h2>
		<?php
		$msx = get_option('advsearch');
		if($addlink=='1'){
		if($msx && is_numeric($msx)){ 
			$msx = new GOV_post((int)$msx);
		?>
		<ul class="mostax">
			<li class="first">All</li>
			<li><a href="<?php bloginfo('url'); ?>/random"><?php echo GOV_lang::get('home_latest_movies_recommended_tab_label'); ?></a></li>
			<li><a href="<?php echo $msx->get_permalink(); ?>?order=popular&type[]=post&type[]=series"><?php echo GOV_lang::get('home_latest_movies_most_popular_tab_label'); ?></a></li>
			<li><a href="<?php echo $msx->get_permalink(); ?>?order=latest&type[]=post&type[]=series"><?php echo GOV_lang::get('home_latest_movies_latest_modified_tab_label'); ?></a></li>
		</ul>
		<?php }}
		$vm = get_option('movieslug');
		
		if($vm && is_numeric($vm)){ 
			$vm = new GOV_post((int)$vm);
		?>
			<a href="<?php echo $vm->get_permalink(); ?>"><?php echo GOV_lang::get('view_all'); ?> <i class="fas fa-angle-right"></i></a>
		<?php } ?>
		<div class="clear"></div>
	</div>
	
	<div class="los">
		<?php 
			while($movie_query->have_posts()) : $movie_query->the_post();
				get_template_part('template-parts/general/movie');
			endwhile; ?>
		
	</div>
	<?php if (get_option("enable_movie_pagination")){ ?>
	<div class="hpage pagination"><?php themesia_mvs_pagination($movie_query);?></div>
	<?php } ?>
	<?php wp_reset_query(); ?>
</div>
<?php } ?>