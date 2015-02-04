<?php 
/*
Template Name: Services page with form template
*/
 ?>

<?php get_header(); ?>

<?php
$child_args = array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post->post_parent,
	'post_type' => 'page'
); 
$children = get_pages($child_args); 

?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$page_icon = get_field('page_icon');
$brochure = get_field('brochure');
$download_btn_title = get_field('btn_title');
$color = get_field('page_colour');
$form = get_field('form');
$main_email = get_field('main_email', 'option');
$freephone_num = get_field('freephone_num', 'option');
//echo '<pre>';print_r($main_email);echo '</pre>';
?>	
<!-- PAGE TOP SECTION -->
<section class="page-top<?php echo (!empty($color)) ? ' page-col-'.$color : ''; ?>" style="padding-bottom: 0px;">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<aside class="sidebar hidden-xs hidden-sm col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
										
					<button class="icon-header dropdown-head contact-head" data-toggle="collapse" data-target="#contact-us">Request a callback <i class="fa fa-phone fa-lg"></i></button>
		<div id="contact-us" class="collapse">
			
			<div class="contact-form">
					
					<?php if ($form) : ?>
					
					<?php gravity_form($form->id, false, false, false, null, true); ?>
					
					<?php endif; ?>
					
			</div>	

		</div>

					<?php if ($main_email) { ?>
					<a href="mailto:<?php echo $main_email; ?>?subject=<?php the_title(); ?> Enquiry" class="side-link" style="margin-bottom: 30px; margin-top: 0px;" title="Email TLW today"><?php echo $main_email; ?><i class="fa fa-envelope fa-lg"></i></a>
					<?php } ?>
					
					
					<ul class="list-unstyled tab-links">
					<?php foreach ($children as $child) { 
					$url = get_permalink($child->ID);	
					?>
					
					<li class="<?php echo ($post->ID == $child->ID) ? ' active':''; ?>">
							<a href="<?php echo $url; ?>" class="no-icon" title="<?php echo $child->post_title; ?>"><?php echo $child->post_title; ?><i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>
						</li>
					
					<?php } ?>
					</ul>

				</aside>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h1><?php the_title(); ?></h1>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				<p class="tel-num">To Find Out More About What You Could Claim Call Us Free On <i class="fa fa-mobile"></i>  <span><a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="_gaq.push(['_trackEvent', 'Lead', 'ClickToCall']);" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
				
				<?php if (!empty($brochure)) { ?>
				<a href="<?php echo $brochure ; ?>" target="_blank" class="download-link" title="<?php echo $download_btn_title; ?>"><?php echo $download_btn_title; ?> <i class="fa fa-download"></i></a>
				<?php } ?>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
			</div>
			
		</article>
		
</section>
<!-- PAGE TOP SECTION -->

<!-- PAGE CONTENT SECTION -->

<section class="hidden-md hidden-lg page-content<?php echo (!empty($color)) ? ' page-col-'.$color : ''; ?>" style="padding-top: 30px;">

	<div class="row">
			
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-8 col-lg-offset-0">
			
			<div class="contact-form" style="margin-bottom: 20px;">
			
			<h3 class="icon-header" style="margin-top: 0px; margin-bottom: 10px;">
				<i class="fa fa-phone fa-lg"></i> 
				Request a callback
			</h3>
			
			<?php if ($form) : ?>
			
			<?php gravity_form($form->id, false, false, false, null, true); ?>
			
			<?php endif; ?>
			
			</div>	

			
		</div><!-- End Col -->
		
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
						
			<a href="mailto:info@tlwsolicitors.co.uk?subject=<?php the_title(); ?> Enquiry" class="side-link" style="margin-bottom: 30px; margin-top: 0px;" title="Email TLW today">info@tlwsolicitors.co.uk<i class="fa fa-envelope fa-lg"></i></a>
			
			<ul class="list-unstyled tab-links" style="margin-bottom: 0px;">
			<?php foreach ($children as $child) { 
			$url = get_permalink($child->ID);	
			?>
			
			<li class="<?php echo ($post->ID == $child->ID) ? ' active':''; ?>">
					<a href="<?php echo $url; ?>" class="no-icon" title="<?php echo $child->post_title; ?>"><?php echo $child->post_title; ?><i class="fa fa-angle-right fa-lg"></i></a>
				</li>
			
			<?php } ?>
			</ul>
		</aside>
		
	</div><!-- End Row -->

</section>

<!-- PAGE CONTENT SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
