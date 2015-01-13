<?php 
/*
Template Name: Team Page v2
*/
 ?>

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
?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
 ?>	
<!-- PAGE TOP SECTION -->
<main class="<?php echo (!empty($color)) ? ' page-col-'.$color : 'red'; ?>">
		
		<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-0 col-lg-7 col-lg-offset-0">
					
					<figure class="feat-img-wide">
					<?php add_wide_feat_img($post) ; ?>
					</figure>
					
					<div class="entry">
						
						<h2><?php the_title(); ?></h2>
						
						<?php the_content(); ?>
					
					</div>
					
					<?php if ($positions) { ?>

					<!-- TEAM PROFILES SECTION -->
					<section id="team-profiles" class="page-content">
								
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
				
						<div class="team-list" id="<?php echo $position->slug; ?>">
						
						<h3 class="icon-header">	
							<?php if ($page_icon) { ?>
							<i class="fa <?php echo $page_icon; ?> fa-lg"></i> 
							<?php } ?>
							
							<?php echo $position->name; ?>
						</h3>
						
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
				
						
						<?php endforeach; ?>
					
					</section>
					<!-- TEAM PROFILES SECTION -->
					
					<?php } ?>
				
				</div>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				
				<?php get_sidebar('company'); ?>
				
			</div>
			
		</article>
		
<?php endwhile; ?>
<?php endif; ?>

</main>

<?php get_footer(); ?>
