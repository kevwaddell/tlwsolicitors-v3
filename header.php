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
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
	
	$services = array(24, 26, 29, 31, 33, 35);
	global $post;
	if ($post->post_parent != 0) {
	$parent = get_post($post->post_parent);	
	}
	
	if ( isset($_COOKIE['font_size']) ) {
    $font_size = $_COOKIE['font_size'];	
	} else {
	$font_size = "txt-sm";	
	}
	
	if (in_array($post->post_parent, $services) || ($parent && in_array($parent->post_parent, $services)) ) {
	$dir = "services";	
	}
	?>

</head>

<body id="<?php echo $dir ?>" <?php body_class($font_size); ?>><?php do_action( 'body_open' ); ?>

<div class="tlw-wrapper nav-closed">
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header<?php echo (is_front_page()) ? ' pos-abs':'' ?>" role="banner">
		
		<div class="container">
		
		<div class="header-inner">
			
				<div class="row">
				
					<?php 
					$freephone_num = get_field('freephone_num', 'option');
					$main_email = get_field('main_email', 'option');	
					?>
					<?php if (isset($freephone_num) && isset($main_email)) { ?>
					<div class="col-xs-12" style="text-align:center;">
						<div class="contact-links">
							<span class="contact-link text-center"><i class="fa fa-phone fa-lg"></i> 
							<a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event', 'mobile', 'click to call', 'site header');" title="Call us now"><?php echo $freephone_num; ?></a></span>
							
							<span class="contact-link text-center"><i class="fa fa-envelope"></i> 
							<a href="mailto:<?php echo $main_email; ?>" onclick="ga('send', 'event', 'Email', 'click to email', 'site header');" title="Email us now"><?php echo $main_email; ?></a></span>
						</div>
					</div>
					<?php }  ?>
				
					<div class="col-xs-10 col-sm-10 col-md-4">
						<?php if (is_front_page()) { ?>
						<h1 class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
						<?php } else { ?>
						<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
						<?php } ?>
					</div>
					
					<button id="nav-btn" class="visible-xs visible-sm in-active"><i class="fa fa-bars fa-lg"></i><span class="sr-only">Navigation</span></button>
					
					<div class="col-xs-6 col-sm-6 col-md-8">
						<nav id="main-nav" class="nav-closed">
							<?php wp_nav_menu(array( 
							'container' => 'false', 
							'menu' => 'Main Navigation', 
							'menu_class'  => 'menu clearfix',
							'fallback_cb' => false ) ); 
							?>
						</nav>
					</div>
				
				</div>
			
		</div>
		
		</div>
				
	</header>
	
	<?php if (!is_front_page()) { ?>
	<div id="breadcrumbs">
		<div class="container">		
			<div id="breadcrumbs-inner">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-0 col-lg-12 col-lg-offset-0">
						
						<?php if ( function_exists('yoast_breadcrumb') ) {
							
							yoast_breadcrumb("","");
						
						} ?>	
						
					</div>
				</div>
			</div>
		</div>		
	</div>	
	<?php }  ?>
	
	<?php if (is_front_page()) { ?>
	<?php include (STYLESHEETPATH . '/_/inc/home-page/home-banner.php'); ?>	
	<?php } ?>
		
	<!-- MAIN CONTENT START -->
	<div class="container">
	
	<div class="content">