<?php
defined("ABSPATH") || die("!");
$quality = strip_tags(get_the_term_list($post->ID, 'quality', '', ', ', ''));
$years = strip_tags(get_the_term_list($post->ID, 'years', '', ', ', ''));
if($years==''){
	$years = '-';
}
$duras = get_post_meta($post->ID,'sora_duration',true);
if($duras==''){
	$duras = '-';
}
$release = get_post_meta(get_the_ID(),'sora_date',true);
?>
		<article class="box" itemscope="itemscope" itemtype="http://schema.org/Movie">
			<div class="bx">
				<a class="tip" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" rel="bookmark">
					<div class="limit">
						<i class="far fa-play-circle"></i>
						<?php echo Moviestream::get_post_thumbnail(get_the_ID(), 'medium', 300, 200, array( 'class' => 'entry-image','itemprop' => 'image', 'alt' => get_the_title(), 'title' => get_the_title() )); ?>
						<div class="overlay">
							<?php if($quality){ ?><span class="quality <?php echo $quality; ?>"><?php echo $quality; ?></span><?php } ?>
						</div>
					</div>
					<div class="addinfox">
						<header class="ttl entry-header">
							<h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
						</header>
						<div class="addinfox-text">
							<span class="addyear"><?php echo $years; ?></span> <i class="dot"></i> <?php echo $duras; ?> <i class="type"><?php echo GOV_lang::get('home_movie_thumbnail_label'); ?></i>
						</div>
					</div>
				</a>
				<div class="note">
					<div class="g"><?php echo get_the_term_list(get_the_ID(), 'genre', '<span itemprop="genre">', '</span>,<span itemprop="genre">', '</span>'); ?></div>
					<div class="c">
						<?php echo get_the_term_list(get_the_ID(), 'country', '<span itemprop="contentLocation" itemscope="itemscope" itemtype="http://schema.org/Place"><span itemprop="name">', '</span></span>, <span itemprop="contentLocation" itemscope="itemscope" itemtype="http://schema.org/Place"><span itemprop="name">', '</span></span>'); ?>
					</div>
					<?php if($release){ ?>
					<div class="t"><time itemprop="dateCreated" datetime="<?php echo date("Y-m-d", strtotime($release)); ?>T00:00:00+00:00"><?php echo $release; ?></time></div>
					<?php } ?>
					<div class="t">
						<?php echo get_the_term_list(get_the_ID(), 'director', '<span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>,<span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>'); ?>
					</div>
				</div>
			</div>
		</article>