<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); 
$date = get_the_date('l - jS F - Y');	
$gallery_imgs = get_field('gallery_imgs');	
?>	
<section class="page-content">
	
	<div class="row">
	
	<?php if (has_post_thumbnail() || $gallery_imgs) { ?>
	
		<?php include (STYLESHEETPATH . '/_/inc/global/access-btns-single.php'); ?>
	
		<div class="col-xs-12 col-sm-10 col-sm-pull-1 col-sm-offset-1 col-md-7 col-md-push-3 col-md-offset-0 col-lg-7 col-lg-push-3 col-lg-offset-0">
	
			<article <?php post_class(); ?>>
			
				<time class="date" datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar fa-lg"></i> <?php echo $date; ?></time>
				
				<h2 style="margin-top: 0px;"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
				
			</article>
	
		</div>
		
		<aside class="sidebar single col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-pull-8 col-md-offset-0 col-lg-4 col-lg-pull-8 col-lg-offset-0">
			
			<?php get_sidebar('single'); ?>
			
		</aside>
	
	<?php } else { ?>
		
	<?php $post_categories = get_the_category_list(); ?>
	
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
	
			<article <?php post_class(); ?>>
			
				<time class="date" datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar fa-lg"></i> <?php echo $date; ?></time>
				
				<h2 style="margin-top: 0px;"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
				
			</article>
			
			<?php if ($post_categories) { ?>
			<div class="topic-list">
				<?php echo $post_categories; ?>
			</div>
			<?php } ?>
			
			<div class="share-btns">
				<?php echo do_shortcode('[ssba]'); ?>
			</div>
	
	</div>	
	
	<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>		

	<?php } ?>
	
	</div>

	
</section>


<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
