<div class="col-xs-12 col-sm-6">
				
	<h3><i class="icon fa fa-cogs fa-lg"></i>Services</h3>
	
	<?php foreach ($practices as $practice) { ?>
	
	<?php 
	$icon = get_field('page_icon', $practice->ID);
	
	if (!empty($icon)) {
	$icon_tag = '<i class="icon fa '.$icon.'"></i>';	
	}
	
	$practice_args = array(
	'posts_per_page' => -1,
	'post_type'		=> 'page',
	'orderby'		=> 'menu_order',
	'post_parent'	=> $practice->ID,
	'order'			=> 'ASC'
	);
	
	$practice_children = get_posts($practice_args);
	 ?>
	
		<div class="list-block">
			<h4><a href="<?php echo get_permalink($practice->ID); ?>"><?php echo ($icon_tag) ? $icon_tag: ''; ?><?php echo $practice->post_title; ?><i class="fa fa-angle-right fa-lg"></i></a></h4>
			
		<?php if ($practice_children) { ?>
			<ul class="list-unstyled">
			
			<?php foreach ($practice_children as $practice_child) { 
			$gc_args = array(
			'posts_per_page' => -1,
			'post_type'		=> 'page',
			'orderby'		=> 'menu_order',
			'post_parent'	=> $practice_child->ID,
			'order'			=> 'ASC'
			);
			$practice_gchildren = get_posts($gc_args);
			?>
			<li><a href="<?php echo get_permalink($practice_child->ID); ?>"><?php echo get_the_title($practice_child->ID); ?></a></li>
				<?php if ($practice_gchildren) { ?>
					<?php foreach ($practice_gchildren as $g_child) { ?>
					<li><a href="<?php echo get_permalink($g_child->ID); ?>"><?php echo get_the_title($g_child->ID); ?></a></li>
					<?php } ?>
				<?php } ?>
			<?php } ?>
			
		<?php } ?>
		
			</ul>
		
		</div>
	
	<?php } ?>
					
</div>