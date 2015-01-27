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
$form_array = array('enquiry-type' => $post->post_title);
} else {
$parent = get_post($post_ID);	

array_unshift($children, $parent);
$form_array = array('enquiry-type' => $parent->post_title, 'service-area' => $post->post_title);

if ($parent->post_parent != 0) {	
$grand_parent = get_post($parent->post_parent);	
//echo '<pre>';print_r($parent);echo '</pre>';
$form_array = array('enquiry-type' => $grand_parent->post_title, 'service-area' => $parent->post_title);
}

}	

$radio_ads_active = get_field('radio_adverts_active', 'option');
//echo '<pre>';print_r($radio_ads_active );echo '</pre>';

if ($radio_ads_active) {
$radio_ads_title = get_field('radio_adverts_title', 'option');	
$radio_ads = get_field('radio_adverts', 'option');	
$r_ads = array();
$radio_stations = get_field('radio_stations', 'option');
	
	//echo '<pre>';
	foreach ($radio_ads as $radio_ad) {
		
		if ($radio_ad['advert_service'] == $post->ID) {
			array_push($r_ads, $radio_ad);
		}
	//print_r($radio_ad);
	//echo '<br>';
	} 
	//echo '</pre>';
}
//echo '<pre>';print_r($radio_ads);echo '</pre>';
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
		
		<?php gravity_form($form->id, false, true, false, $form_array, true); ?>
					
	</div>	
	
	<?php endif; ?>
	
	<?php if ($radio_ads_active && !empty($r_ads)) : ?>
	<div class="sb-radio-adverts">
		<h3 class="icon-header"><i class="fa fa-microphone fa-lg"></i><?php echo $radio_ads_title; ?></h3>
		
		<div class="sb-audio-player">
			<?php foreach ($r_ads as $radio_ad) { ?>
			<dl>
				<dt><?php echo $radio_ad['advert_title']; ?></dt>
				<dd><?php echo do_shortcode('[sc_embed_player_template1 fileurl="'.$radio_ad['advert_file']  .'"]'); ?></dd>
			</dl>
			<?php } ?>
			
			<?php if (count($radio_stations) > 0) { ?>
			<div class="logos">
			<?php foreach ($radio_stations as $radio_station) { ?>
				<figure class="img-logo">
					<a href="http://<?php echo $radio_station['station_url']; ?>" target="_blank" title="Go to <?php echo $radio_station['station_logo']['alt']; ?> website">
						<img src="<?php echo $radio_station['station_logo']['sizes']['thumbnail']; ?>" alt="<?php echo $radio_station['station_logo']['alt']; ?>">
					</a>
				</figure>
			<?php } ?>
			</div>
			<?php } ?>

		</div>
	</div>
	<?php endif; ?>
	
</aside>