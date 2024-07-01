<?php
$eps = get_post_meta(get_the_ID(), 'sora_eps', true);if($eps==''){$eps = '-';}
$idseri = get_post_meta(get_the_ID(), 'sora_series', true);
$seasonow = get_post_meta(get_the_ID(), 'sora_season', true);
$series = new GOV_post($idseri);
$status = $series->get_post_meta('sora_status', true);
$quality = strip_tags(get_the_term_list($idseri, 'quality', '', ', ', ''));
$years = strip_tags(get_the_term_list($idseri, 'years', '', ', ', ''));
if($years==''){
	$years = '-';
}
?>
<div class="box">
	<div class="bx">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			<div class="limit">
				<i class="far fa-play-circle"></i>
				<?php if ( has_post_thumbnail() ) { 
					echo Moviestream::get_post_thumbnail(get_the_ID(), "full", NULL, NULL, ["title" => get_the_title(), "alt" => get_the_title()]); 
				} else { 
					echo Moviestream::get_post_thumbnail($idseri, "full", NULL, NULL, ["title" => get_the_title(), "alt" => get_the_title()]);
				} ?>
				<div class="overlay">
					<?php if($status=='Completed'){ echo '<div class="status">'.rwmb_the_value('sora_status','',$idseri,false).'</div>'; } ?>
					<?php if($quality){ ?><span class="quality <?php echo $quality; ?>"><?php echo $quality; ?></span><?php } ?>
				</div>
			</div>
			<div class="addinfox">
				<header class="ttl entry-header">
					<h2 class="entry-title" itemprop="headline"><?php echo get_the_title($idseri); ?></h2>
				</header>
				<div class="addinfox-text">
					<span class="addyear"><?php echo $years; ?></span> <?php if($eps){ ?><i class="dot"></i> <?php if($seasonow){ echo GOV_lang::get('series_episode_season_min_label').''.$seasonow.' '; } ?><?php echo GOV_lang::get('home_episode_thumbnail_label').''.$eps; ?><?php } ?> <i class="type"><?php echo GOV_lang::get('home_series_thumbnail_label'); ?></i>
				</div>
			</div>
		</a>
	</div>
</div>