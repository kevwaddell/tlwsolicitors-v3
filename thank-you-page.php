<?php 
/*
Template Name: Thank page template
*/
 ?>

<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	

<?php 
if (isset($_GET['return-page'])) {
$return_id = $_GET['return-page'];
} else {
$return_id = $post->post_parent;	
}

if (isset($_GET['first-name'])) {
$name = $_GET['first-name'];	
}

if (isset($_GET['full-name'])) {
$split = split(" ", $_GET['full-name']);
$name = $split[0];	
}
 ?>

<section class="page-top">

		<article <?php post_class(); ?>>
			
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
				</div>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h1>Thank you for contacting us <?php echo $name; ?>.</h1>
				<p>A member of our team will contact you shortly.</p>
				<a href="<?php echo get_permalink($return_id) ; ?>" class="icon-btn" style="padding-left:10px; width: 300px;" id="reload-form">Continue <i class="fa fa-angle-right fa-lg"></i></a>
								
				</div>
				
			</div>
			
		</article>

</section>

		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
