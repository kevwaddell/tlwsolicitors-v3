<?php 
$practices_args = array(
'post_type'		=> 'page',
'orderby'		=> 'menu_order',
'include'		=> array(24, 26, 29, 31, 33, 35),
'order'			=> 'ASC'
);

$practices = get_posts($practices_args);

//echo '<pre>';print_r($practices);echo '</pre>';

$company_page = get_page_by_title('About TLW');
$company_page_icon = get_field('page_icon', $company_page->ID);

$company_args = array(
'post_type'		=> 'page',
'orderby'		=> 'menu_order',
'post_parent'	=> $company_page->ID,
'order'			=> 'ASC',
'posts_per_page' => -1,
);

$company_pages = get_posts($company_args);

$rescources_args = array(
'post_type'		=> 'page',
'orderby'		=> 'title',
'include'		=> array(10, 95),
'order'			=> 'ASC'
);

$rescources_pages = get_posts($rescources_args);

$legal_page = get_page_by_title('Legal Notices');
$legal_page_icon = get_field('page_icon', $legal_page->ID);

$legal_args = array(
'post_type'		=> 'page',
'orderby'		=> 'menu_order',
'post_parent'	=> $legal_page->ID,
'order'			=> 'ASC'
);

$legal_pages = get_posts($legal_args);

$news_page_ID = get_option('page_for_posts');
$news_page = get_page($news_page_ID);
$news_page_icon = get_field('page_icon', $news_page->ID);

$topics_args = array(
	'type'			=> 'post',
	'hide_empty'	=> 0,
	'hierarchical'       => 0,
	'orderby'		=> 'meta_value',
	'order'			=> 'desc'
); 
$topics = get_categories($topics_args);

$subjects_args = array(
	'type'			=> 'post',
	'hide_empty'	=> 0,
	'parent'		=> 0,
	'orderby'		=> 'meta_value',
	'order'			=> 'desc'
); 
$subjects = get_tags($subjects_args);

//echo '<pre>';print_r($topics);echo '</pre>';

 ?>