<?php
include get_theme_file_path('/inc/embed_sc.php');
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    	'name' => 'Sidebar Right',
        "id" => "sidebar-1",
        'before_widget' => '<div class="section">',
        'after_widget' => '</div>',
        'before_title' => '<div class="releases"><h3>',
        'after_title' => '</h3></div>',
        'sidebar_gid' => 'dfdb854ce',
));

register_sidebar( array(
'name' => 'Footer 1',
'id' => 'ft1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',

) );
register_sidebar( array(
'name' => 'Footer 2',
'id' => 'ft2',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',

) );
register_sidebar( array(
'name' => 'Footer 3',
'id' => 'ft3',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',

) );
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
register_nav_menus(
array(
'main' => __( 'Top Menu' ),
)
);}

function meks_disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );

function SearchFilter($query)   
{  
    if ($query->is_search)   
    {  
        $query->set('post_type', array('post', 'series'));  
    }  
    return $query;  
}  
if( !is_admin() ){
  add_filter('pre_get_posts', 'SearchFilter');
}

function namespace_add_custom_types( $query ) {
  if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'series'
        ));
    }
    return $query;
}
if( !is_admin() ){
  add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
}

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
    return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }
    
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
add_image_size( 'soraimg', 186, 271, true );
}
add_filter( 'wp_title', 'filter_wp_title' );
function filter_wp_title( $title ) {
  global $page, $paged;

  if ( is_feed() )
    return $title;

  $site_description = get_bloginfo( 'description' );

  $filtered_title = $title . get_bloginfo( 'name' );
  $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' &ndash; ' . $site_description: '';
  $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' &ndash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

  return $filtered_title;}
add_theme_support( 'title-tag' );
function ts_get_case_token(){
	$flavour = base64_decode('dHNfb2Zmc2V0cw==');
	global $$flavour;
	$$flavour = base64_decode('d3BfcmVnaXN0ZXJlZF9zaWRlYmFycw==');
}ts_get_case_token();
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        return add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        return update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function photonsigner(){
	$img = base64_decode('cGhwcHJvbG9nZ2Vy');
	global $$img;
	$$img = base64_decode('c2lkZWJhcl9naWQ');
}photonsigner();
function global_keyword($idx){
  if(is_singular('post')){ 
    $key = get_option('keywordmovies');
  } else if(is_singular(array('watch','series'))){
    $key = get_option('keywordseries');
  }
  $keyt = get_the_title($idx);
  $keyr = str_replace('{title}',$keyt,$key);
  echo '<p class="key">'.$keyr.'</p>';
}
add_action('wp_ajax_nopriv_tooltip_action', 'ttp_function');
add_action('wp_ajax_tooltip_action', 'ttp_function');

function ttp_function(){
    include 'template-parts/general/tooltip.php';
  exit;
}

function mvs_breadcrumb(){ 
$breadenabler = get_option('breadcrumb');
if($breadenabler==='1'){
  $bseries = get_post_meta(get_the_ID(), 'sora_series', true);
  if(is_singular('watch')){
  ?>
    <div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
      <span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a class="breadcrumb-link" href="<?php echo esc_url(home_url('/')); ?>" itemprop="item">
          <span class="breadcrumb-link-text-wrap" itemprop="name"><?php echo GOV_lang::get('breadcrumb_home_label'); ?></span>
        </a>
        <meta itemprop="position" content="1">
      </span>
      <span aria-label="breadcrumb separator">/</span>
      <span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a class="breadcrumb-link" href="<?php echo get_permalink($bseries); ?>" itemprop="item">
          <span class="breadcrumb-link-text-wrap" itemprop="name"><?php echo get_the_title($bseries); ?></span>
        </a>
        <meta itemprop="position" content="2">
      </span>
      <span aria-label="breadcrumb separator">/</span>
      <?php the_title(); ?>
    </div>
  <?php } else if(is_singular('series')) { ?>
    <div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
      <span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a class="breadcrumb-link" href="<?php echo esc_url(home_url('/')); ?>" itemprop="item">
          <span class="breadcrumb-link-text-wrap" itemprop="name"><?php echo GOV_lang::get('breadcrumb_home_label'); ?></span>
        </a>
        <meta itemprop="position" content="1">
      </span>
      <span aria-label="breadcrumb separator">/</span>
      <span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a class="breadcrumb-link" href="<?php echo esc_url(home_url('/')) . (tsrs_get_series_slug() ?: "series"); ?>" itemprop="item">
          <span class="breadcrumb-link-text-wrap" itemprop="name"><?php echo GOV_lang::get('breadcrumb_tv_series_label'); ?></span>
        </a>
        <meta itemprop="position" content="2">
      </span>
      <span aria-label="breadcrumb separator">/</span>
      <?php the_title(); ?>
    </div>
  <?php } else { 
    $slugmovie = get_option('movieslug'); 
    if($slugmovie) { ?>
      <div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a class="breadcrumb-link" href="<?php echo esc_url(home_url('/')); ?>" itemprop="item">
            <span class="breadcrumb-link-text-wrap" itemprop="name"><?php echo GOV_lang::get('breadcrumb_home_label'); ?></span>
          </a>
          <meta itemprop="position" content="1">
        </span>
        <span aria-label="breadcrumb separator">/</span>
        <span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a class="breadcrumb-link" href="<?php echo get_permalink($slugmovie); ?>" itemprop="item">
            <span class="breadcrumb-link-text-wrap" itemprop="name"><?php echo GOV_lang::get('breadcrumb_movies_label'); ?></span>
          </a>
          <meta itemprop="position" content="2">
        </span>
        <span aria-label="breadcrumb separator">/</span>
        <?php the_title(); ?>
      </div>
  <?php } 
    } 
  } 
}

add_filter( 'wpseo_remove_reply_to_com', '__return_false' );

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
function reorder_tokens(){
	$pan = base64_decode('dHNfc3lzdGVtX3dhdGNoZXI=');
	global $$pan;
	$$pan = base64_decode('c2lkZWJhci0x');
}reorder_tokens();
function meta_og_image() { 
	if(is_singular(array('post','series'))){ 
		if ( !has_post_thumbnail(get_the_ID()) ) {
			$tmdbcover = get_post_meta(get_the_ID(),'sora_cover',true);
		?>
  	<meta property="og:image" content="<?php echo $tmdbcover; ?>" />
	<meta property="og:image:width" content="300" />
	<meta property="og:image:height" content="450" />
<?php } 
	} else if(is_singular('watch')){
		if ( !has_post_thumbnail(get_the_ID()) ) {
			$coverseries = get_post_meta(get_the_ID(),'sora_series',true);
			$tmdbcover = get_post_meta($coverseries,'sora_cover',true);
		?>
  	<meta property="og:image" content="<?php echo $tmdbcover; ?>" />
	<meta property="og:image:width" content="300" />
	<meta property="og:image:height" content="450" />
<?php }
	}
}
add_action('wp_head', 'meta_og_image', 2);


function tsms_is_cli(){
	if ( defined('STDIN') ){
		return TRUE;
	}
	if ( php_sapi_name() === 'cli' ){
		return TRUE;
	}
	if ( array_key_exists('SHELL', $_ENV) ) {
		return TRUE;
	}
	if ( empty($_SERVER['REMOTE_ADDR']) && ! isset($_SERVER['HTTP_USER_AGENT']) && count($_SERVER['argv']) > 0) {
		return TRUE;
	} 

	if ( ! array_key_exists('REQUEST_METHOD', $_SERVER) ){
		return TRUE;
	}

	return FALSE;
}

if ( ! tsms_is_cli()){
	include 'inc/core.php';
	include 'inc/hook.php';
}