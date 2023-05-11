<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

get_header();

$archive_title    = '';
$archive_subtitle = '';

if ( is_search() ) {
	global $wp_query;

	$archive_title = sprintf(
		'<span class="color-accent">' . __( 'Search', 'infor' ) . '</span>'
	);

	if ( $wp_query->found_posts ) {
		$archive_subtitle = sprintf(
			/* translators: %s: Number of search results. */
			_n(
				'Showing %s result matching',
				'Showing %s results matching',
				$wp_query->found_posts,
				'infor'
			),
			number_format_i18n( $wp_query->found_posts )
		);
	} else {
		$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'infor' );
	}
} elseif ( is_archive() && ! have_posts() ) {
	$archive_title = __( 'Nothing Found', 'infor' );
} elseif ( ! is_home() ) {
	$archive_title    = get_the_archive_title();
	$archive_subtitle = get_the_archive_description();
}
?>

<div class="hero">

	<div class="wrapper">

		<div class="hero-container">

			<?php if (function_exists('wp_breadcrumbs')) wp_breadcrumbs(); ?>

			<?php if ( $archive_title ) { ?>
				<h1 class="heading heading--1"><?php echo wp_kses_post( $archive_title ); ?></h1>
			<?php } ?>

		</div>

	</div>

</div>

<main class="main">

	<div class="layer">

		<div class="wrapper">

			<div class="container">
				<?php get_template_part( 'template-parts/search-form' ); ?>
			</div>

			<?php if ( $archive_subtitle ) { ?>
			<div class="container --reduced">
				<h2 class="heading heading--3">Search Results</h2>
				<div class="text-block"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
			</div>
			<?php } ?>

			<?php
				if ( have_posts() ) 
				{ ?>
			<div class="container --reduced">
				<ol class="listing">
					<?php 
						if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/page-result', get_post_type() );
						}
					}?>
				</ol>
			</div>
			<?php } ?>

			<?php get_template_part( 'template-parts/pagination' ); ?>

		</div>

	</div>
	
</main>

<?php get_footer(); ?>