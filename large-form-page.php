<?php 
/*
Template Name: Large form Landing page
*/
 ?>

<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$freephone_num = get_field('freephone_num', 'option');
$form = get_field('form');
$address = get_field('address');
$office_tel = get_field('office_tel');
$fax = get_field('fax');
$email = get_field('email');
$location = get_field('location');
$color = get_field('page_colour');
$page_icon = get_field('page_icon');
$on_page_script = get_field('on_page_script');
$map_marker = get_stylesheet_directory_uri()."/_/img/map-marker.png";
$hide_title = get_field('hide_title'); 
//echo '<pre>';print_r($form);echo '</pre>';
 ?>	
 
<?php if (!empty($on_page_script)) { ?>
<?php echo $on_page_script; ?>
<?php } ?>
 
<?php if ($location) { ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php } ?>

<main class="<?php echo (!empty($color)) ? ' page-col-'.$color : 'red'; ?>">
		 	
 	<article <?php post_class(); ?>>
	 	
	 	<div class="row">
		 	
		 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
		 		<figure class="feat-img-wide">
				<?php add_wide_feat_img($post) ; ?>
				</figure>
					
			 	<div class="entry">
				
					<?php if ($hide_title != 1) { ?>
					<h1><?php the_title(); ?></h1>
					<?php } ?>
				
					<?php the_content(); ?>
					
					<p class="tel-num"><i class="fa fa-mobile"></i> Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
				
			 	</div>
			
		 	</div>
		 	
			 <?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
		 	
		 	 <?php get_sidebar('large-form-pg'); ?>
		 			
	 	</div>
	
	</article>
	<a id="contact-us-today" name="contact-us-today"></a>	
 	<section class="contact-panel">
	 	
	 	<h3 class="icon-header">Contact us Today <i class="fa fa-life-ring fa-2x"></i></h3>
	 	
	 	<div class="row">
			
			<div class="col-sm-10 col-sm-offset-1 col-md-7 col-md-push-5 col-md-offset-0 col-lg-8 col-lg-push-4 col-lg-offset-0">
							
				<div class="contact-form col-bg">
				<?php if ($form) { ?>
				<?php gravity_form($form->id, false, true, false, null, true); ?>
				
				<?php }  ?>
				</div>
				
			</div>
			
			<aside class="sidebar single col-sm-10 col-sm-offset-1 col-md-5 col-md-pull-7 col-md-offset-0 col-lg-4 col-lg-pull-8 col-lg-offset-0">
			
				<?php if ($location) { ?>
		
					<?php include (STYLESHEETPATH . '/_/inc/landing-page/map-sml.php'); ?>
			
				<?php } ?>
					
				<button class="icon-header dropdown-head" data-toggle="collapse" data-target="#address"><i class="icon fa fa-map-marker fa-lg"></i> Location <i class="fa fa-angle-down fa-lg"></i></button>
				<?php if ($address) { ?>
				<div id="address" class="sidebar-block-inner collapse in">
					<?php echo $address; ?>
				</div>
				<?php } ?>
				
				<button class="icon-header dropdown-head" data-toggle="collapse" data-target="#control"><i class="icon fa fa-globe fa-lg"></i> Route finder <i class="fa fa-angle-down fa-lg"></i></button>
				<div id="control" class="sidebar-block-inner collapse">
						
					<!-- <form action="http://maps.google.com/maps/" method="get" target="_blank"> -->
					<form action="http://maps.google.com/maps" method="get" target="_blank" class="route-finder">
						<div class="form-group">
							<label for="saddr">Enter Your Post code:</label>
							<input type="hidden" name="daddr" value="NE29 7ST">
							<input type="text" class="form-control" name="saddr" maxlength="9" id="start">
						</div>
						<p class="submit"><input type="submit" class="btn btn-default btn-block" value="Get directions"></p>
						
					</form>
					
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
			
	 	</div>
 	
 	</section>
 	
</main>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
