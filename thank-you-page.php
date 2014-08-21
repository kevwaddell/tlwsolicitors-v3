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
				
				<h2>Thank you for contacting us <?php echo $_GET['first-name'] ; ?>.</h2>
				<p>A member of our team will contact you shortly.</p>
				<a href="<?php echo get_permalink($return_id) ; ?>" class="icon-btn" style="padding-left:10px; width: 300px;" id="reload-form">Continue <i class="fa fa-angle-right fa-lg"></i></a>
				
				<?php if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') { ?>
				<!-- Google Code for Enquiry Submissions Conversion Page -->
				<script type="text/javascript">
				/* <![CDATA[ */
				var google_conversion_id = 969694937;
				var google_conversion_language = "en";
				var google_conversion_format = "1";
				var google_conversion_color = "ffffff";
				var google_conversion_label = "eWmHCIfNuAgQ2b2xzgM";
				var google_remarketing_only = false;
				/* ]]> */
				</script>
				<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
				</script>
				<noscript>
				<div style="display:inline;">
				<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/969694937/?label=eWmHCIfNuAgQ2b2xzgM&guid=ON&script=0"/>
				</div>
				</noscript>
				<?php } ?>
				
				</div>
				
			</div>
			
		</article>

</section>

		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
