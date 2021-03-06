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
	add_image_size( 'home-hero', 755, 9999, false );
}

/* ================================================================================
ADD MENUS AND POST FORMAT SUPPORT
================================================================================ */
if ( ! function_exists( 'tms_wp_setup' ) ) {

	function tms_wp_setup() {
		register_nav_menus( array( 'main' => 'Main Menu' ) );

		add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'audio', 'video') );
	}

}

add_action( 'after_setup_theme', 'tms_wp_setup' );


/* ================================================================================
REGISTER OUR SIDEBARS AND WIDGETIZED AREAS.
================================================================================ */
function manitou_widgets_init() {

	register_sidebar(
		array(
			'id' => 'page',
			'name' => __( 'Page' ),
			'description' => __( 'Pages sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-home widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);
}
add_action( 'widgets_init', 'manitou_widgets_init' );


/* ================================================================================
SET CONTENT WIDTH DEPENDING ON PAGE
================================================================================ */
if( in_category( 'blog' ) ){
	$content_width = 660;
}else{
	$content_width = 660;
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
CUSTOM CSS FOR WYSWYG EDITOR
================================================================================ */
function tms_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'tms_theme_add_editor_styles' );


/* ================================================================================
SHORTCODE TO CREATE BUTTON IN WYSWYG EDITOR
================================================================================ */
function standard_button( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'url' => '',
		), $atts )
	);

	return '<div><a class="page-btn " href="' . $url . '" target="_blank">' . $content . '</a></div>';
}

add_shortcode( 'post_button', 'standard_button' );

/* ================================================================================
OVERRIDE IMG CAPTION SHORTCODE TO FIX 10PX ISSUE.
================================================================================ */
add_filter('img_caption_shortcode', 'fix_img_caption_shortcode', 10, 3);

function fix_img_caption_shortcode($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) ) return $val;

    return '<div id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}


/* ================================================================================
HOME PAGE HEADER TITLE - HACK FOR CUSTOM HOME PAGE
================================================================================ */
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

/* ================================================================================
BETTER POST IMAGE THUMBNAIL
* checks for post featured image first
* if not featured image attempt to scrape the post for the first image
* if no image in the post then use a general placeholder image
================================================================================ */
function ap_better_thunbnails( $post_id, $img_size ){
	$theme_dir_path = get_stylesheet_directory_uri();
	
	if( has_post_thumbnail( $post_id ) ){
		$image_id = get_post_thumbnail_id($post_id);
		$thumb = wp_get_attachment_image_src($image_id, $img_size);
		return $thumb;
	}else{
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post_id
		);
		$attachments = get_posts( $args );
		if ( $attachments ) {
			$image_id = $attachments[0]->ID;
			$thumb = wp_get_attachment_image_src($image_id, $img_size);
			return $thumb;
		}else{
			$post_obj = get_post($post_id);
			$html = apply_filters ("the_content", $post_obj->post_content);
			preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', $html, $matches);
			$src = $matches[1];

			if($src){
				$thumb = array();
				$thumb[0] = $src;
				return $thumb;
			}else{
				$thumb = array();
				$src = $theme_dir_path . "/images/facebook-img.jpg";
				$thumb[0] = $src;
				//$image_id = get_field('placeholder_image', 'options');
				//$thumb = wp_get_attachment_image_src($image_id, $img_size);
				return $thumb;
			}
		}
	}
}

/* ================================================================================
FACEBOOK SHARING FOR HEADER
================================================================================ */
function get_facebook_share_meta($post){
	$theme_dir_path = get_stylesheet_directory_uri();
	
	if( is_page($post) ){
		$fb_meta = array();
		$fb_meta['title'] = $post->post_title;
		$fb_meta['description'] = $post->post_excerpt;
		$fb_meta['type'] = 'website';
		$fb_meta['url'] = get_permalink( $post->ID );

		if(!$fb_meta['description']){
			$fb_meta['description'] = "The Manitou School is a private school located in Cold Spring, New York, that emphasizes bilingual education, experiential learning and purposeful play in its curriculum.";
		}

//		$image_id = get_post_thumbnail_id($post->ID);
//		$share_img = wp_get_attachment_image_src($image_id, 'post-thumbnail');
		$share_img = ap_better_thunbnails( $post->ID, 'post-thumbnail' );

		if(!$share_img){
			$fb_meta['image'] = $theme_dir_path . "/images/facebook-img.jpg";
		}else{
			$fb_meta['image'] = $share_img[0];
		}
		
	}else{
		$fb_meta = array();
		$fb_meta['title'] = "Manitou School";
		$fb_meta['description'] = "The Manitou School is a private school located in Cold Spring, New York, that emphasizes bilingual education, experiential learning and purposeful play in its curriculum.";
		$fb_meta['type'] = 'website';
		$fb_meta['url'] = 'http://manitouschool.org/';
		$fb_meta['image'] = $theme_dir_path . "/images/facebook-img.jpg";
	}

	return $fb_meta;
}

/* ================================================================================
COUNTS THE NUMBER OF DATABASE HITS PER PAGE
================================================================================ 
add_action( 'wp_footer', 'tcb_note_server_side_page_speed' );
function tcb_note_server_side_page_speed() {
	date_default_timezone_set( get_option( 'timezone_string' ) );
	$content  = '[ ' . date( 'Y-m-d H:i:s T' ) . ' ] ';
	$content .= 'Page created in ';
	$content .= timer_stop( $display = 0, $precision = 2 );
	$content .= ' seconds from ';
	$content .= get_num_queries();
	$content .= ' queries';
	if( ! current_user_can( 'administrator' ) ) $content = "<!-- $content -->";
	echo $content;
}
*/

/* ================================================================================
FUNCTIONS FOR ADDING JAVASCRIPTS
================================================================================ */
add_action( 'template_redirect', 'my_script_enqueuer' );

function my_script_enqueuer() {

	wp_enqueue_script('jquery');

	$modernizr_url = get_bloginfo('template_directory') . '/js/modernizr-2.6.1.min.js';
	wp_enqueue_script('modernizr', $modernizr_url);

	$bootstrap_url = get_bloginfo('template_directory') . '/js/bootstrap.min.js';
	wp_enqueue_script('bootstrap', $bootstrap_url, array('jquery', 'modernizr'), '', true);

	$slick_url = get_bloginfo('template_directory') . '/js/jquery.slicknav.min.js';
	wp_enqueue_script('slick', $slick_url, array('jquery', 'modernizr'), '', true);

	$display_script_url = get_bloginfo('template_directory') . '/js/display-0.1.js';
	$plugins = get_bloginfo('template_directory') . '/js/plugins-0.1.js';
	wp_enqueue_script('plugins', $plugins, array('jquery', 'modernizr'), '', true);
	wp_enqueue_script('display_script', $display_script_url, array('jquery', 'modernizr', 'plugins'), '', true);

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.css' );
}

?>