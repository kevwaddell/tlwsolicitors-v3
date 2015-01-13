<?php 
$contact_page = get_page_by_title('Contact us');
$motoring_offences_id = get_page_id("motoring-law");
$services_args = array(
'sort_column' => 'menu_order',
'include'	=> array(26,29,33,31,$motoring_offences_id),
'post_type' => 'page'
);

$services = get_pages($services_args);
$form = get_field('form');

$services_selects_args = array(
'sort_column' => 'menu_order',
'include'	=> array(26,29,33,31),
'post_type' => 'page'
);

$services_selects = get_pages($services_selects_args);
/* echo '<pre>';print_r($services);echo '</pre>'; */

$feedback_args = array(
	'posts_per_page'   => 6,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quotes = get_posts($feedback_args); 

$campaigns_active = get_field('campaigns_active', 'options');

//echo '<pre>';print_r($feedback_quotes);echo '</pre>';

?>
