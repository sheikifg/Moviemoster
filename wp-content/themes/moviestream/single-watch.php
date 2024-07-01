<?php defined("ABSPATH") || die("!"); ?>
<?php get_header(); 
$sdmode = get_option('sdseries');
$rltd = '6';
if($sdmode=='1'){
	$rltd = '5';
}

?>
<div class="sdmode<?php if($sdmode=='1'){ echo ' sdtrue'; } else { echo ' sdfalse'; } ?> sdsingle epwatch">
	<?php mvs_breadcrumb(); ?>
	
	<?php 
		$idseries = get_post_meta( get_the_ID(), 'sora_series', true );
		$mvplayer = get_option('mvplayer');
		if($mvplayer==''){
			$mvplayer = '1';
		}
		if($mvplayer=='1'){
		$player = playable_mirror(get_the_ID()); if($player){ ?>
			<?php kln('aboveplayer'); ?>
			<div class="playerx">
				<div class="bigplayer">
					<div class="centerplayer">
						<?php kln_overlay(); sora_video(); ?>
					</div>
				</div>
			</div>
	<?php } ?>
	
	<?php if($player){ ?>
	<div class="plyrnav">
		<div class="bnav prev">
			<a href="#/" class='ts-watch-prev-nav'><i class="fas fa-angle-left"></i> <span><?php echo GOV_lang::get('plyr_prev'); ?></span></a>
		</div>
		<div class="bnav cent">
			<a href="<?php echo get_permalink($idseries); ?>"><i class="fas fa-stream"></i> <span><?php echo GOV_lang::get('plyr_info'); ?></span></a>
		</div>
		<div class="bnav next">
			<a href="#/" class='ts-watch-next-nav'><span><?php echo GOV_lang::get('plyr_next'); ?></span> <i class="fas fa-angle-right"></i></a>
		</div>
	</div>
	<?php } ?>
	
	<?php if($player){ ?>
		<div class="server">
			<div class="lserv">
				<?php sora_mirror(); ?>
			</div>
		</div>
		<?php $annmirror = get_option('annabovemirror'); if($annmirror){ ?>
			<div class="annsingle">
				<?php echo $annmirror; ?>
			</div>
		<?php } ?>
	<?php } } ?>
	
	<div class="psbody">
		<div id="content">
			<div class="singlecontent">
				
				<article id="post-<?php the_ID(); ?>" class="hentry" itemscope="itemscope" itemtype="http://schema.org/TVEpisode">
				<?php wpb_get_post_views(get_the_ID()); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="infodb">
					<div class="infl">
						<div class="bixbox">
							
							<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
							
							<div class="mvinfo">
								<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/person"><i class="fn" itemprop="name"><?php the_author(); ?></i></span> · 
								<?php echo GOV_lang::get('series_info_updated_on_label'); ?> <time class="entry-date updated" itemprop="dateModified" datetime="<?php the_modified_date('c'); ?>"><?php the_modified_date(GOV_lang::get('series_info_date_format')); ?></time> · 
								<?php echo GOV_lang::get('series_info_posted_on_label'); ?> <time class="entry-date published" itemprop="datePublished" datetime="<?php the_time('c'); ?>"><?php the_time(GOV_lang::get('series_info_date_format')); ?></time> · <?php echo GOV_lang::get('series_label'); ?> <span itemprop="partOfSeries"><a href="<?php echo get_permalink($idseries); ?>"><?php echo get_the_title($idseries); ?></a></span> <?php $meta = get_post_meta( get_the_ID(), 'sora_season', true ); if($meta){ ?> · <span class="seasoninx"><?php echo GOV_lang::get('series_episode_season_group_label',["season" => $meta]); ?></span><?php } ?> <meta itemprop="episodeNumber" content="<?php echo get_post_meta(get_the_ID(),'sora_eps',true); ?>">
							</div>
							
							<?php if(!$player){ ?>
							<div class="navepsd">
								<div class="bnav prev">
									<a href="#/" class='ts-watch-prev-nav'><i class="fas fa-angle-left"></i> <span><?php echo GOV_lang::get('plyr_prev'); ?></span></a>
								</div>
								<div class="bnav cent">
									<a href="<?php echo get_permalink($idseries); ?>"><i class="fas fa-stream"></i> <span><?php echo GOV_lang::get('plyr_info'); ?></span></a>
								</div>
								<div class="bnav next">
									<a href="#/" class='ts-watch-next-nav'><span><?php echo GOV_lang::get('plyr_next'); ?></span> <i class="fas fa-angle-right"></i></a>
								</div>
							</div>
							<?php } ?>
							
							<div class="left">
								<div class="limage">
									<?php echo Moviestream::get_post_thumbnail($idseries, 'medium', 250, 166, array( 'class' => 'entry-image', 'itemprop' => 'image', 'alt' => get_the_title(), 'title' =>  get_the_title() )); ?>
								</div>
								<?php
								$score = get_post_meta($idseries,'sora_imdb',true); 
								if(!$score|| ! is_numeric($score)){ $score = '7.0';}
								$scorepros = $score * 10;
								$votes = get_post_meta($idseries,'sora_votes',true);
								$votes = str_replace(',','',$votes);
								if($votes==''){ $votes = get_the_ID()+5; }
								if($score){ ?>
								<div class="rating-prc" itemscope="itemscope" itemprop="aggregateRating" itemtype="//schema.org/AggregateRating">
									<meta itemprop="worstRating" content="1">
									<meta itemprop="bestRating" content="10">
									<div class="rtp">
										<div class="rtb"><span style="width:<?php echo $scorepros; ?>%"></span></div>
										<div class="rtd">
											<span itemprop="ratingValue"><?php echo $score; ?></span>/<span itemprop="ratingCount"><?php echo $votes; ?></span> <?php echo GOV_lang::get('series_info_votes_label'); ?>
										</div>
									</div>
								</div>
								<?php } ?>
								<div class="bmarea">
									<div class="bookmark" data-id="<?php echo $idseries; ?>"><i class="far fa-bookmark"></i> <?php echo GOV_lang::get('bookmark_label'); ?></div>
									<div class="bmc">
										<?php if ($followcount = get_post_meta($idseries, 'ero_bookmark_count', TRUE)) { ?>
										<?php echo GOV_lang::get('series_bookmarked_by', ["count" =>  $followcount]); ?>
										<?php } ?>
										</div>
								</div>
							</div>
							
							<div class="right">
								<div class="entry-content" itemprop="description">
									<?php if(get_option('keywordseries')){ global_keyword(get_the_ID()); } ?>
									<p>
										<?php echo get_post_field('post_content', $idseries); ?>
									</p>
									<ul class="data">
										<?php echo get_the_term_list($idseries, 'genre', '<li><b>'.GOV_lang::get('series_info_genres_label').':</b> <span class="colspan"><span itemprop="genre">', '</span>, <span itemprop="genre">', '</span></span></li>'); ?>
										<?php echo get_the_term_list($idseries, 'actor', '<li><b>'.GOV_lang::get('series_info_actor_label').':</b> <span class="colspan"><span itemprop="actor" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>, <span itemprop="actor" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span></span></li>'); ?>
									<?php $meta = get_post_meta( $idseries, 'sora_duration', true ); if($meta){ ?><li><b><?php echo GOV_lang::get('series_info_duration_label'); ?>:</b> <span class="colspan"><span property="duration"><?php echo $meta; ?></span></span></li><?php } ?>
									</ul>
								</div>
							</div>
						</div>
					<div class="clear"></div>
						
					<?php get_template_part('template-parts/general/social-share'); ?>

					<?php sora_download(); ?>
					
					<?php 
					$chlist = new GOV_series_episode_list([
						"count" => 5000,
						"series_id" => $idseries,
						"date_format" => "F j, Y",
					]);
					?>
					<div class="lsepw"><?php $chlist->show(); ?></div>						
					</div>
				</div>
				<?php endwhile; endif; ?>
				</article>

				<?php related_movies(GOV_lang::get('series_info_related_label'),$idseries,$rltd); ?>
				<?php if(comments_open()){ ?>
				<div id="comments" class="bixbox comments-area">
					<div class="bxtitle"><h3><?php echo GOV_lang::get('comment');?></h3></div>
					<div class="cmt commentx">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php echo get_post_meta(get_the_ID(), "watch", true); ?>
							<?php comments_template(); ?>
						<?php endwhile; endif; ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

<script>
BOOKMARK.listener();BOOKMARK.check();

var themesia_js_mode = <?php echo (int)get_option("mirrorjsmode"); ?>;
jQuery("a[data-em]").on("click", function(e){
	e.preventDefault();
	if (jQuery(this).hasClass('active')) return false;
	if (themesia_js_mode == 0) {
		var href = this.getAttribute('data-href');
		window.location.assign(href);
		return false;
	}
	var theEm = this.getAttribute("data-em");
	theEm = atob(theEm);
	if ( ! theEm) return true;
	document.getElementById('pembed').innerHTML = theEm;
	jQuery("[data-em].active").removeClass('active');
	jQuery(this).addClass('active');
	return false;
});

jQuery( document ).ready(function() {
	jQuery.ajax({
		url : "<?php echo get_site_url();?>/wp-admin/admin-ajax.php",
		type : 'post',
		data : {
			action : 'dynamic_view_ajax',
			post_id : <?php echo $idseries; ?>
		},
		success : function( response ) {
			console.log(response);
		}
	});
});
</script>
<script>
ts_epnav.init({
	"order": "<?php echo $chlist->get_list_order();?>",
	"episode_id": <?php echo get_the_ID(); ?>,
});
</script>
	<?php if($sdmode=='1'){ get_sidebar(); } ?>
</div>
<?php get_footer(); ?>