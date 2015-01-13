<!-- CUSTOMER FEEDBACK -->
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