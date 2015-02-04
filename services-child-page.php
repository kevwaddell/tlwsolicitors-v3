<?php 
/*
Template Name: Services child page template
*/
 ?>

<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$page_icon = get_field('page_icon');
$brochure = get_field('brochure');
$download_btn_title = get_field('btn_title');
$color = get_field('page_colour');
$form = get_field('form');
$parent = get_page($post->post_parent);
$main_email = get_field('main_email', 'option');
$freephone_num = get_field('freephone_num', 'option');
//echo '<pre>';print_r($parent);echo '</pre>';
?>	
<!-- PAGE TOP SECTION -->
<section class="page-top<?php echo (!empty($color)) ? ' page-col-'.$color : ''; ?>" style="padding-bottom: 0px;">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="sidebar hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
					
					<?php if ($main_email) { ?>
					<a href="mailto:<?php echo $main_email; ?>?subject=<?php the_title(); ?> Enquiry" class="side-link" title="Email TLW today"><?php echo $main_email; ?><i class="fa fa-envelope fa-lg"></i></a>
					<?php } ?>
					
					<a href="<?php echo get_permalink($parent->ID); ?>" class="side-link" title="Go to <?php echo $parent->post_title; ?> page"<?php echo ($main_email) ? ' style="margin-top: 1px"':''; ?>><?php echo $parent->post_title; ?><i class="fa fa-angle-right fa-lg"></i></a>
				</div>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h1><?php the_title(); ?></h1>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				<p class="tel-num"><i class="fa fa-mobile"></i> Call us free on <span><a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="_gaq.push(['_trackEvent', 'Lead', 'ClickToCall']);" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
				
				<?php if (!empty($brochure)) { ?>
				<a href="<?php echo $brochure ; ?>" target="_blank" class="download-link" title="<?php echo $download_btn_title; ?>"><?php echo $download_btn_title; ?> <i class="fa fa-download"></i></a>
				<?php } ?>
				
				<?php if ($main_email) { ?>
					<a href="mailto:<?php echo $main_email; ?>?subject=<?php the_title(); ?> Enquiry" class="side-link hidden-md hidden-lg" title="Email TLW today"><?php echo $main_email; ?><i class="fa fa-envelope fa-lg"></i></a>
					
				<?php } ?>
				
				<a href="<?php echo get_permalink($parent->ID); ?>" class="side-link hidden-md hidden-lg" title="Go to <?php echo $parent->post_title; ?> page"<?php echo ($main_email) ? ' style="margin-top: 10px"':''; ?>><?php echo $parent->post_title; ?><i class="fa fa-angle-right fa-lg"></i></a>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
			</div>
			
		</article>
		
</section>
<!-- PAGE TOP SECTION -->

		
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
