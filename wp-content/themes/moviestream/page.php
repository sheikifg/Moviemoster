<?php get_header(); ?>
<div id="content">
<div class="singlecontent">
<h1><?php the_title(); ?></h1>
<div class="clear"></div>
					<?php while (have_posts()) : the_post(); ?>
						<div class="konten pagecontent">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>