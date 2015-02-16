<?php
/**
 * Brunch functions and definitions
 *
 * @package Brunch
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'brunch_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function brunch_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Brunch, use a find and replace
	 * to change 'brunch' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'brunch', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'brunch' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'brunch_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // brunch_setup
add_action( 'after_setup_theme', 'brunch_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function brunch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'brunch' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'brunch_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// BEGINNING OF CUSTOM JQUERY SCRIPTS
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
     wp_enqueue_script('jquery');
}
// END OF CUSTOM JQUERY SCRIPTS

function brunch_scripts() {
	wp_enqueue_style( 'brunch-style', get_stylesheet_uri() );

	wp_enqueue_script( '_s-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery') );

	wp_enqueue_script( 'brunch-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'brunch-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'brunch_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// / ADDED THE ADD ACTION BELOW IN CLASS FOR CUSTOM POST //
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'brunch_review',
        array(
            'labels' => array(
                'name' => __( 'Brunch Reviews' ),
                'singular_name' => __( 'Brunch Review' )
            ),
            'taxonomies' => array( 'category', 'post_tag' ),
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'supports' => array( 'comments', 'title', 'editor', 'author')
        )
    );
}

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'brunch_review'
		));
	  return $query;
	}
}

// Define what post types to search so custom post will show up in search
function searchAll( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'feed', 'brunch_review'));
	}
	return $query;
}

// The hook needed to search ALL content and add custom post to recent widget
add_filter( 'the_search_query', 'searchAll' );
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

add_filter('widget_posts_args', 'widget_posts_args_add_custom_type'); 
function widget_posts_args_add_custom_type($params) {
	$params['post_type'] = array('post', 'brunch_review');
	return $params;
}