<aside class="sidebar single col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-pull-8 col-md-offset-0 col-lg-4 col-lg-pull-8 col-lg-offset-0">
<?php 
global $show_feat_img;
global $feat_img_options;
$add_form = get_field('add_form');
 ?>

<?php if ($show_feat_img &&  $feat_img_options == 'sidebar') { ?>

<?php if (has_post_thumbnail()) { 
$img_atts = array('class'	=> "img-responsive");
$thumb_id = get_post_thumbnail_id($post->ID);
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
<figure class="feat-img hidden-xs hidden-sm">
<?php the_post_thumbnail( 'feat-img', $img_atts ); ?>

<?php if ($thumb_caption) { ?>
<figcaption class="feat-img-caption"><?php echo $thumb_caption; ?></figcaption>
<?php } ?>
</figure>

<?php }  ?>

<?php }  ?>

<?php 
if ($add_form) {	
$form = get_field('form');
?>
<div class="contact-form sb-form-left">
		
	<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		
	<?php gravity_form($form->id, false, true, false, null, true); ?>
					
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
</aside>