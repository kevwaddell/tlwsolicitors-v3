<?php 
/*
Template Name: Newsletter sign up template
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$form = get_field('form');
$hide_title = get_field('hide_title'); 
 ?>	
 <div class="row">
 
 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
 	
		<article>
			<?php if ($hide_title != 1) { ?>
				<h1><?php the_title(); ?></h1>
			<?php } ?>
			
			<?php the_content(); ?>
			
			<?php if ($form) { ?>
			
			<?php gravity_form($form->id, false, false, false, null, true); ?>
			
			<?php }  ?>
			
		</article>
	 
	 </div>
	 
	 <?php include (STYLESHEETPATH . '/_/inc/global/access-btns-fleft.php'); ?>
	 		
 </div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
