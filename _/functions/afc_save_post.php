<?php
 
function my_acf_save_post( $post_id )
{
	global $current_screen;
	// vars
	
	if ($current_screen->id == 'tlw_testimonial_cpt') {
		
		//echo '<pre>';print_r($_POST['acf']);echo '</pre>';	
		
		 $name = $_POST['acf']['field_52e8d46ec7946'];
		 $name_split = explode(" ", $name);
		 $name_join = implode("-", $name_split);
		 $name_slug = strtolower($name_join);
		 
		 $location = $_POST['acf']['field_52e8d48ac7947'];
		 $location_split = explode(" ", $location);
		 $location_join = implode("-", $location_split);
		 $location_slug = strtolower($location_join);
		 
		 $slug = $name_slug."-".$location_slug;
		 $title = $name." - ".$location;
		 
		//echo '<pre>';print_r($slug);echo '</pre>';
		//echo '<pre>';print_r($title);echo '</pre>';
		
		wp_update_post( array( 'ID' => $post_id, 'post_title' => $title, 'post_name' => $slug) );
		 
	}	
	
}
 
// run before ACF saves the $_POST['fields'] data
add_action('acf/save_post', 'my_acf_save_post', 1);

// run after ACF saves the $_POST['acf'] data
add_action('acf/save_post', 'my_acf_save_post', 20);
 
?>