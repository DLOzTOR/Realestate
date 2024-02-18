<?php

/**
 * RealEstate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RealEstate
 */
/*
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
*/
function realestate_enqueue_style()
{
	wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800', array(), '1.0', false);
	wp_enqueue_style('realestate-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0', false);
	wp_enqueue_style('realestate-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array('realestate-normalize'), '1.0', false);
	wp_enqueue_style('realestate-fontello', get_template_directory_uri() . '/assets/css/fontello.css', array('realestate-normalize', 'realestate-font-awesome'), '1.0', false);
	wp_enqueue_style('realestate-pe-icon-7-stroke', get_template_directory_uri() . '/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello'), '1.0', false);
	wp_enqueue_style('realestate-helper', get_template_directory_uri() . '/assets/fonts/icon-7-stroke/css/helper.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello', 'realestate-pe-icon-7-stroke'), '1.0', false);
	wp_enqueue_style('realestate-animate', get_template_directory_uri() . '/assets/css/animate.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello', 'realestate-pe-icon-7-stroke', 'realestate-helper'), '1.0', false);
	wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello', 'realestate-pe-icon-7-stroke', 'realestate-helper', 'realestate-animate'), '1.0', false);
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '1.0', false);
	wp_enqueue_style('realestate-icheck', get_template_directory_uri() . '/assets/css/icheck.min_all.css', array(), '1.0', false);
	wp_enqueue_style('realestate-price-range', get_template_directory_uri() . '/assets/css/price-range.css', array(), '1.0', false);
	wp_enqueue_style('realestate-owl-carouse', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0', false);
	wp_enqueue_style('realestate-owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), '1.0', false);
	wp_enqueue_style('realestate-owl-transitions', get_template_directory_uri() . '/assets/css/owl.transitions.css', array(), '1.0', false);
	wp_enqueue_style('realestate-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', false);
	wp_enqueue_style('realestate-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', false);

	wp_enqueue_style('realestate-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('realestate-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'realestate_enqueue_style');

function realestate_enqueue_script()
{
	wp_enqueue_script('modernizr-2.6.2', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js', array());
	wp_enqueue_script('jquery-1.10.2', get_template_directory_uri() . '/assets/js/jquery-1.10.2.min.js', array('modernizr-2.6.2'));
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('modernizr-2.6.2', 'jquery-1.10.2'));
	wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap'));
	wp_enqueue_script('bootstrap-hover-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select'));
	wp_enqueue_script('easypiechart', get_template_directory_uri() . '/assets/js/easypiechart.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown'));
	wp_enqueue_script('jquery.easypiechart', get_template_directory_uri() . '/assets/js/jquery.easypiechart.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart'));
	wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart'));
	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel'));
	wp_enqueue_script('icheck', get_template_directory_uri() . '/assets/js/icheck.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow'));
	wp_enqueue_script('price-range', get_template_directory_uri() . '/assets/js/price-range.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck'));
	wp_enqueue_script('realestate-main', get_template_directory_uri() . '/assets/js/main.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck', 'price-range'));
}
add_action('wp_footer', 'realestate_enqueue_script');

function realestate_enqueue_links()
{
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
	echo '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">';
	echo '<link rel="icon" href="favicon.ico" type="image/x-icon">';
}
add_action('wp_head', 'realestate_enqueue_links');

function realestate_register_nav_menus()
{
	register_nav_menus(array(
		'header_nav' => 'Header Menu',
		'footer_nav' => 'Footer Menu',
	));
}
add_action('after_setup_theme', 'realestate_register_nav_menus');

function realestate_register_post_type_property()
{
	$cities_labels = array(
		'name'              => esc_html_x('Cities', 'taxonomy general name', 'textdomain'),
		'singular_name'     => esc_html_x('City', 'taxonomy singular name', 'textdomain'),
		'search_items'      => esc_html__('Search Cities', 'textdomain'),
		'all_items'         => esc_html__('All Cities', 'textdomain'),
		'view_item'         => esc_html__('View City', 'textdomain'),
		'parent_item'       => esc_html__('Parent City', 'textdomain'),
		'parent_item_colon' => esc_html__('Parent City:', 'textdomain'),
		'edit_item'         => esc_html__('Edit City', 'textdomain'),
		'update_item'       => esc_html__('Update City', 'textdomain'),
		'add_new_item'      => esc_html__('Add New City', 'textdomain'),
		'new_item_name'     => esc_html__('New City Name', 'textdomain'),
		'not_found'         => esc_html__('No Cities Found', 'textdomain'),
		'back_to_items'     => esc_html__('Back to Cities', 'textdomain'),
		'menu_name'         => esc_html__('Cities', 'textdomain'),
	);

	$cities_args = array(
		'labels'            => $cities_labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'city'),
		'show_in_rest'      => true,
	);

	register_taxonomy('cities', array('property'),  $cities_args);

	$features_labels = array(
		'name'              => esc_html_x('Features', 'taxonomy general name', 'textdomain'),
		'singular_name'     => esc_html_x('Feature', 'taxonomy singular name', 'textdomain'),
		'search_items'      => esc_html__('Search Features', 'textdomain'),
		'all_items'         => esc_html__('All Features', 'textdomain'),
		'view_item'         => esc_html__('View Feature', 'textdomain'),
		'parent_item'       => esc_html__('Parent Feature', 'textdomain'),
		'parent_item_colon' => esc_html__('Parent Feature:', 'textdomain'),
		'edit_item'         => esc_html__('Edit Feature', 'textdomain'),
		'update_item'       => esc_html__('Update Feature', 'textdomain'),
		'add_new_item'      => esc_html__('Add New Feature', 'textdomain'),
		'new_item_name'     => esc_html__('New Feature Name', 'textdomain'),
		'not_found'         => esc_html__('No Features Found', 'textdomain'),
		'back_to_items'     => esc_html__('Back to Features', 'textdomain'),
		'menu_name'         => esc_html__('Features', 'textdomain'),
	);

	$features_args = array(
		'labels'            => $features_labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'feature'),
		'show_in_rest'      => true,
	);

	register_taxonomy('features', array('property'), $features_args);

	register_post_type(
		'property',
		array(
			'label' => esc_html__('Property', 'realestate'),
			'public' => true,
			'show_in_menu' => true,
			'has_archive' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields',
				'excerpt',
				'author'
			),
			'rewrite' => array('slug' => 'properties'),
		)
	);
}
add_action('init', 'realestate_register_post_type_property');
//pagination
add_action('pre_get_posts', function ($query) {
	if (is_post_type_archive('property')) $query->set('posts_per_page', isset($_GET['per_page']) ? intval($_GET['per_page']) : 6);
});

function custom_login_url($login_url, $redirect)
{
	$custom_login_url = get_site_url() . '/login';

	return esc_url_raw(add_query_arg('', urlencode($redirect), $custom_login_url));
}
add_filter('login_url', 'custom_login_url', 10, 2);

function realestate_set_select_droplist($value)
{
	if (isset($_GET['per_page']) && $_GET['per_page'] == $value)
		echo 'selected';
	elseif (!isset($_GET['per_page']) && $value == 6) {
		echo 'selected';
	}
}
function realestate_get_post_custom_field($field)
{
	return get_post_meta(get_the_ID(), $field, true);
}

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function realestate_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on RealEstate, use a find and replace
		* to change 'realestate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('realestate', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');


	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'realestate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'realestate_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function realestate_content_width()
{
	$GLOBALS['content_width'] = apply_filters('realestate_content_width', 640);
}
add_action('after_setup_theme', 'realestate_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function realestate_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'realestate'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'realestate'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'realestate_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function realestate_scripts()
{


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'realestate_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
