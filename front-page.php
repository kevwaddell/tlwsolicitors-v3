<?php get_header(); ?>
<?php 
$contact_page = get_page_by_title('Contact us');
$services_args = array(
'sort_column' => 'menu_order',
'include'	=> array(24,26,29,31,33,35),
'post_type' => 'page'
);

$services = get_pages($services_args);
$form = get_field('form');
/* echo '<pre>';print_r($services);echo '</pre>'; */

$feedback_args = array(
	'posts_per_page'   => 6,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quotes = get_posts($feedback_args); 

//echo '<pre>';print_r($feedback_quotes);echo '</pre>';

?>
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	

<?php if ($services) { ?>

<section id="service-links">
		
		<h2 class="text-center">Which service do you require?</h2>
		
			<div class="row">
			<?php foreach ($services as $service) { 
			$icon = get_field('page_icon', $service->ID);
			$color = get_field('page_colour', $service->ID);
			$title_split = explode(" ", $service->post_title);
			$title = implode("<br> ", $title_split);
			if (count($title_split) == 3) {
			$title = str_replace("<br>","" , $title);
			}
			?>
				<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
					<a href="<?php echo get_permalink($service->ID); ?>" title="<?php echo $service->post_title; ?>" class="service-link <?php echo $color; ?>">
						<i class="fa <?php echo $icon; ?> fa-2x icon"></i>
						<?php echo $title; ?>
						<i class="fa fa-angle-right"></i>
						<span>See more</span>
					</a>
				</div>
			<?php } ?>
			</div>

</section>

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
			?>
			<select name="service-area" class="service-area-select" id="<?php echo $service->post_name; ?>-select" tabindex="2">
				<option value="General enquiry">Select a service area</option>
				<?php foreach ($services_areas as $services_area) { ?>
				<option value="<?php echo $services_area->post_title; ?>"><?php echo $services_area->post_title; ?></option>
				<?php } ?>
			</select>
			<?php } ?>
						
			<form id="enqiry-form" action="<?php echo get_permalink($contact_page->ID); ?>#make-a-claim" method="get">
				<input type="hidden" name="service" value="General enquiry">
				<input type="hidden" name="service-area" value="General enquiry">
				<input class="submit-btn" type="submit" value="Start">
			</form>
			
		</div>
	</div>
	
</section>

<?php }  ?>

<?php if ($feedback_quotes) { ?>
<div id="feedback-section">
	
	<div id="feedback-carousel" class="carousel slide">
			
		<div class="carousel-inner">
		
		<?php foreach ($feedback_quotes as $quote) { 
		$feedback_counter++;
		$quote_txt = get_field('quote', $quote->ID);	
		$client_name = get_field('client_name', $quote->ID);		
		$location = get_field('location', $quote->ID);	
		?>
			<div class="quote item <?php echo ($feedback_counter == 1) ? " active":""; ?>">
				<blockquote class="text-center"><i class="fa fa-quote-left"></i> <?php echo $quote_txt; ?> <i class="fa fa-quote-right"></i></blockquote>
				
				<p class="text-center"><?php echo $client_name; ?>, <?php echo $location; ?></p>
			</div>
		<?php } ?>
	
		</div>
		
	</div>

</div>
<?php }  ?>


<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
