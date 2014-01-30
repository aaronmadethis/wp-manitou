<?php
/* ================================================================================
ADD THUMBNAIL SUPPORT AND ADDITIONAL IMAGE SIZES
================================================================================ */
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 250, 200, true ); // default Post Thumbnail dimensions (cropped)
}	
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'blog-full', 269, 9999, false );
	add_image_size( 'blog-small', 123, 9999, false );
	add_image_size( 'projects-large', 2000, 9999, false );
}

/* ================================================================================
ADD MENUS AND POST FORMAT SUPPORT
================================================================================ */
if ( ! function_exists( 'yp_wp_setup' ) ) {

	function yp_wp_setup() {
		register_nav_menus( array( 'main' => 'Main Menu' ) );

		add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'audio', 'video') );
	}
}

add_action( 'after_setup_theme', 'yp_wp_setup' );


/* ================================================================================
SET CONTENT WIDTH DEPENDING ON PAGE
================================================================================ */
if( in_category( 'blog' ) ){
	$content_width = 760;
}else{
	$content_width = 760;
}

/* ================================================================================
GET A CATEGORY ID USING IT'S NAME / SLUG
================================================================================ */
function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

/* ================================================================================
RETURN FROMATED HTML FOR THE BLOG CATEGORIES
================================================================================ */
function blog_cats($id){
	$post_id = $id;
	$categories = get_the_category($post_id);
	$cat_trim = array();
	$html = '';

	foreach ($categories as $key => $value) {
		if($value->cat_name != 'Blog'){
			$cat_trim[] = $value;
		}
	}
	foreach ($cat_trim as $key => $value) {
			$html .= $value->cat_name;
			if(count($cat_trim) > $key + 1){
				$html .= " | ";
			}
	}
	return $html;
}

/* ================================================================================
SAMPLE SHORTCODE FOR WYSWYG EDITOR IN ADMIN
================================================================================ */
function red_color( $atts, $content = null ) {
	return '<span class="red_color">' . $content . '</span>';
}

add_shortcode( 'red_color', 'red_color' );


/* ================================================================================
FUNCTIONS FOR REMOVING IMAGE ATTRIBUTES FROM POSTS
================================================================================ */
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/* ================================================================================
FUNCTIONS FOR ADDING JAVASCRIPTS
================================================================================ */
add_action( 'template_redirect', 'my_script_enqueuer' );

function my_script_enqueuer() {

	wp_enqueue_script('jquery');

	$modernizr_url = get_bloginfo('template_directory') . '/js/vendor/modernizr-2.6.1.min.js';
	wp_enqueue_script('modernizr', $modernizr_url);

	$masonry_url = get_bloginfo('template_directory') . '/js/vendor/jquery.masonry.min.js';
	wp_enqueue_script('masonry', $masonry_url, array('jquery', 'modernizr', 'plugins'), '', true);

	$display_script_url = get_bloginfo('template_directory') . '/js/display-0.1.js';
	$plugins = get_bloginfo('template_directory') . '/js/plugins-0.1.js';
	wp_enqueue_script('plugins', $plugins, array('jquery', 'modernizr'), '', true);
	wp_enqueue_script('display_script', $display_script_url, array('jquery', 'modernizr', 'plugins', 'masonry'), '', true);

	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css' );
}

?>