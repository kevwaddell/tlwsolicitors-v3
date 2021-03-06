<?php 
/*
Template Name: Company page template
*/
 ?>

<?php get_header(); ?>

<?php 
$freephone_num = get_field('freephone_num', 'option');
$page_icon = get_field('page_icon');
$color = get_field('page_colour');
$hide_title = get_field('hide_title'); 
//echo '<pre>';print_r($brochure);echo '</pre>';
?>	

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	

<main class="<?php echo (!empty($color)) ? ' page-col-'.$color : 'red'; ?>">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
					
					<?php if ( has_post_thumbnail() ) { ?>
					<figure class="feat-img-wide">
					<?php add_wide_feat_img($post) ; ?>
					</figure>
					<?php } ?>
					
					<div class="entry">
						
						<?php if ($hide_title != 1) { ?>
						<h1><?php the_title(); ?></h1>
						<?php } ?>
						
						<?php the_content(); ?>
						
						 <p class="tel-num"><i class="fa fa-mobile"></i> Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
					
					</div>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
				<?php get_template_part( 'parts/sidebars/sidebar', 'company' ); ?>
				
			</div>
			
		</article>
		
</main>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
