<?php 
$news_page_ID = get_option('page_for_posts');
$news_page = get_page($news_page_ID);

$topics_args = array(
	'orderby'            => 'meta_value',
	'hierarchical'       => 0,
	'title_li'           => "",
	'show_option_none'   => "",
	'echo'               => 0,
	'taxonomy'           => 'category',
	'exclude'		     => 1
	);
	
if (is_home()) {
$topics_args['current_category'] = 1;	
}

$topics = wp_list_categories($topics_args);
?>

<ul class="list-unstyled tab-links">
	<li class="cat-item<?php echo (is_home()) ? ' current-cat' : ''; ?>"><a href="<?php echo get_permalink($news_page_ID); ?>" title="View all posts filed under Latest <?php echo $news_page->post_title; ?>">Latest <?php echo $news_page->post_title; ?></a></li>
	<?php if ($topics) { ?>
	<?php echo $topics; ?>
	<?php }  ?>
</ul>



<?php include (STYLESHEETPATH . '/_/inc/sidebar/social-feed.php'); ?>