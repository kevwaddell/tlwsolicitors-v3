<?php get_header(); ?>

<?php
$position_args = array(
	'orderby'       => 'meta_value', 
    'hide_empty'    => true, 
); 
$positions = get_terms( 'tlw_positions_tax', $position_args );
//echo '<pre>';print_r($positions);echo '</pre>';
$tabs_counter = 0;
$panels_counter = 0;
$page_icon = get_field('page_icon');
?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
 ?>	
<!-- PAGE TOP SECTION -->
<section class="page-top">
	
	<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
				</div>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h2 style="margin-top: 0px;"><?php the_title(); ?></h2>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
			</div>
			
		</article>

</section>
<!-- PAGE TOP SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php if ($positions) { ?>

<!-- TEAM PROFILES SECTION -->
<section id="team-profiles" class="page-content">

	<div class="row">
	
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
			<ul class="list-unstyled tab-links">
			<?php foreach ($positions as $position) { 
			$tabs_counter++;
			?>
				<li<?php echo ($tabs_counter == 1) ? ' class="active"':''; ?>>
					<a href="#<?php echo $position->slug ; ?>" data-toggle="tab" title="<?php echo $position->name ; ?>" class="no-icon" onclick="_gaq.push(['_trackEvent', 'tab','clicked', '<?php echo $position->name ; ?>'])"><?php echo $position->name ; ?><i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i>
					</a>
				</li>
			
			<?php } ?>
				
			</ul>
		</aside>
		
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-8 col-lg-offset-0">
			
			<div class="tab-content">
			
			<?php foreach ($positions as $position) : 
			setup_postdata($post);
			$panels_counter++;
			
			$team_args = array (
			'posts_per_page'   => -1,
			'tlw_positions_tax' => $position->slug,
			'orderby'          => 'menu_order',
			'order'            => 'ASC',
			'post_type'        => 'tlw_team_cpt',
			);
			
			$profiles = get_posts($team_args);
			//echo '<pre>';print_r($profiles);echo '</pre>';
			?>
	
			<div class="team-list tab-pane fade<?php echo ($panels_counter == 1) ? ' in active':''; ?>" id="<?php echo $position->slug; ?>">
			
			<h3 class="icon-header">	
				<?php if ($page_icon) { ?>
				<i class="fa <?php echo $page_icon; ?> fa-lg"></i> 
				<?php } ?>
				
				<?php echo $position->name; ?>
			</h3>
			
			<div class="row">
					
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
				
					<?php if ($profiles) { ?>
					
					<?php foreach ($profiles as $post) : 
						setup_postdata($post);
						$position = get_field('position');
						$email = get_field('email');
						$departments = get_field('departments');
						$profile_img = get_field('profile_img');
						//echo '<pre>';print_r($profile_img);echo '</pre>';
						?>
						
						<div class="team-list-box">
							
							<div class="row">
							
								<div class="profile-img hidden-xs col-sm-5 col-md-5 col-lg-5">
								
									<figure>
										<img src="<?php echo $profile_img['sizes']['profile-thumb']; ?>" width="<?php echo $profile_img['sizes']['profile-thumb-width']; ?>" height="<?php echo $profile_img['sizes']['profile-thumb-height']; ?>" alt="<?php echo $profile_img['title']; ?>">
									</figure>
									
								</div>
								
								<div class="col-xs-12 col-sm-7 col-sm-offset-5 col-md-7 col-md-offset-5 col-lg-7 col-lg-offset-5">
							
									<h4><?php the_title(); ?></h4>
								
									<?php if ( $position ) { ?>
									<p class="position"><?php echo $position; ?></p>
									<?php }  ?>	
								
									<?php the_content(); ?>
									
									<?php if ( isset($email) ) { ?>
									<a href="mailto:<?php echo $email; ?>" title="<?php the_title_attribute( array( 'before' => 'Send an email to: ', 'after' => '' ) ); ?>" class="email-link"><i class="fa fa-envelope"></i> <?php echo $email; ?></a>
									<?php }  ?>	
									
									<?php if ( isset($departments) ) { ?>
									<div class="btns-wrap">
									
										<?php foreach ($departments as $department) { 
										$icon = get_field('page_icon', $department->ID);
										?>
										<a href="<?php echo get_permalink($department->ID); ?>" class="icon-btn" title="<?php echo $department->post_title; ?> Services">
										
										<?php if ($icon) { ?>
										<i class="hidden-xs fa <?php echo $icon; ?> fa-lg icon"></i>
										<?php }  ?>
										<?php echo $department->post_title; ?> Services 
										<i class="fa fa-angle-right fa-lg"></i>	
										</a>
										<?php } ?>
									
									</div>
									<?php }  ?>	
							
								</div>
							
							</div>
							
						</div>
						
					<?php endforeach;
						wp_reset_postdata();
						?>	
						
					<?php } ?>
					
					
					</div>
					
				</div>
				
			</div>
	
			
			<?php endforeach; ?>
			
			</div>	
			
		</div><!-- End Row -->
	</div>

</section>
<!-- TEAM PROFILES SECTION -->

<?php } ?>

<?php get_footer(); ?>
