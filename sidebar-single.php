<?php if (has_post_thumbnail()) { 
$img_atts = array('class'	=> "img-responsive");
$thumb_id = get_post_thumbnail_id($post->id);
$thumb_args = array(
	'p' => $thumb_id,
	'posts_per_page' => 1,
	'post_type' => 'attachment',
	'include'	=> $thumb_id
	);
$thumb_image = get_posts($thumb_args);
if ($thumb_image[0]->post_excerpt) {
$thumb_caption = $thumb_image[0]->post_excerpt;	
}
if ($thumb_image[0]->post_content) {
$thumb_caption = $thumb_image[0]->post_content;	
}
?>
<div class="feat-img hidden-xs hidden-sm">
<?php the_post_thumbnail( 'feat-img', $img_atts ); ?>

<!--
<?php if ($thumb_caption) { ?>
	<p class="thumb-caption"><?php echo $thumb_caption; ?></p>
<?php } ?>
-->
</div>

<?php }  ?>

<?php 
$post_categories = get_the_category_list();
//echo '<pre>';print_r($post_categories);echo '</pre>';

if ($post_categories) { ?>

<?php echo $post_categories; ?>

<?php } ?>

<a href="<?php bloginfo('rss2_url'); ?>" class="icon-btn clearfix" title="Subscribe to our news feed" target="_blank" style="margin-top: 0px; margin-bottom: 30px;">
	<i class="fa fa-rss fa-lg icon"></i> TLW news feed <i class="fa fa-angle-right fa-lg"></i>
</a>

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