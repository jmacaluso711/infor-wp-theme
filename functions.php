<?php
/**
 * Infor Documentation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 */
function infor_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'infor-fullscreen', 1980, 9999 );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new Infor_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'infor_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Custom page walker.
require get_template_directory() . '/classes/class-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-script-loader.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Register and Enqueue Styles.
 *
 */
function infor_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'infor-style', get_stylesheet_uri(), array(), $theme_version );

	wp_enqueue_style( 'infor-main-style', get_theme_file_uri( '/assets/css/main.css' ), array(), $theme_version );


}

add_action( 'wp_enqueue_scripts', 'infor_register_styles' );

/**
 * Register and Enqueue Scripts.
 *
 */
function infor_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'infor-slider-js', 'https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js', array(), $theme_version, false );
	wp_enqueue_script( 'infor-js', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, false );
	wp_script_add_data( 'infor-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'infor_register_scripts' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 *
 */
function infor_menus() {

	$locations = array(
		'primary'  => __( 'Main Menu', 'infor' ),
		'footer'   => __( 'Footer Menu', 'infor' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'infor_menus' );

// Add excerpt
add_post_type_support( 'page', 'excerpt' );

/**
 * Enqueue classic editor styles.
 *
 */

function infor_classic_editor_styles() {

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'infor_classic_editor_styles' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function infor_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="sr-only">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'infor_read_more_tag' );

/**
 * WordPress Breadcrumbs
 */
function wp_breadcrumbs() {

	$breadcrumbs_class      = 'breadcrumbs';
	$home_title             = esc_html__('Home', '/');

	// Add here you custom post taxonomies
	$tsh_custom_taxonomy    = 'product_cat';

	global $post,$wp_query;
		 
	// Hide from front page
	if ( !is_front_page() ) {
		 
			echo '<ul class="' . $breadcrumbs_class . '">';
				 
			// Home
			echo '<li><a href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
				 
			if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
						
					echo '<li><strong>' . post_type_archive_title('', false) . '</strong></li>';
						
			} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
						
					// For Custom post type
					$post_type = get_post_type();
						
					// Custom post type name and link
					if($post_type != 'post') {
								
							$post_type_object = get_post_type_object($post_type);
							$post_type_archive = get_post_type_archive_link($post_type);
						
							echo '<li><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
						
					}
						
					$custom_tax_name = get_queried_object()->name;
					echo '<li><strong>' . $custom_tax_name . '</strong></li>';
						
			} else if ( is_single() ) {
						
					$post_type = get_post_type();

					if($post_type != 'post') {
								
							$post_type_object = get_post_type_object($post_type);
							$post_type_archive = get_post_type_archive_link($post_type);
						
							echo '<li><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
						
					}
						
					// Get post category
					$category = get_the_category();
					 
					if(!empty($category)) {
						
							// Last category post is in
							$last_category = $category[count($category) - 1];
								
							// Parent any categories and create array
							$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
							$cat_parents = explode(',',$get_cat_parents);
								
							// Loop through parent categories and store in variable $cat_display
							$cat_display = '';
							foreach($cat_parents as $parents) {
									$cat_display .= '<li>'.$parents.'</li>';
							}
					 
					}

					$taxonomy_exists = taxonomy_exists($tsh_custom_taxonomy);
					if(empty($last_category) && !empty($tsh_custom_taxonomy) && $taxonomy_exists) {
								 
							$taxonomy_terms = get_the_terms( $post->ID, $tsh_custom_taxonomy );
							$cat_id         = $taxonomy_terms[0]->term_id;
							$cat_nicename   = $taxonomy_terms[0]->slug;
							$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $tsh_custom_taxonomy);
							$cat_name       = $taxonomy_terms[0]->name;
						 
					}
						
					// If the post is in a category
					if(!empty($last_category)) {
							echo $cat_display;
							echo '<li><strong>' . get_the_title() . '</strong></li>';
								
					// Post is in a custom taxonomy
					} else if(!empty($cat_id)) {
								
							echo '<li><a href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
							echo '<li><strong>' . get_the_title() . '</strong></li>';
						
					} else {
								
							echo '<li><strong>' . get_the_title() . '</strong></li>';
								
					}
						
			} else if ( is_category() ) {
						 
					// Category page
					echo '<li><strong>' . single_cat_title('', false) . '</strong></li>';
						 
			} else if ( is_page() ) {
						 
					// Standard page
					if( $post->post_parent ){
								 
							// Get parents 
							$anc = get_post_ancestors( $post->ID );
								 
							// Get parents order
							$anc = array_reverse($anc);
								 
							// Parent pages
							if ( !isset( $parents ) ) $parents = null;
							foreach ( $anc as $ancestor ) {
									$parents .= '<li><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
							}
								 
							// Render parent pages
							echo $parents;
								 
							// Active page
							echo '<li><strong> ' . get_the_title() . '</strong></li>';
								 
					} else {
								 
							// Just display active page if not parents pages
							echo '<li><strong> ' . get_the_title() . '</strong></li>';
								 
					}
						 
			} else if ( is_tag() ) { // Tag page
						 
					// Tag information
					$term_id        = get_query_var('tag_id');
					$taxonomy       = 'post_tag';
					$args           = 'include=' . $term_id;
					$terms          = get_terms( $taxonomy, $args );
					$get_term_id    = $terms[0]->term_id;
					$get_term_slug  = $terms[0]->slug;
					$get_term_name  = $terms[0]->name;
						 
					// Return tag name
					echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
				 
			} elseif ( is_day() ) { // Day archive page
						 
					// Year link
					echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
						 
					// Month link
					echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
						 
					// Day display
					echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
						 
			} else if ( is_month() ) { // Month Archive
						 
					// Year link
					echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
						 
					// Month display
					echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
						 
			} else if ( is_year() ) { // Display year archive

					echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
						 
			} else if ( is_author() ) { // Author archive
						 
					// Get the author information
					global $author;
					$userdata = get_userdata( $author );
						 
					// Display author name
					echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
				 
			// Paginated archives
			} else if ( get_query_var('paged') ) {
						 
					if ( is_search() ) {
						echo '<li><strong>Search</strong></li>';
					} else {
						echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
					}	 
					
			} else if ( is_search() ) {
				 
					// Search results page
					echo '<li><strong>Search results</strong></li>';
				 
			} elseif ( is_404() ) {
						 
					// 404 page
					echo '<li>' . 'Error 404' . '</li>';
			}

			echo '</ul>';  
	}
}

function change_search_url_rewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}	
}
add_action( 'template_redirect', 'change_search_url_rewrite' );

function remove_global_styles() {
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
	// remove_action( 'in_admin_header', 'wp_global_styles_render_svg_filters' );
}
add_action('after_setup_theme', 'remove_global_styles', 10, 0);

// Remove comments

add_action('admin_init', function () {
	// Redirect any user trying to access comments page
	global $pagenow;
	 
	if ($pagenow === 'edit-comments.php') {
			wp_safe_redirect(admin_url());
			exit;
	}

	// Remove comments metabox from dashboard
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	// Disable support for comments and trackbacks in post types
	foreach (get_post_types() as $post_type) {
			if (post_type_supports($post_type, 'comments')) {
					remove_post_type_support($post_type, 'comments');
					remove_post_type_support($post_type, 'trackbacks');
			}
	}
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
	if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
 } 
 add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

 /*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS
	wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

/* Get IDS Icons. Ex usage: <?php echo get_custom_icon('bullet-list'); ?> */
function get_custom_icon($icon_name, $class_name= "") {
	$json_data = file_get_contents(get_template_directory() . '/assets/svgs/path-data.json');
	$icons = json_decode($json_data, true);

	if (isset($icons[$icon_name])) {
		return '<svg class="'. $class_name .'" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">' . $icons[$icon_name] . '</svg>';
	}

	return '';
}

// Register Custom Blocks
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/blocks/code-documentation', array(
		'render_callback' => 'code_docs_api_render'
	));
	register_block_type( __DIR__ . '/blocks/code-demo');
	register_block_type( __DIR__ . '/blocks/icons');
	register_block_type( __DIR__ . '/blocks/design-tokens');
}

include_once get_template_directory() . '/blocks/code-documentation/code-docs-api-render.php';