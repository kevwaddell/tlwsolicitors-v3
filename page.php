<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$related_pages = get_field('page_links'); 

?>	
 
 	<div class="row">
 	 	
	 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
	 	
			<article <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>
				
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
