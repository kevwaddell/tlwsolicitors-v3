<?php if ($campaigns_active) { 
$campaigns = get_field('campaigns', 'options');	
$radio_ads_active = get_field('radio_adverts_active', 'option');
$radio_ads_title = get_field('radio_adverts_title', 'option');	
$radio_ads = get_field('radio_adverts', 'option');	
$radio_stations = get_field('radio_stations', 'option');
$campaigns_total = count($campaigns);
$cols = 12/$campaigns_total;
//echo '<pre>';print_r($radio_ads);echo '</pre>';
?>
<!-- OUR LATEST CAMPAIGNS -->
<div id="hp-campaigns">
	<?php if ($campaigns_total <= 2) { ?>
	<div class="row">
		<div class="col-md-4">
			<div class="header text-center"><i class="fa fa-comment fa-lg"></i> Our Latest Campaigns</div>
		</div>
		<div class="col-md-8">
			<?php if ($campaigns_total < 2) { 
			$service = get_post($campaign[0]['service']);
			?>
			<a href="<?php echo get_permalink($service->ID); ?>" class="btn btn-default btn-block hp-campaign-link"><?php echo $service->post_title; ?></a>
			<?php } else { ?>
			
			<div class="row">
				<?php foreach ($campaigns as $campaign) { 
				$service = get_post($campaign['service']);	
				?>
				<div class="col-md-<?php echo $cols; ?>">
					<a href="<?php echo get_permalink($service->ID); ?>" class="btn btn-default btn-block hp-campaign-link"><?php echo $service->post_title; ?></a>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } else { ?>
	
	<div class="header full-width text-center">
		<i class="fa fa-comment fa-lg"></i> Our Latest Campaigns
	</div>
	
	<div class="hp-campaign-links">
		<?php foreach ($campaigns as $campaign) { ?>
			<a href="<?php echo get_permalink($campaign->ID); ?>" class="btn btn-default btn-block hp-campaign-link"><?php echo $campaign->post_title; ?></a>
		<?php } ?>
	</div>
	
	<?php } ?>
	
	<?php if ($radio_ads_active) { ?>
	<a name="radio-player" id="radio-player"></a>
	<div class="radio-adverts">
		<a href="#radio-player" id="call-2-action-radio" disabled="disabled" class="btn btn-default btn-block radio-campaign-link" title="<?php echo $radio_ads_title; ?>"><i class="fa fa-spinner fa-spin hidden-xs"></i><?php echo $radio_ads_title; ?></a>
		
		<div class="audio-files closed">
	
	<div class="audio-files-inner">
	
		<button id="close-audio-files" class="btn hidden-xs"><span class="sr-only">Close adverts</span><i class="fa fa-angle-double-up fa-lg"></i></button>

		<?php foreach ($radio_ads as $radio_ad) { ?>
		<dl>
			<dt><i class="fa fa-file-audio-o"></i> <?php echo $radio_ad['advert_title']; ?></dt>
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
		
	</div>
	<?php } ?>	
	
</div>
<?php } ?>
