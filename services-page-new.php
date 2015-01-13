<?php 
/*
Template Name: Services page v2 template
*/
 ?>

<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$freephone_num = get_field('freephone_num', 'option');
$intro = get_field('intro');
$page_icon = get_field('page_icon');
$brochure = get_field('brochure');
$color = get_field('page_colour');
//echo '<pre>';print_r($brochure);echo '</pre>';
?>	
<!-- PAGE TOP SECTION -->
<main class="<?php echo (!empty($color)) ? ' page-col-'.$color : 'red'; ?>">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
					
					<figure class="feat-img-wide">
					<?php add_wide_feat_img($post) ; ?>
					</figure>
					
					<div class="entry">
						
						<h2><?php the_title(); ?></h2>
						
						<?php the_content(); ?>
						
						<?php if (!empty($brochure)) { ?>
						<a href="<?php echo $brochure ; ?>" target="_blank" class="download-link" title="Download our Brochure"><i class="fa fa-download"></i> Download our Brochure</a>
						<?php } ?>
						
						 <p class="tel-num"><i class="fa fa-mobile"></i> Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
					
					</div>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
				<?php get_sidebar('services'); ?>
				
			</div>
			
		</article>
		
</main>
<!-- PAGE TOP SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
