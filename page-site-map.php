<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	

<div class="row">

	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
	
	<section class="page-top">
		
		<article <?php post_class(); ?>>
			
			<h2 class="text-center"><?php the_title(); ?></h2>
		
			<?php the_content(); ?>	
			
			<div class="search-form-wrap text-center">
			<?php get_search_form(); ?>
			</div>
			
		</article>
	
	</section>
	
	<?php endwhile; ?>
	<?php endif; ?>
	
	
	<?php include (STYLESHEETPATH . '/_/inc/site-map/vars.php'); ?> 
	
	<section id="site-map-lists">
	
		<div class="row">
		
			<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-left-col.php'); ?> 
		
			<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-middle-col.php'); ?>
			
			<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-right-col.php'); ?>
			
		</div>
	
	</section>
	
	</div>
	
	<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>

</div>

<?php get_footer(); ?>
