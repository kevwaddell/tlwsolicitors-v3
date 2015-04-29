<?php 
/*
Template Name: Thank page template
*/
 ?>

<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	

<?php 
$content = get_the_content();
//echo '<pre>';print_r($content);echo '</pre>';
if (isset($_GET['return-page'])) {
$return_id = $_GET['return-page'];
} else {
$return_id = $post->post_parent;	
}

if (isset($_GET['return-url'])) {
$return_url = $_GET['return-url'];
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
				<?php if (empty($content)) { ?>
				<h1>Thank you for contacting us <?php echo ($name) ? $name : ""; ?>.</h1>
				<p>A member of our team will contact you shortly.</p>
				<?php } else { ?>
				<?php the_content(); ?>
				<?php } ?>
				
				<?php if (isset($_GET['return-url'])) { ?>
				<a href="<?php echo $return_url; ?>" class="icon-btn" style="padding-left:10px; width: 300px;" id="reload-form">Continue <i class="fa fa-angle-right fa-lg"></i></a>
				<?php } ?>
				<?php if (isset($_GET['return-page'])) { ?>
				<a href="<?php echo get_permalink($return_id) ; ?>" class="icon-btn" style="padding-left:10px; width: 300px;" id="reload-form">Continue <i class="fa fa-angle-right fa-lg"></i></a>
				<?php } ?>				
				</div>
				
			</div>
			
		</article>

</section>

		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
