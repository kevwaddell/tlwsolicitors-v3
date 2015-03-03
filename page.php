<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$related_pages = get_field('page_links'); 
$hide_title = get_field('hide_title'); 
?>	
 
 	<div class="row">
 	 	
	 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
	 	
			<article <?php post_class(); ?>>
				
				<?php if ($hide_title != 1) { ?>
					<h1><?php the_title(); ?></h1>
				<?php } ?>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				</article>
			
	 	</div>
	 	
	 	<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
		
 	</div>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
