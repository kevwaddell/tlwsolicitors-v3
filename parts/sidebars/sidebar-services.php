<?php
if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
}
	
$form = get_field('form');
$form_active = get_field('form_activated');

//echo '<pre>';print_r($form_active);echo '</pre>';
 
if ($post->post_parent == 0) {
$form_array = array('enquiry-type' => $post->post_title);
} else {
$parent = get_post($post_ID);	
$form_array = array('enquiry-type' => $parent->post_title, 'service-area' => $post->post_title);

	if ($parent->post_parent != 0) {	
	$grand_parent = get_post($parent->post_parent);	
	$form_array = array('enquiry-type' => $grand_parent->post_title, 'service-area' => $parent->post_title);
	}

}	

$child_args = array(
'sort_column' => 'menu_order',
'echo' => 0,
'child_of'	=> $post_ID,
'title_li'	=> ''
); 
$children = wp_list_pages($child_args);

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
//echo '<pre>';print_r($children);echo '</pre>';
?>

<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
	
	<?php if ($form_active) : ?>
	<div class="contact-form sb-form-right">
		
		<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		
		<?php gravity_form($form->id, false, true, false, $form_array, true); ?>
					
	</div>	
	
	<?php endif; ?>
		
	<ul class="list-unstyled tab-links sb-links">
		
		<li class="active-parent<?php echo ($post->post_parent == 0) ? ' active-page':''; ?>"><a href="<?php echo get_permalink($post_ID); ?>"><?php echo get_the_title($post_ID); ?></a></li>
		
		<?php if (!empty($children)) { ?>
		<?php echo $children; ?>	
		<?php } ?>
	
	</ul>
	
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