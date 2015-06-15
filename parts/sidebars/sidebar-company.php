<?php
if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
}	

$form = get_field('form');

$child_args = array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post_ID,
	'post_type' => 'page'
); 
$children = get_pages($child_args); 

if ($post->post_parent == 0) {
//$children = array_push($children, $post);
array_unshift($children, $post);
} else {
$parent = get_post($post_ID);	
array_unshift($children, $parent);

	if ($parent->post_parent != 0) {	
	$grand_parent = get_post($parent->post_parent);	
	//echo '<pre>';print_r($parent);echo '</pre>';
	}

}	

$custom_sat_active = get_field('custom_sat_active', 'option');
?>

<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
	<ul class="list-unstyled tab-links sb-links">
	
	<?php foreach ($children as $child) { ?>
	
		<li class="<?php echo ($post->ID == $child->ID) ? 'active ':''; ?><?php echo ($post->post_parent == $child->ID) ? 'active-parent ':''; ?><?php echo ($post->post_parent == $child->ID || $child->post_parent == 0) ? 'parent':''; ?>">
			<a href="<?php echo get_permalink($child->ID); ?>" class="no-icon" title="<?php echo $child->post_title; ?>"><?php echo $child->post_title; ?></a>
		</li>
	
	<?php } ?>
	</ul>
	
	<?php if ($form) : ?>
	<div class="contact-form sb-form-right">
		
		<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		
		<?php gravity_form($form->id, false, true, false, null, true); ?>
					
	</div>	
	
	<?php endif; ?>
	
	<?php if ($post->post_name == "why-choose-tlw" && $custom_sat_active) {
	$custom_sat_year = get_field('custom_sat_year', 'option');	
	$custom_sat_download = get_field('custom_sat_download', 'option');		
	?>
	<div class="striped-box">
		<div class="customer-sat-header">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/customer-satisfaction-header.png" alt="Customer satisfaction Client Care Feedback">
		</div>
		<div class="customer-sat-year">
			<?php echo $custom_sat_year; ?>
		</div>
		<a href="<?php echo $custom_sat_download; ?>" class="btn btn-default btn-block" target="_blank" title="View report"><i class="fa fa-pie-chart fa-lg"></i>View report</a>
	</div>
	<?php } ?>
	
</aside>