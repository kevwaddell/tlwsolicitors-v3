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
	$color = get_field('page_colour', $post->ID);
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$bg_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
	$bg_img_url = $bg_img[0];
	
	//echo '<pre>';print_r($wide_banner_img);echo '</pre>';
	
	if ( isset($_COOKIE['font_size']) ) {
    $font_size = $_COOKIE['font_size'];	
	} else {
	$font_size = "txt-sm";	
	}
	?>
	
</head>

<body id="landing-page" <?php body_class($font_size); ?>>
<?php if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') { ?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PLBR4F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PLBR4F');</script>
<!-- End Google Tag Manager -->
<?php } ?>
<div class="tlw-wrapper">
	<div class="lp-bg-img hidden-xs hidden-sm" style="background-image: url(<?php echo $bg_img_url; ?>)"></div><div class="col-overlay hidden-xs hidden-sm bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>"></div><div class="striped-overlay hidden-xs hidden-sm"></div>
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header" role="banner">
	 <?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	

		<div class="header-inner">
			<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
		</div>
		
			
		<div class="lp-header bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
			<div class="container">
				<h1 class="text-center"><?php the_title(); ?></h1>
			</div>
		</div>
				
	</header>
		
	<!-- MAIN CONTENT START -->
	<div class="container">
		
	<div class="lp-bg-img hidden-md hidden-lg" style="background-image: url(<?php echo $bg_img_url; ?>)"></div>
	
	<div class="content">