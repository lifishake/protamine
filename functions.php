<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage protamine
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function protamine_setup() {

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'protamine-featured-image', 800, 480, true );

	register_nav_menus( array(
		'top'    => 'Top Menu',
		'social' => 'Social Links Menu',
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
        'search-form',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'audio',
	) );

	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'protamine_setup' );

/**
 * 设定媒体宽度的全局变量。优先级为0，特别优先。
 *
 * @global int $content_width
 */
function protamine_content_width() {
	$GLOBALS['content_width'] = 700 ;
}
add_action( 'after_setup_theme', 'protamine_content_width', 0 );


function protamine_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'sidebar-2',
		'description'   => '添加左侧页脚小工具',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'sidebar-3',
		'description'   => '添加右侧页脚小工具',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'protamine_widgets_init' );

function protamine_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'protamine_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function protamine_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'protamine-style', get_stylesheet_uri() );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'protamine-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'protamine-style' ), '1.0' );
	wp_style_add_data( 'protamine-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'protamine-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	wp_enqueue_script( 'protamine-infinite-scroll', get_theme_file_uri( '/assets/js/jquery.infinitescroll.min.js' ), array(), '1.0', true );

	$protamine_l10n = array(
		'quote'          => protamine_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'protamine-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$protamine_l10n['expand']         = '展开';
		$protamine_l10n['collapse']       = '折叠';
		$protamine_l10n['icon']           = protamine_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'protamine-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'protamine-skip-link-focus-fix', 'protamineScreenReaderText', $protamine_l10n );

	if ( is_singular() && comments_open() ) {
		if ( get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script( 'protamine-ajax-comment', get_theme_file_uri( '/assets/js/ajax-comment.js' ), array( 'jquery' ), '1.0', true );
		wp_localize_script( 'protamine-ajax-comment', 'ajaxcomment', array( 'ajax_url'   => admin_url('admin-ajax.php')));
	}

	$css = '.site-navigation-fixed.navigation-top:before {	content: \''. get_bloginfo('name') .'\'; }';
	wp_add_inline_style('protamine-style', $css);
}
add_action( 'wp_enqueue_scripts', 'protamine_scripts' );

function protamine_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'protamine_content_image_sizes_attr', 10, 2 );

//https://stackoverflow.com/questions/31822842/adding-search-bar-to-the-nav-menu-in-wordpress
function protamine_add_search_to_menu($items, $args) {
    // If this isn't the primary menu, do nothing
    if( !($args->theme_location == 'top') )
    return $items;
    // Otherwise, add search form
    return $items . '<li>' . get_search_form(false) . '</li>';
}
//add_filter('wp_nav_menu_items', 'protamine_add_search_to_menu', 10, 2);

function protamine_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'protamine_header_image_tag', 10, 3 );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );
/**
 * AJAX-comment
 */
require get_parent_theme_file_path( '/inc/ajax-comment.php' );
