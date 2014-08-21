<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head id="www-tlwsolicitors-co-uk">

	<meta charset="<?php bloginfo('charset'); ?>">
	<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
	
	<title><?php bloginfo('name'); ?> &rsaquo; <?php echo $this->g_opt['mamo_pagetitle']; ?></title>
	<meta name="description" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />
<?php
	global $is_iphone;
	if ( $is_iphone ) { ?>
	
	<meta name="viewport" content="width=320; initial-scale=0.9; maximum-scale=1.0; user-scalable=0;" />
<?php } ?>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/_/css/offline.css" type="text/css" media="all">

<?php 
 ?>
</head>

<body>

	<div id="wrapper">
		
		<div id="header">
			<h1><?php bloginfo('name'); ?></h1>
		</div>
	
		<div id="content">
			<?php echo $this->mamo_template_tag_message(); ?>
		</div>
 
		<div id="footer">
			<p>Freephone: 0800 169 5925 or Email <a href="mailto:info@tlwsolicitors.co.uk">info@tlwsolicitors.co.uk</a></p>
			<a href="/login/" class="login-link" title="Login">Login</a>
		</div>

	</div>

</body>
</html>