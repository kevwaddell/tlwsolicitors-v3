<?php 
/*
Template Name: TLW Business home page
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$freephone_num = get_field('freephone_num', 'option');
$page_icon = get_field('page_icon');
$brochure = get_field('brochure');
$color = get_field('page_colour');
$hide_title = get_field('hide_title'); 
//echo '<pre>';print_r($brochure);echo '</pre>';
?>	
<!-- PAGE TOP SECTION -->
<main class="<?php echo (!empty($color)) ? ' page-col-'.$color : 'red'; ?>">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
					
					<?php if (has_post_thumbnail()) { ?>
					<figure class="feat-img-wide">
					<?php add_wide_feat_img($post) ; ?>
					</figure>
					<?php } ?>
					
					<div class="entry">
						
						<?php if ($hide_title != 1) { ?>
						<h1><?php the_title(); ?></h1>
						<?php } ?>
						
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
