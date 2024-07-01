<?php get_header(); ?>
<div id="content">
<div class="latest">
	<div class="more">
		<h1><?php echo GOV_lang::get('latest_series_page_title'); ?></h1>
		<?php filter_search(); ?>
		<div class="clear"></div>
	</div>
	<div class="los">
		<?php 
			if (have_posts()) : while ( have_posts() ) : the_post();
				get_template_part('template-parts/general/series');
			endwhile; endif; ?>
	</div>
	<div class="pagination"><?php echo paginate_links(); ?></div>
	<?php wp_reset_query(); ?>
	<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>