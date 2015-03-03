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
//$rss = 
?>

<a href="<?php bloginfo('rss2_url'); ?>" class="icon-btn clearfix" title="Subscribe to our news feed" target="_blank" style="margin-top: 0px; margin-bottom: 30px;">
	<i class="fa fa-rss fa-lg icon"></i> TLW news feed <i class="fa fa-angle-right fa-lg"></i>
</a>

<ul class="list-unstyled tab-links">
	
	<li class="cat-item<?php echo (is_home()) ? ' current-cat' : ''; ?>"><a href="<?php echo get_permalink($news_page_ID); ?>" title="View all posts filed under Latest <?php echo $news_page->post_title; ?>">Latest <?php echo $news_page->post_title; ?></a></li>
	<?php if ($topics) { ?>
	<?php echo $topics; ?>
	<?php }  ?>
</ul>

<?php include (STYLESHEETPATH . '/_/inc/sidebar/social-feed.php'); ?>