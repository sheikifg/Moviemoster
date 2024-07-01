<?php
function themesia_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri(),false,THEMESIA_VERSION );
	if (get_option('tsrtl') == '1') {
		wp_enqueue_style('rtl', get_template_directory_uri() . '/assets/css/rtl.css', false, THEMESIA_VERSION, 'all');
	}
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css',false,'5.13.0','all');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css',false,'1.0.0','all');
	if(get_option('tooltip')=='1'){wp_enqueue_style( 'qtip', get_template_directory_uri() . '/assets/css/jquery.qtip.min.css',false,'1.0.0','all');}
	if(is_singular(array('post','watch','series'))){ 
		if(get_option('slidergallery')=='1'){wp_enqueue_style( 'blueimp', get_template_directory_uri() . '/assets/css/blueimp-gallery.min.css',false,'2.38.0','all');}
	}
	if(is_home()){
		wp_enqueue_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css',false,'4.5.1','all');
	}
	wp_deregister_script('jquery');
   	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, '3.5.1');
   	wp_enqueue_script('jquery');
	
	if(get_option('tooltip')=='1'){wp_enqueue_script( 'qtip', get_template_directory_uri() . '/assets/js/jquery.qtip.min.js', array( 'jquery' ), '2.2.1', true );}
	if(is_singular(array('post','watch','series'))){
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), '2.3.4', false );
		if(get_option('slidergallery')=='1'){wp_enqueue_script( 'blueimp', get_template_directory_uri() . '/assets/js/blueimp-gallery.min.js', array( 'jquery' ), '2.38.0', false );}
	}
	if(is_singular(array('watch'))){
		wp_enqueue_script( 'episode-nav', get_template_directory_uri() . '/assets/js/episode-navigation.js', array( 'jquery' ), THEMESIA_VERSION, false );
	}
	wp_enqueue_script( 'popular_widget', get_template_directory_uri() . '/assets/js/popular_widget.js', array( 'jquery' ), THEMESIA_VERSION, false );	
	if(get_option('tooltip')=='1'){wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkg.min.js', array( 'jquery' ), '2.2.1', true );}	
}
add_action( 'wp_enqueue_scripts', 'themesia_assets' );

function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
	wp_dequeue_style( 'global-styles' );
} 
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

add_action ('wp_head','themesiaHeader');
function themesiaHeader(){ ?>
<?php echo get_option('tsscriptheader'); ?>
<script>
	$(document).ready(function(){
		$(".show-menu").click(function(){
			$(".menu").toggleClass("menushow");
		});
		$(".ms").click(function(){
			$(".searchx").toggleClass("mse");
		});
		$(".filterm").click(function(){
			$(".bigfilter").toggleClass("bigshow");
		});
		$(".trailerbutton").click(function(){
			$(".trailershow").addClass("shw");
		});
	});
</script>
<script type='text/javascript'>
	//<![CDATA[
	function hideSh(n){
		jQuery("#shadow").toggle();
			if (jQuery("#shadow").is(":hidden"))
				jQuery(n).html("<span class='dashicons dashicons-lightbulb'></span> <?php echo GOV_lang::get('episode_page_turn_off_light'); ?>").removeClass("turnedOff");
			else
				jQuery(n).html("<span class='dashicons dashicons-lightbulb'></span> <?php echo GOV_lang::get('episode_page_turn_on_light'); ?>").addClass("turnedOff");

	}
	jQuery(document).ready(function(){
	   jQuery("#shadow").css("height", jQuery(document).height()).hide();
	   jQuery(".lightSwitcher").click(function(){
		  hideSh(this);
	  });
		jQuery('#shadow').click(function(){
			hideSh(".lightSwitcher");
		});
	});
	//]]>
</script>
<?php if(get_option('tooltip')==='1'){ ?>
<script type="text/javascript">
	$(document).ready(function()
	{
	  $('.tip').each(function(){

		var $this = $(this);
		var id = $this.attr('rel');

		$this.qtip({
		  content:{
			//text: 'loading...',
			ajax:{
			  url: '<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/admin-ajax.php',
			  type: 'POST', 
			  loading: false,
			  data: 'id=' + id + '&action=tooltip_action'
			}
		  },
		  show: 'mouseover',
		  hide: {
			delay: 200,
			fixed: true
		  },
		  position: {
		target: 'mouse',
		adjust: { mouse: false },
			viewport: $(window)
		  }
		});
	  });
	});
</script>
<?php } ?>
<?php $tc = get_option('themecolor'); if($tc) { ?>
		<style>
		.slider .paging .centerpaging .swiper-pagination span.swiper-pagination-bullet-active, .tooltip .totitle span, .tooltip .towatch a, .infodb .infl .server .lserv ul.mirror li a.active, .infodb .infl .server .lserv ul.mirror li a:hover, .infodb .entry-content .data li i, .infodb .infr .bmarea .bookmark, #respond input#submit, .live-search_result_container .post-meta .quality, .live-search_more a, .latest .los .box .bx .limit .overlay .eps, .nav_apb a:hover, .pagination span.page-numbers.current, .bigfilter .medium .col-4 .filter-sort .ul-sort li input:checked+label, .bigfilter .medium .col-4 .filter-sort .ul-sort li label:hover, .bigfilter .medium .col-4 .filter-sort .ul-sort li label:after, .bigfilter .btn .searchz, .bigplay .overlay .dashicons, .filterm, .bmarea .bookmark, .server .lserv ul li a.active, .comment-list .comment-body .reply a:hover, .epsdlist ul::-webkit-scrollbar-thumb, .mainslider .limit .sliderinfo .sliderinfolimit .meta .quality, #sidebar .section .ts-wpop-series-gen .ts-wpop-nav-tabs li.active a,.mvinfo .seasoninx {background:<?php echo $tc; ?>}
	a, .latest>h2, .latest>h1, .latest .more h2, .latest .more h1, .latest .more h3, .breadcrumb, .cmt .cmnt, .live-search_result_container .post-meta span.text b, .live-search_result_container li:hover span.live-search_text, .soralist ul li, .bigfilter .medium .limit .checkbox li input:checked+label:before, .bigfilter .medium .limit .checkbox li:hover, .epg .epgl ul li .l .eptlx i , #footer .centerfooter .ftr_wgt .anm_wdt h3,#main-menu ul li ul li a:hover, .dl-box .dl-item a span.dlxxx .fas, .comment-list .comment-body .reply a,#main-menu ul li a {color:<?php echo $tc; ?>}
		.bigfilter .btn .searchz, .comment-list .comment-body .reply a {border-color:<?php echo $tc; ?>}
		.infodb .infr .bmarea .bookmark:hover, .bigfilter .btn .searchz:hover, .bigplay:hover .overlay .dashicons {background-color: #333;}
		.bigfilter .btn .searchz:hover {border-color: #333;}
		#sidebar .section .ts-wpop-series-gen .ts-wpop-nav-tabs li.active a,.mvinfo .seasoninx{color:#FFF;}
	</style>
<?php } 
}

add_action ('wp_footer','themesiaFooter');
function themesiaFooter(){ ?>
<?php if(get_option('slidergallery')=='1'){ if(is_singular(array('post','watch','series'))){ ?>
<script>
$('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});

	var isGalleryDragging = false;
	$("#gallery").on("mousedown touchstart", function() {
		isGalleryDragging = false;
	}).on("mousemove touchmove", function() {
		isGalleryDragging = true;
	}).on("mouseup touchend", function(event) {
		event.preventDefault();
		var wasGallerDragging = isGalleryDragging;
		isGalleryDragging = false;
		if (!wasGallerDragging) {
			event = event || window.event;
			var target = event.target || event.srcElement;
			var link = target.src ? target.parentNode : target;
			var options = { index: link, event: event };
			var links = this.getElementsByTagName('a');
			blueimp.Gallery(links, options);
		}
	});
	$("#gallery a").on("click", function(){return false;});
</script>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
      <div class="slides"></div>
      <h3 class="title"></h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
      <a class="play-pause"></a>
      <ol class="indicator"></ol>
</div>
<?php } } ?>
<?php floating(); ?>
<?php echo get_option('tsscriptfooter'); ?>
<?php }
define("THEMESIA_MVS_MIRROR_EP", "mirror");
add_action('init', 'ts_add_mirror_endpoints');
function ts_add_mirror_endpoints(){
    add_rewrite_endpoint(THEMESIA_MVS_MIRROR_EP, EP_PERMALINK | EP_PAGES);
}
