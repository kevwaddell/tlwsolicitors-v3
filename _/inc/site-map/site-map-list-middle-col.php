<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
	
	<?php if ($topics) { ?>
		<h3><a href="<?php echo get_permalink($news_page->ID); ?>"><?php echo ($news_page_icon) ? '<i class="icon fa '.$news_page_icon.' f-lg"></i>': ''; ?><?php echo $news_page->post_title; ?><i class="fa fa-angle-right fa-lg"></i></a></h3>
		
		<div class="list-block">
			<ul class="list-unstyled">
		<?php foreach ($topics as $topic) { ?>

				<li><a href="<?php echo get_category_link($topic->term_id); ?>"><?php echo $topic->name; ?></a></li>
			
		<?php } ?>
			</ul>
		</div>
			
	<?php } ?>

	
	<?php if ($subjects) { ?>
		<h3><?php echo ($news_page_icon) ? '<i class="icon fa '.$news_page_icon.' f-lg"></i>': ''; ?><?php echo $news_page->post_title; ?><i class="fa fa-angle-right fa-lg"></i>: Subjects</h3>
		
		<div class="list-block">
			<ul class="list-unstyled">
		<?php foreach ($subjects as $subject) { ?>

				<li><a href="<?php echo get_tag_link($subject->term_id); ?>"><?php echo $subject->name; ?></a></li>
			
		<?php } ?>
			</ul>
		</div>
			
	<?php } ?>
		
</div>