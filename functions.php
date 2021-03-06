<?php
	
defined('ABSPATH') or die("please don't runs scripts");
/**
* WARNING: Please do not edit this file
* functionality may be affected
* @file           functions.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/

function social_magazine_styles() {
wp_enqueue_style( 'social_magazine_bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
wp_enqueue_style( 'social_magazine_font_awesome_css', get_template_directory_uri() . '/css/font-awesome.min.css');
wp_enqueue_style( 'social_magazine_style', get_stylesheet_uri());
wp_enqueue_style( 'block2121', get_template_directory_uri() . '/css/block2121-styles.css');
}
add_action( 'wp_enqueue_scripts', 'social_magazine_styles' );

function social_magazine_scripts() {
wp_enqueue_script( 'social_magazine_bootstrap_js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1.11.1', true);
if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'social_magazine_scripts' );

$template_directory = get_template_directory();

// adds social magazine customizations to the WP Theme Customizer
include 'includes/social-customizer.php';

// Register Custom Navigation Walker
require_once( get_template_directory() . '/includes/wp_bootstrap_navwalker.php' );
// Enable Comments, Pingbacks and Trackbacks
require_once( get_template_directory() . '/includes/social_magazine_comments.php' );

if ( ! function_exists( 'social_magazine_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function social_magazine_setup() {
/**
* enables international language translation of Social Magazine
**/
load_theme_textdomain( 'social-magazine', get_template_directory() . '/languages' );

//Register Nav Bar 
register_nav_menus( array(
    'header' => __( 'Header Menu', 'social-magazine' ),
) );
/*
* enable custom backgrounds
*/
$social_magazine_background = array(
	'default-color' => 'eeeeee',
);
add_theme_support( 'custom-background', $social_magazine_background );
/**
* enable post thumbnails
*/
add_theme_support( 'post-thumbnails' );
/*
* enable post formats gallery and aside
*/
add_theme_support( 'post-formats', array( 'aside', 'gallery') );
/*
* Add support for custom headers
*/
$social_magazine_logo = array(
	'default-text-color' => '000',
	'width'         => 150,
	'height'        => 50,
	'default-image' => get_template_directory_uri() . '/images/header.png',
	'uploads'       => true,
	'header-text'	=> true,
	// Support flexible heights.
	'flex-height' => false,
	// Random image rotation by default.
	'random-default' => true,
	// Callback for styling the header.
	'wp-head-callback' => '',
	// Callback for styling the header preview in the admin.
	'admin-head-callback' => '',
	// Callback used to display the header preview in the admin.
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $social_magazine_logo );
/*
* Register Default Header
*/
register_default_headers( array(
	'logo' => array(
		'url'           => '%s/images/header.png',
		'thumbnail_url' => '%s/images/header-thumbnail.png',
		'description'   => __( 'Logo', 'social-magazine' )
	)
	) );
/*
* enables title tags
*/
add_theme_support( 'title-tag' );
/*
* enable RSS feed links
*/
add_theme_support( 'automatic-feed-links' );
/*
* enable style editor
*/
add_editor_style( 'css/editor-style.css' );
}
/*
* max content width for oEmbeds
*/
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}	
endif; // social_magazine_setup
add_action( 'after_setup_theme', 'social_magazine_setup' );

/**
 * Register sidebars and widgetized areas.
 */
function social_magazine_widgets() {

	register_sidebar(array(
		'name' => __( 'Primary Social Sidebar', 'social-magazine' ),
		'id' => 'social-magazine-primary-sidebar',
		'description'   => __( 'Primary sidebar appears on right.', 'social-magazine' ),
		'before_widget' => '<div class="social-magazine-theme-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget Bottom Left', 'social-magazine' ),
		'id' => 'footer-1',
		'description'   => __( 'Footer widget appears on bottom left.', 'social-magazine' ),
		'before_widget' => '<div class="social-magazine-theme-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget Bottom Center', 'social-magazine'),
		'id' => 'footer-2',
		'description'   => __( 'Footer widget appears in bottom center.', 'social-magazine' ),
		'before_widget' => '<div class="social-magazine-theme-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget Bottom Right', 'social-magazine'),
		'id' => 'footer-3',
		'description'   => __( 'Footer widget appears on bottom right.', 'social-magazine' ),
		'before_widget' => '<div class="social-magazine-theme-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'social_magazine_widgets' );

// Custom blog post excerpt length on front-page.php
function social_magazine_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'social_magazine_excerpt_length', 999 );

// Custom read more excerpt link
function new_social_magazine_excerpt_more( $more ) {
	return '<div id="more-button"><a class="btn btn-more excerpt-more" href="'. get_permalink() . '">'. __('Continue Reading', 'social-magazine') . '</a></div>';
}
add_filter('excerpt_more', 'new_social_magazine_excerpt_more');

//Showing lists on frontpage

function blk2121_listes_accueil(){
	$categories = get_categories( array(
		'orderby' => 'name',
		'order'   => 'asc'
	) );
	shuffle( $categories );
	$categories = array_slice( $categories, 0, 10 );

	foreach( $categories as $category ) {
		$category_link = sprintf( 
			'<a href="%1$s" class="post blog-block blog-block-accueil" alt="%2$s">%3$s</a>',
			esc_url( get_category_link( $category->term_id ) ),
			esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
			esc_html( $category->name )
		);?>
		<?php
		echo sprintf($category_link );
	} 
}