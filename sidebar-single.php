<?php if (has_post_thumbnail()) { 
$img_atts = array('class'	=> "img-responsive");
?>
<div class="feat-img hidden-xs hidden-sm">
<?php the_post_thumbnail( 'feat-img', $img_atts ); ?>
</div>

<?php }  ?>

<?php 
$post_categories = get_the_category_list();
//echo '<pre>';print_r($post_categories);echo '</pre>';

if ($post_categories) { ?>

<?php echo $post_categories; ?>

<?php } ?>

<?php 
$gallery_imgs = get_field('gallery_imgs');

if ($gallery_imgs) { 

//echo '<pre>';print_r($gallery_imgs);echo '</pre>';	
	
?>
<div class="sidebar-block">
	
	<h3>Image Gallery</h3>
	<ul class="list-unstyled img-links clearfix">
<?php foreach( $gallery_imgs as $gallery_img ): 
		if ($gallery_img['alt']) {
		$alt = $gallery_img['alt'];
		}	
		?>
		<li>
			<a href="<?php echo $gallery_img['sizes']['medium']; ?>" rel="fancybox" class="zoomable">
				<img src="<?php echo $gallery_img['sizes']['gallery-img']; ?>" class="img-responsive" width="<?php echo $gallery_img['sizes']['gallery-img-width']; ?>" height="<?php echo $gallery_img['sizes']['gallery-img-height']; ?>"<?php echo ($alt) ? ' alt="'.$alt.'"': ''; ?>>
			</a>
		</li>
<?php endforeach; ?>
	</ul>
</div>

<?php } ?>


<div class="share-btns">
	<?php echo do_shortcode('[ssba]'); ?>
</div>