<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
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
	<link rel="apple-touch-startup-image" href="<?php bloginfo('template_directory'); ?>/_/img/apple-start-up-img.png">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
	
	<?php 
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
	
	$services = array(24, 26, 29, 31, 33, 35);
	global $post;
	
	if ( isset($_COOKIE['font_size']) ) {
    $font_size = $_COOKIE['font_size'];	
	} else {
	$font_size = "txt-sm";	
	}
	
	if (in_array($post->post_parent, $services)) {
	$dir = "services";	
	}
	
	if ($post->post_parent == 10 && $_SERVER['SERVER_NAME'] =='www.tlwsolicitors.co.uk') { ?>
	<!-- Facebook Conversion Code for Mortgage Mis-selling campaign -->
	<script>(function() {
	var _fbq = window._fbq || (window._fbq = []);
	if (!_fbq.loaded) {
	var fbds = document.createElement('script');
	fbds.async = true;
	fbds.src = '//connect.facebook.net/en_US/fbds.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(fbds, s);
	_fbq.loaded = true;
	}
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(['track', '6020302130140', {'value':'0.01','currency':'USD'}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6020302130140&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
	
	<!-- Facebook Conversion Code for Timeshare Mis-selling -->
	<script>(function() {
	var _fbq = window._fbq || (window._fbq = []);
	if (!_fbq.loaded) {
	var fbds = document.createElement('script');
	fbds.async = true;
	fbds.src = '//connect.facebook.net/en_US/fbds.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(fbds, s);
	_fbq.loaded = true;
	}
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(['track', '6020260091340', {'value':'0.01','currency':'USD'}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6020260091340&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
	<?php } ?>
	
	<?php if ($_SERVER['SERVER_NAME'] =='www.tlwsolicitors.co.uk') { ?>
	<script type="text/javascript" src="http://web-cntr-07.com/js/38138.js" ></script>
<noscript><img src="http://web-cntr-07.com/38138.png" style="display:none;" /></noscript>
	<?php } ?>
	
</head>

<body id="<?php echo $dir ?>" <?php body_class($font_size); ?>>

<div class="tlw-wrapper nav-closed">
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header<?php echo (is_front_page()) ? ' pos-abs':'' ?>" role="banner">
		
		<div class="container">
		
		<div class="header-inner">
			
				<div class="row">
				
					<?php $freephone_num = get_field('freephone_num', 'option');?>
					<?php if (isset($freephone_num)) { ?>
					<div class="col-xs-12 col-md-4 col-md-push-2 col-lg-5 col-lg-push-2 " style="text-align:center;">
						<span class="tel-num text-center"><i class="fa fa-mobile fa-lg"></i> 
						<a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="_gaq.push(['_trackEvent', 'Lead', 'ClickToCall']);" title="Call us now"><?php echo $freephone_num; ?></a></span>
					</div>
					<?php }  ?>
				
					<div class="col-xs-10 col-sm-9 col-sm-offset-1 col-md-2 col-md-offset-0 col-md-pull-4 col-lg-2 col-lg-pull-5">
						<h1 class="text-hide"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					</div>
					
					<button id="nav-btn" class="visible-xs visible-sm in-active"><i class="fa fa-bars fa-lg"></i><span class="sr-only">Navigation</span></button>
					
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-5">
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
	
	<?php if (is_front_page()) { 
	$header_img = get_header_image();
	//echo '<pre>';print_r($header_img);echo '</pre>';
		
	?>
	
	<div id="home-banner">
	
		<div class="banner-wrap" style="background-image: url(<?php echo $header_img; ?>);">
			
			<div class="container">
			<p class="tag-line white">For added TLC<br>think TLW Solicitors</p>
			</div>
			
		</div>

	</div>
	
	<?php } ?>
		
	<!-- MAIN CONTENT START -->
	<div class="container">
	
	<div class="content">