<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); 
$date = get_the_date('l - jS F - Y');	
$gallery_imgs = get_field('gallery_imgs');	
$show_feat_img = get_field('show_feat_img');
$show_author = get_field('show_author');
if ($show_feat_img) {
$feat_img_options = get_field('feat_img_options');
}
//echo '<pre>';print_r($animation_active);echo '</pre>';
?>	
<section class="page-content">
	
	<div class="row">
	
		<?php include (STYLESHEETPATH . '/_/inc/global/access-btns-single.php'); ?>
	
		<div class="col-xs-12 col-sm-10 col-sm-pull-1 col-sm-offset-1 col-md-7 col-md-push-3 col-md-offset-0 col-lg-7 col-lg-push-3 col-lg-offset-0">
	
			<article <?php post_class(); ?>>
				
				<header>
					<?php if ( $show_feat_img && $feat_img_options == 'wide') { ?>
					<?php if ( has_post_thumbnail() ) { 
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
						<figure class="feat-img-wide-post">
						<?php add_wide_feat_img($post) ; ?>
						
							<?php if ($thumb_caption) { ?>
							<figcaption class="feat-img-caption"><?php echo $thumb_caption; ?></figcaption>
							<?php } ?>
						</figure>
					<?php } ?>
					<?php } ?>
					<time class="date" datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar fa-lg"></i> <?php echo $date; ?></time>
				
					<h1 style="margin-top: 0px;"><?php the_title(); ?></h1>
				</header>
				
				<?php the_content(); ?>
				
				<?php if ($show_author) { ?>
				<p class="author">Posted by: <?php the_author(); ?></p>
				<?php } ?>
				
			</article>
	
		</div>
		
		<?php get_template_part( 'parts/sidebars/sidebar', 'single' ); ?>
		
	</div>

	
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
