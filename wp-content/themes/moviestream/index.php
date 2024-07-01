<?php 
defined("ABSPATH") || die("!");
get_header();
$sdmode = get_option('sdhome');
?>

<div class="sdmode<?php if($sdmode=='1'){ echo ' sdtrue'; }?>">
	<div class="psbody">
	<?php ts_mv_slider(); ?>

	<div id="content">
		<?php if($sdmode!=='1'){ kln('klntop'); } ?>
		<?php 
		if(get_option('homedescsl')!=='0'){ if (get_query_var("paged") <= 1){ ?>
		<div class="homedesc">
			<i class="fas fa-rss"></i>
			<h1><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></h1>
			<p><?php echo GOV_lang::get('home_subheading'); ?></p>
		</div>
		<?php } } ?>

		<?php kln('filmbaru'); ?>
		<?php get_template_part('template-parts/home/home','movies'); ?>
		<?php echo do_shortcode(get_option('scmovie')); ?>
		<?php kln('epbaru'); ?>
		<?php get_template_part('template-parts/home/home','series'); ?>
		<?php echo do_shortcode(get_option('scseries')); ?>
		</div>
	</div>
	<?php if($sdmode=='1'){ get_sidebar(); } ?>
</div>
<?php get_footer(); ?>