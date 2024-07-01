<?php
defined("ABSPATH") || die("!");
$eps = get_post_meta(get_the_ID(), 'sora_latest', true);
$epsid = get_post_meta(get_the_ID(), 'sora_latestid', true);
$seasonow = get_post_meta($epsid, 'sora_season', true);
$release = get_post_meta(get_the_ID(),'sora_date',true);
$status = get_post_meta(get_the_ID(),'sora_status',true);
$years = strip_tags(get_the_term_list($post->ID, 'years', '', ', ', ''));
if($years==''){
	$years = '-';
}
$quality = strip_tags(get_the_term_list($post->ID, 'quality', '', ', ', ''));
if(is_home()){
	$serieslink = get_permalink($epsid);
} else {
	$serieslink = get_permalink();
}
?>
		<article class="box" itemscope="itemscope" itemtype="http://schema.org/TVSeries">
			<div class="bx">
				<a class="tip" rel="<?php the_ID(); ?>" href="<?php echo $serieslink; ?>" itemprop="url" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" rel="bookmark">
					<div class="limit">
						<i class="far fa-play-circle"></i>
						<?php echo Moviestream::get_post_thumbnail(get_the_ID(), 'medium', 300, 200, array( 'class' => 'entry-image','itemprop' => 'image', 'alt' => get_the_title(), 'title' => get_the_title() ));  ?>
						<div class="overlay">
							<?php if($status=='Completed'){ echo '<div class="status">'.rwmb_the_value('sora_status','',get_the_ID(),false).'</div>'; } ?>
							<?php if($quality){ ?><span class="quality <?php echo $quality; ?>"><?php echo $quality; ?></span><?php } ?>
						</div>
					</div>
					<div class="addinfox">
						<header class="ttl entry-header">
							<h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
						</header>
						<div class="addinfox-text">
							<span class="addyear"><?php echo $years; ?></span> <?php if($eps){ ?><i class="dot"></i> <?php if($seasonow){ echo GOV_lang::get('series_episode_season_min_label').''.$seasonow.' '; } ?><?php echo GOV_lang::get('home_episode_thumbnail_label').''.$eps; ?><?php } ?> <i class="type"><?php echo GOV_lang::get('home_series_thumbnail_label'); ?></i>
						</div>
					</div>
				</a>
				<div class="note">
					<div class="g"><?php echo get_the_term_list(get_the_ID(), 'genre', '<span itemprop="genre">', '</span>,<span itemprop="genre">', '</span>'); ?></div>
					<div class="c">
						<?php echo get_the_term_list(get_the_ID(), 'country', '<span itemprop="countryOfOrigin" itemscope itemtype="http://schema.org/Country">', '</span>,<span itemprop="countryOfOrigin" itemscope itemtype="http://schema.org/Country"> ', '</span>'); ?>
					</div>
					<?php if($release){ ?>
					<div class="t"><time itemprop="dateCreated" datetime="<?php echo date("Y-m-d", strtotime($release)); ?>T00:00:00+00:00"><?php echo $release; ?></time></div>
					<?php } ?>
					<div class="t">
						<?php echo get_the_term_list(get_the_ID(), 'actor', '<span itemprop="actor" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>,<span itemprop="actor" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>'); ?>
					</div>
				</div>
			</div>
		</article>