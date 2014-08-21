<?php get_header(); ?>

<?php

$news_page_id = get_option('page_for_posts');
$news_page = get_page($news_page_id);
//echo '<pre>';print_r($news_page);echo '</pre>';
$news_page_content_raw = $news_page->post_content;
$news_page_content = apply_filters('the_content', $news_page_content_raw );
$news_page_intro = get_field('intro', $news_page->ID);
$page_icon = get_field('page_icon', $news_page->ID);

?>

<!-- PAGE TOP SECTION -->

<?php if ($news_page) { ?>
<section class="page-top">
	
		<article class="page">
		
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($news_page) ; ?>
					</figure>
				</div>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h2 style="margin-top: 0px;"><?php echo $news_page->post_title; ?></h2>
				
				<?php if (isset($news_page_intro)) { ?>
				<p class="intro"><?php echo $news_page_intro ; ?></p>
				<?php } ?>
				
				<?php echo $news_page_content; ?>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
				
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-4 col-lg-7 col-lg-offset-4">
					<div id="search-form">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			
			
		</article>
		
</section>
<!-- PAGE TOP SECTION -->
<?php } ?>

<section class="page-content">

	<div class="row">
	
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
			<?php get_sidebar(); ?>
		</aside>
	
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-8 col-lg-offset-0">
			
			<h3 class="icon-header mag-bot-10 hidden-xs hidden-sm">
			<?php if (isset($page_icon)) { ?>
				<i class="fa <?php echo $page_icon; ?> fa-lg"></i> 
			<?php } ?>
			<?php single_cat_title(); ?>
			</h3>
			
			<?php if ( have_posts() ): ?>
			
			<div class="post-list">
			
				<div class="row">
						
					<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
					
					<div class="page-num hidden-xs hidden-sm">
					<?php wp_pagenavi(); ?>
					</div>
					
						<?php while ( have_posts() ) : the_post(); 
							$date = get_the_date('l - jS F - Y');
						?>	
					
						<?php if (has_post_thumbnail()) { 
							$img_atts = array('class'	=> "img-responsive");	
							?>
					
						<article <?php post_class(); ?>>
							<a href="<?php esc_url( the_permalink() ); ?>" title="View <?php the_title_attribute(); ?> article" rel="bookmark">
								<div class="row">
									
									<div class="hidden-xs col-sm-5 col-md-5 col-lg-4">
									 <?php the_post_thumbnail( 'post-list-img' , $img_atts); ?> 
									</div>
									
									<div class="colxs-12 col-sm-7 col-md-7 col-lg-8">
										<h4><?php the_title(); ?></h4>
										<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar"></i> <?php echo $date; ?></time>
										<?php the_excerpt(); ?>
									</div>
								
								</div> 
							</a>
						</article>
					
					
						<?php } else { ?>
						
						<article <?php post_class(); ?>>
							<a href="<?php esc_url( the_permalink() ); ?>" title="View <?php the_title_attribute(); ?> article" rel="bookmark">
								<h4><?php the_title(); ?></h4>
								<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar"></i> <?php echo $date; ?></time>
								<?php the_excerpt(); ?>
							</a>
						</article>
						
						<?php } ?>
		
						<?php endwhile; ?>
						
									
						<div class="page-links">
							<?php wp_pagenavi(); ?>
						</div>
										
					</div>
						
				</div>
			
			</div><!-- End List -->
			
			<?php else: ?>
			<h3 class="text-center">Sorry</h3>
			<p class="text-center">There is no <?php single_cat_title(); ?> at the moment.</p>
			<?php endif; ?>
			
		</div><!-- End Col -->
		
	</div><!-- End Row -->
	
</section>

<?php get_footer(); ?>
