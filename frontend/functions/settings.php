<?php 

define( 'TEMPLATE_URL', get_template_directory_uri() );
define( 'DOMAIN', 'bitmain' );

/* theme */

add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );

register_nav_menus( array(
	'header'   => 'Header',
) );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

// add_theme_support( 'widgets' );
// add_action( 'widgets_init', 'bitmain_register_widgets' );
// function bitmain_register_widgets() {
	// register_sidebar( array(
		// 'name'         => 'Footer',
		// 'id'           => 'sidebar-footer',
		// 'before_title' => '<div class="widgettitle">',
		// 'after_title'  => '</div>',
	// ));
// }

// add_image_size( 'bitmain-promo', 1920, 405, true );
// add_image_size( 'bitmain-full-hd', 1920, 1080, false );

// add_post_type_support( 'page', 'excerpt' );
// function bitmain_excerpt_length( $length ){
    // return INF;
// }
// add_filter( 'excerpt_length', 'bitmain_excerpt_length', 999 );

add_filter( 'use_default_gallery_style', '__return_false' );
add_filter( 'show_admin_bar', '__return_false' );

add_filter( 'big_image_size_threshold', '__return_false' );

/* content */

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

function bitmain_mce_options($init){
	$init['wpautop'] = false;
	$init['indent'] = true;
	$init['tadv_noautop'] = true;
	return $init;       
}
add_filter('tiny_mce_before_init','bitmain_mce_options');

/* clear head */

function bitmain_disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action('init', 'bitmain_disable_emoji');

remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 
remove_action( 'wp_head', 'adjacent_pobitmain_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_pobitmain_rel_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
add_filter(
	'template_redirect',
	function() {
		if( is_page() ){
			remove_action( 'wp_head', 'rel_canonical' );
		}
	}
);
add_filter( 'the_generator', '__return_empty_string' );

/* scripts */

add_action( 'wp_footer', 'bitmain_deregister_scripts' );
function bitmain_deregister_scripts() {
	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_enqueue_scripts', 'bitmain_enqueue_scripts' );
function bitmain_enqueue_scripts() {
	wp_enqueue_style( 'theme', TEMPLATE_URL . '/style.css' );
	wp_enqueue_style( 'styles', TEMPLATE_URL . '/css/styles.css' );
	wp_enqueue_script( 'scripts', TEMPLATE_URL . '/js/scripts.js', array(), false, true );
}

add_action( 'admin_enqueue_scripts', 'bitmain_admin_enqueue_scripts' );
function bitmain_admin_enqueue_scripts() {
	wp_enqueue_style( 'styles-admin', TEMPLATE_URL . '/css/admin.css' );
	wp_enqueue_script( 'scripts-admin', TEMPLATE_URL . '/js/admin.js', array(), false, true );
}

/* email */

add_filter( 'wp_mail_content_type', 'bitmain_wp_mail_content_type' );
function bitmain_wp_mail_content_type( $content_type ) {
	return 'text/html';
}

/* languages */

// add_action( 'after_setup_theme', 'bitmain_load_theme_textdomain' );
 
// function bitmain_load_theme_textdomain() {
	// load_theme_textdomain( DOMAIN, TEMPLATEPATH . '/languages' );
// }

/* admin menu */

add_action( 'admin_menu', function() {
	remove_menu_page( 'upload.php' );
	add_menu_page( __('Библиотека файлов'), __('Медиафайлы'), 'manage_options', 'upload.php', '', 'dashicons-admin-media', 24 ); 
});

?>