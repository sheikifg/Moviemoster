<header id="main-menu" class="site-header<?php if(get_option('stheader')){ echo ' stickyheader'; } ?>" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
<div class="centernav">
<div class="bound">
<div class="logo">
	<?php
		$logo = get_option('logo'); if($logo) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<img src="<?php echo $logo; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" width="180" height="50"/>
		</a>
		<?php } else { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
		</a>
		<?php } ?>
	</div>

<label for="show-menu" class="show-menu"><i class="fas fa-bars"></i></label>
<input type="checkbox" id="show-menu" role="button">
<span itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<?php 
	$nav_menu = wp_nav_menu(array('theme_location'=>'main', 'container'=>'', 'link_before'=>'<span itemprop="name">','link_after'=>'</span>','fallback_cb' => '', 'echo' => 0)); 
		if(empty($nav_menu))
			$nav_menu = '<ul>'.wp_list_categories(array('show_option_all'=>__('Home', 'dp'), 'title_li'=>'', 'echo'=>0)).'</ul>';
		echo $nav_menu;
?>
</span>
<div class="searchx">
 		<form action="<?php bloginfo('url'); ?>/" id="form" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
			<meta itemprop="target" content="<?php bloginfo('url'); ?>/?s={query}"/>
  			<input id="s" itemprop="query-input" class="search-live" type="text" placeholder="Search..." name="s"/>
			<button type="submit" id="submit"><i class="fas fa-search"></i></button>
 		</form>
	</div>
<div class="ms"><i class="fas fa-search"></i></div>
<div class="clear"></div>
</div>
</div>
</header>
<?php if(get_option('stheader')){ echo ' <div class="stgap"></div>'; } ?>