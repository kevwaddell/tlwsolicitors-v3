<?php get_header(); ?>

<?php include (STYLESHEETPATH . '/_/inc/home-page/vars.php'); ?>	

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	

<?php if ($services) { 	?>

<section id="service-links" class="old-service-links">
		
		<?php include (STYLESHEETPATH . '/_/inc/home-page/latest-campaigns.php'); ?>		
		
		<?php include (STYLESHEETPATH . '/_/inc/home-page/service-links.php'); ?>
		
</section>

<?php include (STYLESHEETPATH . '/_/inc/home-page/start-enquiry-form.php'); ?>

<?php }  ?>

<?php if ($feedback_quotes) { ?>
<?php include (STYLESHEETPATH . '/_/inc/home-page/quotes.php'); ?>
<?php }  ?>


<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
