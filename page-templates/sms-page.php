<?php 
/*
Template Name: Slim page SMS Form template
*/
 ?>

<?php get_header('sms'); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$related_pages = get_field('page_links'); 
$hide_title = get_field('hide_title'); 
$form = get_field('form');
$color = get_field('page_colour');
$page_icon = get_field('page_icon');
$page_links = get_field('page_links');

if (empty($page_icon) && !empty($page_links)) {
$page_icon = get_field('page_icon', $page_links[0]['page']->ID);	
}
//echo '<pre>';print_r($page_links[0]['page']->ID);echo '</pre>';
?>	
 
<main class="page-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">	 	
	<article <?php post_class(); ?>>
		
		<?php if (!empty($page_links)) { 	
		$pg_id = $page_links[0]['page']->ID;
		?>
		<header class="pg-header">
			<h1><?php echo get_the_title($pg_id); ?></h1>
			
			<i class="pg-icon fa <?php echo $page_icon; ?> fa-2x"></i>
			
			<?php if (has_post_thumbnail()) { ?>
			<figure class="feat-img">
			<?php add_wide_feat_img($post) ; ?>	
			</figure>
			<?php } ?>
			
		</header>
		<?php } ?>
		
		<div class="entry">
		<?php the_content(); ?>
		</div>
		
		<?php if ($form) { ?>
		<div class="contact-form">
			
			<?php gravity_form($form->id, false, true, false, $form_array, true); ?>
			
			<p class="disclaimer text-center bold">These details will be sent over a verified secure connection-there are no fees or charges.</p>
			
		</div>
		<?php } ?>
		
	</article>
</main>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer('sms'); ?>
