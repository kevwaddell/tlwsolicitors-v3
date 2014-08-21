<?php 
/*
Template Name: Feedback page template
*/
 ?>

<?php get_header(); ?>

<?php
$feedback_args = array(
	'posts_per_page'   => 6,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quotes = get_posts($feedback_args); 

//echo '<pre>';print_r($feedback_quotes);echo '</pre>';
?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
 ?>	
<!-- PAGE TOP SECTION -->
<section class="page-top">
	
	<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
				</div>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h2 style="margin-top: 0px;"><?php the_title(); ?></h2>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
			</div>
			
		</article>

</section>
<!-- PAGE TOP SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php if ($feedback_quotes) { 
$feed_counter = 0;	
?>

<!-- TEAM PROFILES SECTION -->
<section id="feedback-quotes">
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-0 col-lg-12 col-lg-offset-0">
	
			<div class="row">
			
			<?php foreach ($feedback_quotes as $quote) : 
			$feed_counter++;
			
			$name = get_field('client_name', $quote->ID);	
			$location = get_field('location', $quote->ID);	
			$quote = get_field('quote', $quote->ID);
			
			$col_lg = "col-lg-3";
			$col_md = "col-md-5";
			
			if ($feed_counter == 1 || $feed_counter == 6) {
			$col_lg = "col-lg-4";	
			}
			
			if ($feed_counter == 3 || $feed_counter == 4) {
			$col_lg = "col-lg-5";
			}
			
			if ($feed_counter == 4) {
			$col_md = "col-md-7";	
			}	
			
			if ($feed_counter == 1 || $feed_counter == 5) {
			$col_md = "col-md-7";	
			}
			
			if ($feed_counter <= 3) {
			$pointer = "pointer-left";	
			} else {
			$pointer = "pointer-right";		
			}	
			
			?>
			<div class="col-xs-12 col-sm-6 <?php echo $col_md ; ?> <?php echo $col_lg ; ?>">
				<blockquote id="quote-<?php echo $feed_counter ; ?>" class="<?php echo $pointer; ?>">
					<p class="quote text-center"><i class="fa fa-quote-left"></i> <?php echo $quote ; ?> <i class="fa fa-quote-right"></i></p> 
					<p class="name-location text-center"><?php echo $name ; ?><br><?php echo $location ; ?></p>	
				</blockquote>
			</div>
			<?php endforeach; ?>
			
			<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				<a href="mailto:info@tlwsolicitors.co.uk?subject=TLW client feedback" class="icon-btn" title="Send us your feedback">
					<i class="fa fa-bullhorn fa-lg icon"></i> Send us your feedback <i class="fa fa-angle-right fa-lg"></i>
				</a>
			</div>
			
			</div>
			
		</div>	
	
	</div>	

</section>
<!-- TEAM PROFILES SECTION -->

<?php } ?>

<?php get_footer(); ?>
