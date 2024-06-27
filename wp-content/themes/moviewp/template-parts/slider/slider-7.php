<div class="app-heading">
<div class="text"><?php echo network; ?></div>
<a href="<?php echo esc_url( home_url() ); ?>/networks/" class="all"><?php echo esc_html__('View All', 'moviewp'); ?></a>
</div>
<div class="carousel collections" data-flickity='{ "autoPlay": true, "wrapAround": true, "resize": true, "prevNextButtons": true, "pageDots": false, "lazyLoad": true, "lazyLoad": 6 }'>
	<?php 
		$networks = get_terms('networks');
		foreach($networks as $network) {
			$networkName = str_replace(' ', '+', $network->name);
			$image = get_wp_term_image(intval($network->term_id),'networks');
			$newimage = str_replace('w500', 'w185_filter(negate,111,666)', $image);
			$link = get_term_link(intval($network->term_id),'networks');
			if ($newimage == 'https://image.tmdb.org/t/p/w185_filter(negate,111,666)') {
				$newimage = esc_url( '//placehold.jp/30/111111/FFFFFF/185x104.png?text='.$networkName ); 
				} elseif(empty($newimage)){
				$newimage = esc_url( '//placehold.jp/30/111111/FFFFFF/185x104.png?text='.$networkName ); 
			}
		?>
		<div class="carousel-cell collections">
			<a href="<?php echo $link; ?>" rel="bookmark">
				<img class="carousel-cell-image-collections" src="<?php echo placeholder_slider; ?>" data-flickity-lazyload="<?php echo $newimage; ?>" />
			</a>
		</div>
	<?php } ?>
</div>