<?php
	$addlink = get_option('addlinklatest');
	if($addlink==''){
		$addlink = '1';
	}
	$lm = get_option('totalseries');
	if ($lm){
		$notcat = get_option('notcatseries');
		$current_page = get_query_var("paged")?:1;
		$no_found_rows = get_option("enable_series_pagination")?FALSE:TRUE;
		$series_query = new WP_Query(array(
			"paged" => $no_found_rows?1:$current_page,
			"post_type"  => "series",
			"showposts"     => $lm,
			"ignore_sticky_posts" => 1,
			"category__not_in" => $notcat,
			"no_found_rows"  => $no_found_rows,
			//"update_post_term_cache" => false,
			//"update_post_meta_cache" => false,
			"orderby" => "modified"
		)); 
	}
	if($lm && $series_query->have_posts() ){ ?>
<div class="latest">
	<div class="more">
		<h2><?php echo GOV_lang::get('home_latest_episodes_label'); ?></h2>
		<?php if($addlink=='1'){ ?>
		<ul class="mostax">
			<li class="first"><?php echo GOV_lang::get('home_latest_episodes_all_tab_label'); ?></li>
			<?php GOV_cache::fragment_cache("home_top_genres", 3600 * 24 * 1, function(){
				wp_list_categories('number=4&show_count=0&orderby=count&order=DESC&title_li=&hierarchical=0&taxonomy=genre');
			 }); ?>
		</ul>
		<?php } ?>
		<a href="<?php bloginfo('url'); ?>/<?php echo tsrs_get_series_slug() ?: "series"; ?>"><?php echo GOV_lang::get('view_all'); ?> <i class="fas fa-angle-right"></i></a>
		<div class="clear"></div>
	</div>
	
	<div class="los">
		<?php while($series_query->have_posts()) : $series_query->the_post();
		get_template_part('template-parts/general/series');
		endwhile; ?>
	</div>
	
	<?php if (get_option("enable_series_pagination")) { ?>
	<div class="hpage pagination"><?php themesia_mvs_pagination($series_query);?></div>
	<?php } ?>
	
	<?php wp_reset_query(); ?>
</div>
<?php } ?>