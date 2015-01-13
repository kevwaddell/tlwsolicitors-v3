<div class="col-xs-12">
		
	<?php if ($subjects) { ?>
		<h3><?php echo ($news_page_icon) ? '<i class="icon fa '.$news_page_icon.' f-lg"></i>': ''; ?><?php echo $news_page->post_title; ?><i class="fa fa-angle-right fa-lg"></i>: Subjects</h3>
		
		<div class="list-block" style="text-transform: capitalize;">
			<?php wp_tag_cloud('smallest=14&largest=16&unit=px&separator= | '); ?>
		</div>
			
	<?php } ?>
	
</div>
