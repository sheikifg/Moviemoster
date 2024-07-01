<?php get_header(); ?>
<div id="content">
<div class="latest">
	<div class="more">
		<h1><?php single_tag_title(); ?></h1>
		<?php filter_search(); ?>
		<div class="clear"></div>
	</div>
	<div class="los">
		<?php 
			if (have_posts()) : while ( have_posts() ) : the_post();
			$type = get_post_type( get_the_ID() ); if($type == 'series'){ get_template_part('template-parts/general/series'); } else { get_template_part('template-parts/general/movie'); }
			endwhile; endif; ?>
	</div>
	<div class="pagination"><?php echo paginate_links(); ?></div>
	<?php wp_reset_query(); ?>
	<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>