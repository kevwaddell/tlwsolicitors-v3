<?php 
$archives_args = array(
	'type'            => 'monthly',
	'limit'			  => 12,
	'echo'            => 0,
	'format'		 => 'custom',
	'before'          => '<li class="archive-link">',
	'after'           => '</li>',
	);


if (is_year()) {
$archives_args['type'] = 'yearly';
$archives_args['limit'] = 5;
}

$archives = wp_get_archives($archives_args);

?>

<?php if ($archives) { ?>

<ul class="list-unstyled tab-links">
	<?php echo $archives; ?>
</ul>

<?php }  ?>

<?php include (STYLESHEETPATH . '/_/inc/sidebar/social-feed.php'); ?>