<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="no-js">
<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id='shadow'></div>
	
<?php get_template_part('template-parts/header/style','1'); ?>

<?php $pnn = get_option('mvsannouncement'); if($pnn){ ?><div class="pnn"><?php echo $pnn; ?></div><?php } ?>

<?php if(get_option('sdhome')=='1' || !is_home()){ echo '<br>'; kln('klntop'); } ?>