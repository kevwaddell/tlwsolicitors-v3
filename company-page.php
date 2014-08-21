<?php 
/*
Template Name: Company page template
*/
 ?>

<?php get_header(); ?>

<?php
if ($post->post_parent != 0) {
$post_ID = $post->post_parent;
} else {
$post_ID = $post->ID;	
}

$news_page = get_page_by_title("News");
$freephone_num = get_field('freephone_num', 'option');

$extra_child_args =  array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post_ID,
	'include'	=> array(18, 22),
	'post_type' => 'page'
); 	
$extra_children = get_pages($extra_child_args); 

$child_args = array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post_ID,
	'exclude'	=> array(18, 22),
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

?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
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
		
<?php endwhile; ?>
<?php endif; ?>

<?php if ($children) { ?>
<!-- PAGE CONTENT SECTION -->

<section class="page-content">
		
		<div class="row">
		
			<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
				<ul class="list-unstyled tab-links">
				<?php foreach ($children as $child) { 
				
				$page_icon = get_field('page_icon', $child->ID);
				$exclude = array(18, 22);
				
				if (!empty($page_icon)) {
				$icon = '<i class="fa '.$page_icon.' fa-lg icon"></i>';
				} else {
				$icon = "";		
				}
				
				if ($current_post->post_parent != 0) {
				$current_id = $current_post->ID;
				$url = get_permalink($child->ID);	
				$tab_toggle = false;
	
				} else {
				$current_id = $active_child->ID;
				$tab_toggle = true;
				$url = '#'.$child->post_name.'-panel';	
				$tracking = true;
				}	
				
				?>
				
				<li<?php echo ($current_id == $child->ID) ? ' class="active"':''; ?>>
					<a href="<?php echo $url; ?>"<?php echo ($tab_toggle) ? ' data-toggle="tab"': ''; ?><?php echo ($tracking) ? " onclick=\"_gaq.push(['_trackEvent', 'tab','clicked', '".$child->post_title."'])\" ": ""; ?> title="<?php echo $child->post_title; ?>"><?php echo $icon; ?><span><?php echo $child->post_title; ?></span><i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>
				</li>
				
				<?php } ?>
				
				<?php if ($news_page) { 
				$page_icon = get_field('page_icon', $news_page->ID);
				
				if (isset($page_icon)) {
				$icon = '<i class="fa '.$page_icon.' fa-lg icon"></i>';
				}
				?>
				<li>
					<a href="<?php echo get_permalink($news_page->ID); ?>" title="Latest <?php echo $news_page->post_title; ?>"><?php echo ($icon) ? $icon : ""; ?><span>TLW <?php echo $news_page->post_title; ?></span><i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>
				</li>
				<?php } ?>
				
				<?php if ($extra_children) { ?>
					<?php foreach ($extra_children as $extra_child) { 
					$page_icon = get_field('page_icon', $extra_child->ID);
					
					if (isset($page_icon)) {
					$icon = '<i class="fa '.$page_icon.' fa-lg icon"></i>';
					}
					
					?>
					<li>
					<a href="<?php echo get_permalink($extra_child->ID); ?>" title="<?php echo ($extra_child->post_title == "News") ? "Latest ":""; ?><?php echo $extra_child->post_title; ?>"><?php echo ($icon) ? $icon : ""; ?><span><?php echo ($extra_child->post_title == "News") ? "Latest ":""; ?><?php echo $extra_child->post_title; ?></span><i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>
					</li>
					<?php } ?>
				<?php } ?>
				
				</ul>
			</aside>
			
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-8 col-lg-offset-0">
				
				<div class="tab-content">
				
				<?php if (isset($active_child) && $current_post->post_parent != 0) : 
				$page_content_raw = $active_child->post_content;
				$page_content = apply_filters('the_content', $page_content_raw );
				$sub_intro = get_field('intro', $active_child->ID);
				$page_icon = get_field('page_icon', $active_child->ID);
				$rel_pages = get_field('page_links', $active_child->ID);
				//echo '<pre>';print_r($rel_pages);echo '</pre>';
				?>
				
				<article class="page tabs-panel" id="<?php echo $active_child->post_name; ?>-panel">
				
					<h3 class="icon-header">
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
						
						<?php if (isset($rel_pages)) { ?>
							
							<?php foreach ($rel_pages as $rel_page) { 
								
								if ($rel_page['link_title']) {
								$title = $rel_page['link_title'];
								} else {
								$title = $rel_page['page']->post_title;		
								}
								
								$icon = get_field('page_icon', $rel_page['page']->ID);
							?>
							
							<div class="clearfix">
								<a href="<?php echo get_permalink($rel_page['page']->ID) ; ?>" title="<?php echo $title; ?>" class="icon-btn clearfix col-xs-12 col-sm-12 col-md-7 col-lg-7"><?php if ($icon) { ?><i class="fa <?php echo $icon; ?> fa-lg icon"></i><?php } ?><?php echo $title; ?><i class="fa fa-angle-right fa-lg"></i></a>
							</div>
							<?php } ?>
							
						<?php } ?>
						
						<?php if ($active_child->post_name == "company-profile") { ?>
						 <p class="tel-num"><i class="fa fa-mobile"></i> Or call us free on <span><a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="_gaq.push(['_trackEvent', 'Lead', 'ClickToCall']);" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
						<?php }  ?>
						
						</div>
					
					</div>
					
				</article>
				
				<?php else : ?>
				
				<?php foreach ($children as $post) : 
				setup_postdata($post);
				$sub_intro = get_field('intro');
				$page_icon = get_field('page_icon');
				$rel_pages = get_field('page_links');
				?>
		
				<article class="page tab-pane tabs-panel fade<?php echo ($post->ID == $active_child->ID) ? ' in active':''; ?>" id="<?php echo $post->post_name; ?>-panel">
					
					<h3 class="icon-header">
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
						
						<?php if (isset($rel_pages)) { ?>
							
							<?php foreach ($rel_pages as $rel_page) { 
								
								if ($rel_page['link_title']) {
								$title = $rel_page['link_title'];
								} else {
								$title = $rel_page['page']->post_title;	
								}
								
								$icon = get_field('page_icon', $rel_page['page']->ID);
							?>
							<div class="clearfix">
								<a href="<?php echo get_permalink($rel_page['page']->ID) ; ?>" title="<?php echo $title; ?>" class="icon-btn clearfix col-xs-12 col-sm-12 col-md-7 col-lg-7">
								<?php if ($icon) { ?>
								<i class="fa <?php echo $icon; ?> fa-lg icon"></i>
								<?php } ?>
								<?php echo $title; ?>
								<i class="fa fa-angle-right fa-lg"></i>
								</a>
							</div>
							
							<?php } ?>
							
						<?php } ?>
						
						<?php if ($post->post_name == "company-profile") { ?>
						 <p class="tel-num"><i class="fa fa-mobile"></i> Or call us free on <span><a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="_gaq.push(['_trackEvent', 'Lead', 'ClickToCall']);" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
						<?php }  ?>
						
						</div>
					
					</div>
					
				</article>
				
				<?php endforeach;
				wp_reset_postdata();
				 ?>
					
				<?php endif; ?>
				</div>	
				
			</div>
		
		</div>

</section>

<!-- PAGE CONTENT SECTION -->
<?php } ?>

<?php get_footer(); ?>
