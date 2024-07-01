<?php 
defined("ABSPATH") || die("!");
get_header(); 
$sdmode = get_option('sdmovie');
$rltd = '6';
if($sdmode=='1'){
	$rltd = '5';
}
?>
<div class="sdmode<?php if($sdmode=='1'){ echo ' sdtrue'; } else { echo ' sdfalse'; } ?> sdsingle">
	<?php mvs_breadcrumb(); ?>
	
	<?php 
		$mvplayer = get_option('mvplayer');
		if($mvplayer==''){
			$mvplayer = '1';
		}
		if($mvplayer=='1'){
		$player = playable_mirror();
		$trailer = get_trailer();
		if($player){ ?>
			<?php kln('aboveplayer'); ?>
			<div class="playerx">
				<div class="bigplayer">
					<div class="centerplayer">
						<?php kln_overlay(); $player?sora_video():sora_trailer_video(); ?>
					</div>
				</div>
			</div>
	<?php } ?>
	<?php if($player){ ?>
	<div class="server">
			<div class="lserv">
				<?php $player?sora_mirror():mirror_trailer_only(); ?>
			</div>
		</div>
	<?php $annmirror = get_option('annabovemirror'); if($annmirror){ ?>
		<div class="annsingle">
			<?php echo $annmirror; ?>
		</div>
	<?php } ?>
	<?php } } ?>
	
	<?php kln('ss1'); ?>
	
	<div class="psbody">
	<div id="content">
		<div class="singlecontent">

			<article id="post-<?php the_ID(); ?>" class="hentry" itemscope="itemscope" itemtype="http://schema.org/Movie">
			<?php wpb_get_post_views(get_the_ID()); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="infodb">
				<div class="infl">
					<div class="bixbox">
						<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
							
						<div class="mvinfo">
							<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/person"><i class="fn" itemprop="name"><?php the_author(); ?></i></span> · 
							<?php echo GOV_lang::get('series_info_updated_on_label'); ?> <time class="entry-date updated" itemprop="dateModified" datetime="<?php the_modified_date('c'); ?>"><?php the_modified_date(GOV_lang::get('series_info_date_format')); ?></time> · 
							<?php echo GOV_lang::get('series_info_posted_on_label'); ?> <time class="entry-date published" itemprop="datePublished" datetime="<?php the_time('c'); ?>"><?php the_time(GOV_lang::get('series_info_date_format')); ?></time>
						</div>
					<div class="left">
							<div class="limage">
								<?php echo Moviestream::get_post_thumbnail(get_the_ID(), "full", NULL, NULL, ['class' => 'entry-image', 'itemprop' => 'image', 'alt' => get_the_title(), 'title' => get_the_title()]); ?>
							</div>

							<?php
							$score = get_post_meta(get_the_ID(),'sora_imdb',true); 
							if(!$score || ! is_numeric($score)){ $score = '7.0';}
							$scorepros = $score * 10;
							$votes = get_post_meta(get_the_ID(),'sora_votes',true);
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
						
							<?php if(!$player){ $trailer = get_post_meta(get_the_ID(),'sora_trailer',true); if($trailer){ ?>
								<a href="#trailer" class="trailerbutton">
								<i class="fab fa-youtube"></i> <?php echo GOV_lang::get('trailer_button'); ?>
								</a>
							<?php } } ?>
							
							<?php if(get_option('bookmark')){ ?>
							<div class="bmarea">
								<div class="bookmark" data-id="<?php echo get_the_ID(); ?>"><i class="far fa-bookmark"></i> Bookmark</div>
								<div class="bmc">
									<?php if ($followcount = get_post_meta(get_the_ID(), 'ero_bookmark_count', TRUE)) { ?>
										<?php echo GOV_lang::get('series_bookmarked_by', ["count" =>  $followcount]); ?>
									<?php } ?>
								</div>
							</div>
							<?php } ?>
						</div>
					
						<div class="right">							
							<div class="entry-content" itemprop="description">
								<?php the_content(); ?>
								<ul class="data">
									<?php echo get_the_term_list(get_the_ID(), 'genre', '<li><b>'.GOV_lang::get('series_info_genres_label').':</b> <span class="colspan"><span itemprop="genre">', '</span>, <span itemprop="genre">', '</span></span></li>'); ?>
									<?php $meta = get_post_meta( get_the_ID(), 'sora_date', true ); if($meta){ ?><li><b><?php echo GOV_lang::get('series_info_released_label'); ?>:</b> <span class="colspan"><span><time itemprop="dateCreated" datetime="<?php echo date("Y-m-d", strtotime($meta)); ?>T00:00:00+00:00"><?php echo $meta; ?></time></span></span></li><?php } ?>
									<?php echo get_the_term_list(get_the_ID(), 'actor', '<li><b>'.GOV_lang::get('series_info_actor_label').':</b> <span class="colspan"><span itemprop="actor" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>, <span itemprop="actor" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span></span></li>'); ?>
									<?php $meta = get_post_meta( get_the_ID(), 'sora_duration', true ); if($meta){ ?><li><b><?php echo GOV_lang::get('series_info_duration_label'); ?>:</b> <span class="colspan"><span property="duration"><?php echo $meta; ?></span></span></li><?php } ?>
									<?php echo get_the_term_list(get_the_ID(), 'director', '<li><b>'.GOV_lang::get('series_info_director_label').':</b> <span class="colspan"><span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>, <span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span></span></li>'); ?>
									<?php echo get_the_term_list(get_the_ID(), 'country', '<li><b>'.GOV_lang::get('series_info_country_label').':</b> <span class="colspan"><span itemprop="contentLocation" itemscope="itemscope" itemtype="http://schema.org/Place"><span itemprop="name">', '</span></span>, <span itemprop="contentLocation" itemscope="itemscope" itemtype="http://schema.org/Place"><span itemprop="name">', '</span></span></span></li>'); ?>
									<?php echo get_the_term_list(get_the_ID(), 'movie-series', '<li><b>'.GOV_lang::get('advanced_search_series_label').':</b> <span class="colspan">', ', ', '</span></li>'); ?>
									<?php $quality = strip_tags(get_the_term_list($post->ID, 'quality', '', ', ', '')); if($quality){ echo '<li><b>'.GOV_lang::get('series_info_quality_label').':</b> <span class="colspan"><i>'.$quality.'</i></span></li>'; } ?>
								</ul>
								<?php global_keyword(get_the_ID()); ?>
							</div>
						</div>
				</div>
				<div class="clear"></div>
					
				<?php get_template_part('template-parts/general/social-share'); ?>
					
				<?php kln('ss2'); ?>
					
				<?php if(!$player){ $trailer = get_post_meta(get_the_ID(),'sora_trailer',true); if($trailer){ ?>
					<div id="trailer" class="trailershow">
						<div class="limit">
							<?php echo do_shortcode($trailer); ?>
						</div>
					</div>
				<?php } } ?>

				<?php sora_gallery(get_the_ID()); ?>

				<?php sora_download(); ?>

				<?php echo get_the_term_list(get_the_ID(), 'post_tag', '<div id="tags"><label>'.GOV_lang::get('keywords_text').':</label><span itemprop="keywords"><h3>', '</h3>, <h3>', '</h3></span></div>'); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
		</article>
			
		<?php related_movies(GOV_lang::get('series_info_related_label'), get_the_ID(),$rltd); ?>

		<?php kln('ss3'); ?>
		
		<?php if(comments_open()){ ?>
		<div id="comments" class="bixbox comments-area">
			<div class="bxtitle"><h3><?php echo GOV_lang::get('comment');?></h3></div>
			<div class="cmt commentx">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php echo get_post_meta(get_the_ID(), "embed", true); ?>
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
			post_id : <?php echo get_the_ID(); ?>
		},
		success : function( response ) {
			console.log(response);
		}
	});
});
</script>
	<?php if($sdmode=='1'){ get_sidebar(); } ?>
</div>
<?php get_footer(); ?>