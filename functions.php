<?php 

/*
update_option('siteurl','http://tlwsolicitors.dev');
update_option('home','http://tlwsolicitors.dev');
*/

if ( !function_exists(core_mods) ) {
	function core_mods() {
		if ( !is_admin() ) {
			wp_register_style( 'styles', get_stylesheet_directory_uri().'/_/css/styles.css', null, filemtime( get_stylesheet_directory().'/_/css/styles.css' ), 'screen' );
			wp_register_style( 'easydropdown_styles', get_stylesheet_directory_uri().'/_/css/easydropdown.metro.css', null, '1.0.0');
			wp_register_script( 'jquery-cookie', get_stylesheet_directory_uri() . '/_/js/jquery.cookie.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'slim-scroll', get_stylesheet_directory_uri() . '/_/js/jquery.slimscroll.min.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'easy-dropdown', get_stylesheet_directory_uri() . '/_/js/jquery.easydropdown.min.js', array('jquery'), '1.0.0', true );
			//wp_register_script( 'bootstrap-select', 'http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js', array('jquery', 'bootstrap-all-min'), '1.0.0', true );
			wp_register_script( 'functions', get_stylesheet_directory_uri() . '/_/js/functions.js', array('jquery', 'jquery-ui-core', 'bootstrap-all-min', 'jquery-cookie', 'slim-scroll'), '1.0.1', true );
			//wp_register_script( 'img-fit', get_stylesheet_directory_uri() . '/_/js/jquery.imagefit.js', array('jquery'), '1.0.0', true );
			
			wp_enqueue_style('styles');
			wp_enqueue_style('easydropdown_styles');
			wp_enqueue_script('jquery-cookie');
			wp_enqueue_script('slim-scroll');
			wp_enqueue_script('easy-dropdown');
			//wp_enqueue_script('bootstrap-select');
			wp_enqueue_script('functions');
			//wp_enqueue_script('img-fit');
		}
	}
	core_mods();
}

add_action( 'after_setup_theme', 'editor_styles' );

function editor_styles() {
add_editor_style();	
}

add_theme_support('html5', array('search-form'));

if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
			  'legal_links_menu' => 'Legal Menu',
			  'social_links_menu' => 'Footer Social Links',
			  'footer_menu_general' => 'Footer Menu General',
			  'new_main_menu' => 'New Main Menu'
			)
		);
}

if ( function_exists( 'register_sidebar' ) ) {
	
	$login_sb_args = array(
	'name'          => "User actions",
	'id'            => "user-actions",
	'description'   => 'Area for logged in user widget',
	'class'         => 'user-links',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => '' 
	);
		
	$newsletter_sb_args = array(
	'name'          => "Newsletter Sign-up Form",
	'id'            => "newsletter-signup-form",
	'description'   => 'Newsletter signup widget',
	'class'         => 'contact-form',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' 
	);
	
	
	register_sidebar( $login_sb_args );
	register_sidebar( $newsletter_sb_args );
}


add_theme_support( 'post-thumbnails', array( 'page', 'post' ) );
add_post_type_support( 'page', 'excerpt' );

$custom_header_args = array(
	'width'         => 1500,
	'flex-height' => true,
	'height'        => 600,
	'default-image' => get_stylesheet_directory_uri() . '/_/img/header.jpg',
	'uploads'       => true,
	'default-text-color' => '#fff',
	'header-text' => false
);
add_theme_support( 'custom-header', $custom_header_args );

function add_feat_img ( $post ) {	
	
	if (has_post_thumbnail($post->ID)) {
		
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$attachment = get_post( $post_thumbnail_id );
		$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
		
		//echo '<pre>';print_r($attachment->post_excerpt);echo '</pre>';
		
		
		$img_atts = array(
		'class'	=> "img-responsive"
		);
		
		if (!empty($alt)){
		$img_atts['alt'] = 	trim(strip_tags( $alt ));
		}
		
		if (!empty($attachment->post_title)){
		$img_atts['title'] = 	trim(strip_tags( $attachment->post_title ));
		}
		
		echo get_the_post_thumbnail($post->ID ,'feat-img', $img_atts );
	
	} else {
		
		echo '<img src="'.get_stylesheet_directory_uri().'/_/img/default-featured-img.jpg" title="TLW Solicitors" alt="TLW Solicitors" class="img-responsive">';
		
	}
	
}

function add_wide_feat_img ( $post ) {	
	
	if (has_post_thumbnail($post->ID)) {
		
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$attachment = get_post( $post_thumbnail_id );
		$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
		
		//echo '<pre>';print_r($attachment->post_excerpt);echo '</pre>';
		
		
		$img_atts = array(
		'class'	=> "img-responsive"
		);
		
		if (!empty($alt)){
		$img_atts['alt'] = 	trim(strip_tags( $alt ));
		}
		
		if (!empty($attachment->post_title)){
		$img_atts['title'] = 	trim(strip_tags( $attachment->post_title ));
		}
		
		echo get_the_post_thumbnail($post->ID ,'feat-img-wide', $img_atts );
	
	} else {
		
		echo '<img src="'.get_stylesheet_directory_uri().'/_/img/lg-default-featured-img.jpg" title="TLW Solicitors" alt="TLW Solicitors" class="img-responsive">';
		
	}
	
}


// Get the id of a page by its name
function get_page_id($page_name){
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name;
}

function add_gravityforms_style() {
	global $post;
	$form = get_field('form', $post->ID);
	
	if (!empty($form)) {
		wp_enqueue_style("gforms_css", GFCommon::get_base_url() . "/css/forms.css", null, GFCommon::$version);
	}
	
}
add_action('wp_print_styles', 'add_gravityforms_style');

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* REGISTER FEEDBACK CPT */
include (STYLESHEETPATH . '/_/functions/tlw_feedback_cpt.php');

/* REGISTER TEAMS CPT */
include (STYLESHEETPATH . '/_/functions/tlw_team_cpt.php');

/* REGISTER POSITIONS TAX */
include (STYLESHEETPATH . '/_/functions/tlw_positions_tax.php');

/* TAXONMY ORDERING */
include (STYLESHEETPATH . '/_/functions/tax_order.php');

/* AFC OPTIONS FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_options_functions.php');

/* FORM ACTIONS */
include (STYLESHEETPATH . '/_/functions/gform_functions.php');

/* AFC SAVE FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_save_post.php');

/* SEND NEWSLETTER TO DOTMAILER */
include (STYLESHEETPATH . '/_/functions/submit_newsletter.php');

/* NEXT PREVIOUS ADMIN POST/PAGES LINKS FUNCTION */
//include (STYLESHEETPATH . '/_/functions/next-prev-post-admin.php');

//holder_add_theme( 'wordpress', '333333', 'eeeeee' );
holder_add_theme( 'lite-gray', '888888', 'eeeeee' );

function add_gf_cap()
{	
   $id = 2;
   $role = new WP_User( $id );
   $role->add_cap( 'gravityforms_edit_forms' );
   $role->add_cap( 'gravityforms_view_entries' );
   $role->add_cap( 'gravityforms_edit_entries' );
   $role->add_cap( 'gravityforms_export_entries' );
   $role->add_cap( 'gravityforms_view_entry_notes' );
   $role->add_cap( 'gravityforms_edit_entry_notes' );
}
 
add_action( 'admin_init', 'add_gf_cap' );

function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

function adjust_my_breadcrumbs( $linksarray ) {
	if( is_array( $linksarray ) && count( $linksarray ) > 0 && is_single() ) {
		array_pop( $linksarray );
	}
	return $linksarray;
}
add_filter( 'wpseo_breadcrumb_links', 'adjust_my_breadcrumbs' );

/*
*  AFC Options Page
*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
	//echo '<pre>';print_r($buttons);echo '</pre>';
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
    	array(
    		'title' => 'Intro',
    		'selector' => 'p',
    		'classes' => 'intro bold'
    	),
    	array(
    		'title' => 'Colour Link',
    		'selector' => 'a',
    		'classes' => 'col-link'
    	),
        array(
        	'title' => 'Bold Red Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#C60751'
        	)
        ),
        array(
        	'title' => 'Aqua Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#8BC2BD'
        	)
        ),
        array(
        	'title' => 'Purple Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#B975DA'
        	)
        ),
        array(
        	'title' => 'Orange Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#FFAF4E'
        	)
        ),
        array(
        	'title' => 'Pink Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#EA5777'
        	)
        ),
        array(
        	'title' => 'Blue Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#2D80A9'
        	)
        )

    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
    
    add_editor_style();

}

add_action("gform_field_css_class", "custom_class", 10, 3);

function custom_class($classes, $field, $form){
    
    if($field["type"] == "select"){
        $classes .= " selectpicker";
    }
    return $classes;
}


/*
function wpse126301_dashboard_columns() {
    add_screen_option(
        'layout_columns',
        array(
            'max'     => 2,
            'default' => 1
        )
    );
}
add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );
*/

 ?>