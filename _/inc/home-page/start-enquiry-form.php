<section id="enqiry-start-form" style="display: none;">
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
			
			<h3 class="text-center">Start your enquiry today</h3>
			<select name="service" id="service-select" tabindex="1">
				<option value="General enquiry">Please select a service</option>
				<?php foreach ($services as $service) { ?>
				<option value="<?php echo $service->post_title; ?>"><?php echo $service->post_title; ?></option>
				<?php } ?>
			</select>
			
			<?php foreach ($services as $service) { 
			
			$services_areas_args = array(
			'sort_column' => 'menu_order',
			'parent' => $service->ID,
			'post_type' => 'page'
			);
			
			$services_areas = get_pages($services_areas_args);
			//echo '<pre>';print_r($services_areas);echo '</pre>';
			if ($services_areas) {
			?>
			
			<select name="service-area" class="service-area-select" id="<?php echo $service->post_name; ?>-select" tabindex="2">
				<option value="General enquiry">Select a service area</option>
				<?php foreach ($services_areas as $services_area) { ?>
				<option value="<?php echo $services_area->post_title; ?>"><?php echo $services_area->post_title; ?></option>
				<?php } ?>
			</select>
			
			<?php } ?>
			
			<?php } ?>
						
			<form id="enqiry-form" action="<?php echo get_permalink($contact_page->ID); ?>#make-a-claim" method="get">
				<input type="hidden" name="service" value="General enquiry">
				<input type="hidden" name="service-area" value="General enquiry">
				<input class="submit-btn" type="submit" value="Start">
			</form>
			
		</div>
	</div>
	
</section>
