<?php 
defined('ABSPATH') || die();
$target = $_POST["id"]??FALSE; 
if(! is_numeric($target)) die();
GOV_cache::fragment_cache('tooltip_'.$target,60 * 60 * 24 * 7,function() use($target){
	$imdb = get_post_meta($target,'sora_imdb',true);
	if ( ! $imdb || ! is_numeric($imdb)) $imdb = "7.00";
	$year = strip_tags(get_the_term_list($target, 'years', '', ', ', ''));
	$duration = get_post_meta($target,'sora_duration',true);
	$status = rwmb_the_value('sora_status','',$target,false);
	$quality = strip_tags(get_the_term_list($target, 'quality', '', ', ', ''));
	$country = get_the_term_list($target, 'country', '', ', ', '');
	$genre = get_the_term_list($target, 'genre', '', ', ', '');
	?>
	<div class="tooltip">
		<div class="totitle">
			<h4><?php echo get_the_title($target); ?></h4>
			<?php if($quality){ ?><span><?php echo $quality; ?></span><?php } ?>
		</div>
		<div class="totop">
			<?php if($imdb){ ?><div class="infox imdb"><?php echo GOV_lang::get('tooltip_imdb'); ?>: <?php echo $imdb; ?></div><?php } ?>
			<?php if($year){ ?><div class="infox"><?php echo $year; ?></div><?php } ?>
			<?php if($duration){ ?><div class="infox"><?php echo $duration; ?></div><?php } ?>
			<?php if($status){ ?><div class="infox"><?php echo $status; ?></div><?php } ?>
		</div>
		<div class="todesc">
			<?php echo get_the_excerpt($target); ?>
		</div>
		<div class="toblock">
			<?php echo GOV_lang::get('series_info_country_label'); ?>: <?php echo $country; ?>
		</div>
		<div class="toblock">
			<?php echo GOV_lang::get('series_info_genres_label'); ?>: <?php echo $genre; ?>
		</div>
		<div class="towatch">
			<a href="<?php echo get_permalink($target); ?>"><?php echo GOV_lang::get("tooltip_watch_now_label"); ?></a>
		</div>
	</div>
<?php
});