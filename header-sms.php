<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head id="www-tlwsolicitors-co-uk" data-template-set="tlw-solicitors-theme">

	<meta charset="<?php bloginfo('charset'); ?>">
	<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
	
	<meta name="viewport" content="user-scalable=1.0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=yes">
		   
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-iphone.png" /> 
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-ipad.png" /> 
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-ipad-retina.png" />
	<link rel="apple-touch-startup-image" href="<?php bloginfo('template_directory'); ?>/_/img/apple-start-up-img.png" />
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
	
	<?php 
	global $post;
	if ($post->post_parent != 0) {
	$parent = get_post($post->post_parent);	
	}
	$active_scripts = get_field('active_scripts', $post->ID);
	$global_scripts = get_field('global_scripts', 'options');
	?>
	
	<?php if (in_array("header", $active_scripts)) { 
	$scripts = get_field('scripts', $post->ID);	
	?>
	<?php echo $scripts; ?>
	<?php } ?>
	
	<?php if (!empty($global_scripts)) { ?>
	<?php echo $global_scripts; ?>
	<?php } ?>

	
</head>

<body id="sms-pg" <?php body_class(); ?>><?php do_action( 'body_open' ); ?>
	
<?php if (in_array("page", $active_scripts)) {
$op_script = get_field('on_page_script', $post->ID);	
?>
<?php echo $op_script; ?>
<?php } ?>


<div class="sms-wrapper">
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header" role="banner">
				
		<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/" target="_blank"><?php bloginfo('name'); ?></a></p>
				
	</header>