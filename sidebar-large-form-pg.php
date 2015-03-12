<?php
if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
$parent = get_post($post_ID);	
	
	if ($parent->post_parent != 0) {	
	$grand_parent = get_post($parent->post_parent);	
	$post_ID = $parent->post_parent;
	}
}	
$page_links = get_field('page_links');
$form = get_field('form');

$child_args = array(
'sort_column' => 'menu_order',
'echo' => 0,
'child_of'	=> $post_ID,
'title_li'	=> ''
); 
$children = wp_list_pages($child_args);

//echo '<pre>';print_r($children);echo '</pre>';
?>

<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">

 	<ul class="list-unstyled tab-links sb-links">
	
	 <li class="active-parent<?php echo ($post->post_parent == 0) ? ' active-page':''; ?>"><a href="<?php echo get_permalink($post_ID); ?>"><?php echo get_the_title($post_ID); ?></a></li>
	 <?php if (!empty($children)) { ?>
	 	<?php echo $children; ?>	
	 <?php } ?>
 	
 	<?php if (empty($children) && $page_links) { ?>
	<?php foreach ($page_links as $page_link) { ?>
	
		<li>
			<a href="<?php echo get_permalink($page_link['page']->ID); ?>" class="no-icon" title="<?php echo $page_link['page']->post_title; ?>"><?php echo $page_link['page']->post_title; ?></a>
		</li>
	
	<?php } ?>
	<?php } ?>
	
	</ul>
	
	<a href="#contact-us-today" class="side-link caps scroll-to"><i class="fa fa-life-ring fa-lg"></i> Contact us Today</a>

	
</aside>
