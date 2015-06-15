<?php 
/*
Template Name: Slim page SMS Parent template
*/
 ?>

<?php get_template_part( 'parts/headers/header', 'sms' ); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$related_pages = get_field('page_links'); 
$hide_title = get_field('hide_title'); 
$form = get_field('form');
$color = get_field('page_colour');
$page_icon = get_field('page_icon');
$child_args = array(
'sort_column' => 'menu_order',
'echo' => 0,
'child_of'	=> get_the_ID(),
'title_li'	=> ''
); 
$children = wp_list_pages($child_args);
//echo '<pre>';print_r($page_links[0]['page']->ID);echo '</pre>';
?>	
 
<main class="page-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">	 	
	<article <?php post_class(); ?>>
		
		<header class="pg-header">
			<h1><?php the_title(); ?></h1>
			
			<?php if ($page_icon != 'null') { ?>
			<i class="pg-icon fa <?php echo $page_icon; ?> fa-2x"></i>
			<?php } ?>
			
			<?php if (has_post_thumbnail()) { ?>
			<figure class="feat-img">
			<?php add_wide_feat_img($post) ; ?>	
			</figure>
			<?php } ?>
			
		</header>
		
		<div class="entry">
		<?php the_content(); ?>
		</div>
		
		<?php if (!empty($children)) { ?>
		
		<aside class="sidebar">
			
			<ul class="list-unstyled tab-links sb-links">
		
				<?php echo $children; ?>	
	
			</ul>

		</aside>
					
		<?php } ?>
		
	</article>
</main>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_template_part( 'parts/footers/footer', 'sms' ); ?>
