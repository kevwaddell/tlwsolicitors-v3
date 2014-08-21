<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$form = get_field('form');
$office_tel = get_field('office_tel');
$fax = get_field('fax');
$email = get_field('email');
$location = get_field('location');
$map_marker = get_stylesheet_directory_uri()."/_/img/map-marker.png";
//echo '<pre>';print_r($form);echo '</pre>';
 ?>	
 
 	
	<?php if ($location) { ?>

	<?php include (STYLESHEETPATH . '/_/inc/contact-us/map.php'); ?>
	
	<?php } ?>
 	
 	<section <?php post_class(); ?>>
 	
 	<div class="row">
	
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-push-4 col-md-offset-0 col-lg-8 col-lg-push-4 col-lg-offset-0">
			
			<a id="make-a-claim" name="make-a-claim"></a>
			
			<div class="contact-form">
			<?php if ($form) { ?>
			<h3 class="icon-header" style="margin-bottom: 20px; margin-right: 0px;"><?php echo $form->title; ?> <i class="fa fa-cog fa-lg"></i></h3>
			<?php gravity_form($form->id, false, true, false, null, true); ?>
			
			<?php }  ?>
			</div>
			
		</div>
		
		<aside class="sidebar single col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-pull-8 col-md-offset-0 col-lg-4 col-lg-pull-8 col-lg-offset-0">
	
		<button class="icon-header dropdown-head" data-toggle="collapse" data-target="#address"><i class="icon fa fa-map-marker fa-lg"></i> Address <i class="fa fa-angle-down fa-lg"></i></button>
		<div id="address" class="sidebar-block-inner collapse in">
			<?php the_content(); ?>
		</div>
		
		<button class="icon-header dropdown-head hidden-xs" data-toggle="collapse" data-target="#control"><i class="icon fa fa-globe fa-lg"></i> Route finder <i class="fa fa-angle-down fa-lg"></i></button>
		<div id="control" class="sidebar-block-inner hidden-xs collapse">
			
			<div class="form-group">
				<label for="start">Enter Your Post code:</label>
				<input type="text" class="form-control" maxlength="9" id="start">
			</div>
			<button onclick="calcRoute();" class="icon-btn">Show route <i class="fa fa-angle-right fa-lg"></i></button>

		</div>
		
		<ul class="contact-list list-unstyled">
			
			<?php if (isset($office_tel)) { ?>
			<li><i class="fa fa-phone fa-lg"></i> Office Tel: <?php echo $office_tel; ?></li>
			<?php } ?>
			
			<?php if (isset($fax)) { ?>
			<li><i class="fa fa-print fa-lg"></i> Fax: <?php echo $fax; ?></li>
			<?php } ?>
			
			<?php if (isset($email)) { ?>
			<li><a href="mailto:<?php echo $email; ?>" title="Email TLW"><i class="fa fa-envelope fa-lg"></i> <?php echo $email; ?></a></li>
			<?php } ?>
			
		</ul>
	
	</aside>
		
		
 	</section>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
