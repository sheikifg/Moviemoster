<div class="app-heading">
<div class="text"><?php echo esc_html__('Movies Collections', 'moviewp'); ?></div>
<a href="<?php echo esc_url( home_url() ); ?>/collection/" class="all"><?php echo esc_html__('View All', 'moviewp'); ?></a>
</div>
<div class="carousel tv" data-flickity='{ "autoPlay": false, "wrapAround": true, "resize": true, "prevNextButtons": true, "pageDots": false, "lazyLoad": true, "lazyLoad": 7, "cellAlign": "left" }'>
	<?php
		$apikey = apikey;
		$language = apilanguage;
		$collections = get_terms('collection');
		foreach($collections as $collection) {
			$collectionName = str_replace(' ', '+', $collection->name);
			$query_api = urlencode($collectionName);
			$collection_api	= wp_remote_get("https://api.themoviedb.org/3/search/collection?query=$query_api&api_key=$apikey&language=$language");
			$json_api = wp_remote_retrieve_body($collection_api);
			$data_api = json_decode($json_api, TRUE);
			$results_api = $data_api['results'];
			foreach(array_slice($results_api, 0, 1) as $list) {
				$name = $list['name'];
				$image = "//image.tmdb.org/t/p/original" . $list["poster_path"];
				$link = get_term_link(intval($collection->term_id),'collection');
			?>
			<div id="post-<?php echo $collection->term_id; ?>" <?php post_class( 'carousel-cell' ); ?>>
				<a href="<?php echo $link; ?>" rel="bookmark">
					<span class="item-tv"><?php echo $collection->count; ?></span>
					<img class="carousel-cell-image-tv" src="<?php echo placeholder; ?>" data-flickity-lazyload="<?php echo $image ?>" />
				</a>
			</div><!-- #post-<?php echo $collection->term_id; ?> -->	
		<?php } ?>
	<?php } ?>
</div>