<?php 
/*
Template Name: Services page template
*/
 ?>

<?php get_header(); ?>

<?php
if ($post->post_parent != 0) {
$post_ID = $post->post_parent;
} else {
$post_ID = $post->ID;	
} 	

$child_args = array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post_ID,
	'post_type' => 'page'
); 
$children = get_pages($child_args); 

if ($post->post_parent != 0) {
$active_child = $post;
$current_post = $post;
$args = array();
$args['page_id'] = $post->post_parent;
$wp_query = new WP_Query( $args );
} else {
$active_child = $children[0];	
$current_post = $post;
}

$freephone_num = get_field('freephone_num', 'option');
?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$page_icon = get_field('page_icon');
$brochure = get_field('brochure');
$color = get_field('page_colour');
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
				<a href="<?php echo $brochure ; ?>" target="_blank" class="download-link" title="Download our Brochure">Download our Brochure <i class="fa fa-download"></i></a>
				<?php } ?>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
			</div>
			
		</article>
		
</section>
<!-- PAGE TOP SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php if ($children) { 
$contact_page = get_page_by_title("Contact us");
?>

<!-- PAGE CONTENT SECTION -->

<section class="page-content<?php echo (!empty($color)) ? ' page-col-'.$color : ''; ?>">

	<div class="row">
	
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
			<ul class="list-unstyled tab-links row">
			<?php foreach ($children as $child) { 
			
			if ($current_post->post_parent != 0) {
			$current_id = $current_post->ID;
			$url = get_permalink($child->ID);	
			$tab_toggle = false;

			} else {
			$current_id = $active_child->ID;
			$tab_toggle = true;
			$url = '#'.$child->post_name."-panel";	
			$tracking = true;
			}	

			?>
			
			<li class="col-xs-12 col-sm-12 col-md-12 col-lg-12<?php echo ($current_id == $child->ID) ? ' active':''; ?>">
					<a href="<?php echo $url; ?>"<?php echo ($tab_toggle) ? ' data-toggle="tab"': ''; ?><?php echo ($tracking) ? " onclick=\"_gaq.push(['_trackEvent', 'tab','clicked', '".$child->post_title."'])\" ": ""; ?> class="no-icon" title="<?php echo $child->post_title; ?>"><?php echo $child->post_title; ?><i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>
				</li>
			
			<?php } ?>
			</ul>
		</aside>
		
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-8 col-lg-offset-0">
			
			<div class="tab-content clearfix">
			
			<?php if (isset($active_child) && $current_post->post_parent != 0) : 
			$page_content_raw = $active_child->post_content;
			$page_content = apply_filters('the_content', $page_content_raw );
			$sub_intro = get_field('intro', $active_child->ID);
			?>
			
			<article class="page tabs-panel" id="<?php echo $post->post_name; ?>-panel">
			
				<h3 class="icon-header" style="margin-top: 0px;">
				<?php if (isset($page_icon)) { ?>
				<i class="fa <?php echo $page_icon; ?> fa-lg"></i> 
				<?php } ?>
				<?php echo $active_child->post_title; ?>
				</h3>
				
				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
					
					<?php if (isset($sub_intro)) : ?>
						<p class="intro"><?php echo $sub_intro ; ?></p>
					<?php endif; ?>
					
					<?php echo $page_content; ?>
						<a href="<?php echo get_permalink($contact_page->ID) ; ?>?service=<?php echo $post->post_name; ?>&amp;service-type=<?php echo $active_child->post_name; ?>#make-a-claim" title="Make a claim enquiry" class="icon-btn col-xs-12 col-sm-12 col-md-7 col-lg-7">
						<i class="fa fa-check fa-lg icon"></i> Make a claim enquiry <i class="fa fa-angle-right fa-lg"></i>
						</a>
						
					</div>
					
				</div>
				
			</article>
			
			<?php else : ?>
			
			<?php foreach ($children as $post) : 
			setup_postdata($post);
			$sub_intro = get_field('intro');
			$parent = get_page($post->post_parent);
			$service = str_replace(" ", "+", $parent->post_title);
			$service_area = str_replace(" ", "+", $post->post_title);
			?>
	
			<article class="page tab-pane tabs-panel fade<?php echo ($post->ID == $active_child->ID) ? ' in active':''; ?>" id="<?php echo $post->post_name; ?>-panel">
				
				<h3 class="icon-header" style="margin-top: 0px;">
				<?php if (isset($page_icon)) { ?>
				<i class="fa <?php echo $page_icon; ?> fa-lg"></i> 
				<?php } ?>
				<?php the_title(); ?>
				</h3>
				
				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
					
					<?php if (isset($sub_intro)) { ?>
					<p class="intro"><?php echo $sub_intro ; ?></p>
					<?php } ?>
					
					<?php the_content(); ?>
					
						<a href="<?php echo get_permalink($contact_page->ID) ; ?>?service=<?php echo $service; ?>&amp;service-area=<?php echo $service_area; ?>#make-a-claim" title="Make a claim enquiry" class="icon-btn col-xs-12 col-sm-12 col-md-7 col-lg-7">
						<i class="fa fa-check fa-lg icon"></i> Make a claim enquiry <i class="fa fa-angle-right fa-lg"></i>
						</a>
						
					</div>
				
				</div>
				
			</article>
			
			<?php endforeach;
			wp_reset_postdata();
			 ?>
	
			<?php endif; ?>
			
			</div>	
			
			 <p class="tel-num"><i class="fa fa-mobile"></i> Or call us free on <span><a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="_gaq.push(['_trackEvent', 'Lead', 'ClickToCall']);" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
			
		</div><!-- End Col -->
		
	</div><!-- End Row -->

</section>

<!-- PAGE CONTENT SECTION -->


<?php } ?>

<?php get_footer(); ?>
