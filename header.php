<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( empty($withcomments) && !is_single() ) {
?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/img/wp_content_bkg.png") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/img/wp_content_bkg_wide.png") repeat-y top; border: none; }
<?php } ?>

</style>

<?php wp_head(); ?>
</head>
<body>
<div id="page">


<div id="header"><div id="headerimg"><h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1><div class="description"><?php bloginfo('description'); ?></div></div></div>
<div id="top-menu">
	<ul>
		<li><a <?php if (is_home()) echo('class="current" '); ?>href="<?php bloginfo('url'); ?>">Actualités</a></li>
		<?php wp_list_pages('depth=1&title_li='); ?>
		
	</ul>
		
</div>
<div style="clear:both; "></div>
