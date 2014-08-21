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
//echo '<pre>';print_r($brochure);echo '</pre>';
?>	
<!-- PAGE TOP SECTION -->
<section class="page-top<?php echo (!empty($color)) ? ' page-col-'.$color : ''; ?>">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
				</div>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h2><?php the_title(); ?></h2>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
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

<section class="page-content<?php echo (!empty($color)) ? ' page-col-'.$color : ''; ?>">

	<div class="row">
	
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
			<ul class="list-unstyled tab-links row">
			<?php foreach ($children as $child) { 
			$url = get_permalink($child->ID);	
			?>
			
			<li class="col-xs-12 col-sm-12 col-md-12 col-lg-12<?php echo ($post->ID == $child->ID) ? ' active':''; ?>">
					<a href="<?php echo $url; ?>" class="no-icon" title="<?php echo $child->post_title; ?>"><?php echo $child->post_title; ?><i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>
				</li>
			
			<?php } ?>
			</ul>
		</aside>
		
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-8 col-lg-offset-0">
			
			<div class="contact-form">
			
			<h3 class="icon-header" style="margin-top: 0px;">
				<i class="fa fa-phone fa-lg"></i> 
				Request a callback
			</h3>
			
			<?php if ($form) : ?>
			
			<?php gravity_form($form->id, false, false, false, null, true); ?>
			
			<?php endif; ?>
			
			</div>	
			
			 <p class="tel-num"><i class="fa fa-mobile"></i> Or call us free on <span>0800 169 5925</span></p>
			
		</div><!-- End Col -->
		
	</div><!-- End Row -->

</section>

<!-- PAGE CONTENT SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
