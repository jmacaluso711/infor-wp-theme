<?php
/**
 * The template for displaying the 404 template in the Infor Documentation theme.
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

get_header();
?>



<div class="hero">

	<div class="wrapper">

		<div class="hero-container">

			<?php if (function_exists('wp_breadcrumbs')) wp_breadcrumbs(); ?>

			<h1 class="heading heading--1"><?php _e( 'Page Not Found', 'infor' ); ?></h1>

		</div>

	</div>

</div>

<main class="main">

	<div class="layer">

		<div class="wrapper">

			<div class="container">
				<?php get_template_part( 'template-parts/search-form' ); ?>
			</div>

			<div class="container --reduced">
				<div class="text-block">
					<p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'infor' ); ?></p>
				</div>
			</div>

		</div>

	</div>
	
</main>

<?php get_footer(); ?>