<?php 
/*
Template Name: Feedback page v2 template
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
$freephone_num = get_field('freephone_num', 'option');
//echo '<pre>';print_r($feedback_quotes);echo '</pre>';
?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	
<main class="page-col-red">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
					
					<figure class="feat-img-wide">
					<?php add_wide_feat_img($post) ; ?>
					</figure>
					
					<div class="entry">
						
						<h2><?php the_title(); ?></h2>
						
						<?php the_content(); ?>
						
						 <p class="tel-num"><i class="fa fa-mobile"></i> Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
					
					</div>
					
					<?php if ($feedback_quotes) { 
					$feed_counter = 0;	
					?>
					
					<!-- TEAM PROFILES SECTION -->
					<section id="feedback-quotes">
						
							<?php foreach ($feedback_quotes as $quote) : 
							$feed_counter++;
							
							$name = get_field('client_name', $quote->ID);	
							$location = get_field('location', $quote->ID);	
							$quote = get_field('quote', $quote->ID);
							
							if ($feed_counter % 2 != 0) {
							$pointer = "pointer-left";	
							} else {
							$pointer = "pointer-right";		
							}	
							
							?>
							<blockquote id="quote-<?php echo $feed_counter ; ?>" class="<?php echo $pointer; ?>">
								<p class="quote text-center"><i class="fa fa-quote-left"></i> <?php echo $quote ; ?> <i class="fa fa-quote-right"></i></p> 
								<p class="name-location text-center"><?php echo $name ; ?> <br><?php echo $location ; ?></p>	
							</blockquote>
							<?php endforeach; ?>
						
						<a href="mailto:info@tlwsolicitors.co.uk?subject=TLW client feedback" class="icon-btn clearfix" title="Send us your feedback">
							<i class="fa fa-bullhorn fa-lg icon"></i> Send us your feedback <i class="fa fa-angle-right fa-lg"></i>
						</a>
					
					</section>
					<!-- TEAM PROFILES SECTION -->
					
					<?php } ?>

				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
				<?php get_sidebar('company'); ?>
				
			</div>
			
		</article>
		
</main>

		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
