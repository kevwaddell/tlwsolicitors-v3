<?php 
/*
Template Name: MotoPro page template
*/
 ?>

<?php get_header(); ?>

<?php include (STYLESHEETPATH . '/_/inc/motopro/img-strip.php'); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$page_icon = get_field('page_icon');
$color = get_field('page_colour');
$mp_tel = get_field('mp_tel');
$mp_web = get_field('mp_website');
$mp_email = get_field('mp_email');
//echo '<pre>';print_r($parent);echo '</pre>';
?>	
<!-- PAGE TOP SECTION -->
<section class="page-top<?php echo (!empty($color)) ? ' page-col-'.$color : ''; ?>" style="padding-bottom: 0px;">
	
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<div class="mp-info">
						<div class="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/motopro-logo.png" alt="MotoPro - Motoring Law Experts"></div>
						<div class="mp-ff-tel">
							<span>Freephone:</span>
							<?php echo $mp_tel; ?>	
						</div>
						<div class="mp-links">
							<a href="http://<?php echo $mp_web; ?>" title="Visit MotoPro Website" class="icon-btn">
							<i class="fa fa-info-circle fa-lg icon"></i>
							<?php echo $mp_web; ?>
							<i class="fa fa-angle-right fa-lg"></i>
							</a>
							<a href="mailto:<?php echo $mp_email; ?>" title="Email MotoPro" class="icon-btn">
							<i class="fa fa-envelope fa-lg icon"></i>
							<?php echo $mp_email; ?>
							<i class="fa fa-angle-right fa-lg"></i>
							</a>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
					<h2><?php the_title(); ?></h2>
					
					<?php if (isset($intro)) { ?>
					<p class="intro"><?php echo $intro ; ?></p>
					<?php } ?>
					
					<?php the_content(); ?>
					
					<div class="mp-info mobile hidden-md hidden-lg">
						<div class="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/x2/motopro-logo-mobile.png" alt="MotoPro - Motoring Law Experts"></div>
						<div class="mp-ff-tel">
						<span>Freephone:</span>
						
						<?php if (wp_is_mobile()) { ?>
						<a href="tel:<?php echo str_replace(" ", "", $mp_tel); ?>" onclick="_gaq.push(['_trackEvent', 'Lead', 'MotoProClickToCall']);" title="Call us now">
						<?php echo $mp_tel; ?>
						</a>
						<?php } else { ?>
						<?php echo $mp_tel; ?>
						<?php } ?>
							
						</div>
						<div class="mp-links">
							<a href="http://<?php echo $mp_web; ?>" title="Visit MotoPro Website" class="icon-btn">
							<i class="fa fa-info-circle fa-lg icon"></i>
							<?php echo $mp_web; ?>
							<i class="fa fa-angle-right fa-lg"></i>
							</a>
							<a href="mailto:<?php echo $mp_email; ?>" title="Email MotoPro" class="icon-btn">
							<i class="fa fa-envelope fa-lg icon"></i>
							<?php echo $mp_email; ?>
							<i class="fa fa-angle-right fa-lg"></i>
							</a>
						</div>
					</div>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns-fleft.php'); ?>
				
			</div>
			
		</article>
		
</section>
<!-- PAGE TOP SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php include (STYLESHEETPATH . '/_/inc/motopro/icon-strip.php'); ?>


<?php get_footer(); ?>
