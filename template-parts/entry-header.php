<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */
?>

<div class="hero">

	<div class="wrapper">

		<div class="hero-container">

			<div class="hero-content">

				<?php if (function_exists('wp_breadcrumbs')) wp_breadcrumbs(); ?>

				<?php if(get_field('hero_headline')): ?>
					<h2 class="heading heading--1"><?php echo esc_html(get_field('hero_headline')); ?></h2>
				
				<?php else: ?>

					<?php
						if ( is_singular() ) {
							the_title( '<h1 class="heading heading--1">', '</h1>' );
						} else if ( is_search() ) {
							the_title( '<h1 class="heading heading--1">Search Results', '</h1>' );
						} else {
							the_title( '<h2 class="heading heading--1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
						}
					?>

				<?php endif; ?>

				<?php if ( has_excerpt() && is_singular() ) { ?>

					<div class="text-block">
						<?php the_excerpt(); ?>
					</div>

				<?php
					}
					// Default to displaying the post meta.
					infor_the_post_meta( get_the_ID(), 'single-top' );
				?>

				<?php if(get_field('hero_cta')): ?>
				<?php
					$hero_cta = get_field('hero_cta');
				?>
					<a class="btn --primary --caret" href="<?php echo esc_url( $hero_cta['url'] ); ?>" target="<?php echo esc_attr( $hero_cta['target'] ); ?>">
						<?php echo esc_html( $hero_cta['title'] ); ?>
					</a>
				<?php endif; ?>

			</div>

		</div>

	</div>

</div>
