<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

get_header();
?>

<main class="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>

	<?php if(get_field('slide') && have_rows('slide')): ?>
	<div class="layer bg--clarity-mist">

		<div class="wrapper">
			
			<?php if(get_field('slider_title')): ?>
				<h3 class="heading heading--4 slider-title"><?php the_field('slider_title'); ?> </h3>
			<?php endif; ?>
		
			<div class="slider">

				<div class="slider__container" data-slider>
					<?php while(have_rows('slide')): the_row(); ?>

						<?php
							$slide_image = get_sub_field('slide_image');
							$slide_title = get_sub_field('slide_title');
							$slide_vendor = get_sub_field('slide_vendor');
							$slide_description = get_sub_field('slide_description');
							$slide_cta = get_sub_field('slide_cta');
							$slide_link = get_sub_field('slide_link');
						?>

						<div class="slide">

							<?php if($slide_link): ?>
								<a class="slide__container" href="<?php echo esc_url($slide_link['url']); ?>" target="<?php echo esc_attr($slide_link['target']); ?>">
							<?php endif; ?>

							<?php if($slide_image): ?>
								<div class="slide__image">
									<img src="<?php echo $slide_image['sizes']['large']; ?>" alt="<?php echo $slide_image['alt']; ?>">
								</div>
							<?php endif; ?>

							<div class="slide__content">
								<div>
									<?php if($slide_title): ?>
										<h3 class="slide__title heading heading--5"><?php echo $slide_title; ?></h3>
									<?php endif; ?>
									<?php if($slide_vendor): ?>
										<p class="slide__eyebrow"><?php echo $slide_vendor; ?></p>
									<?php endif; ?>
									<?php if($slide_description): ?>
										<div class="text-block">
											<?php echo $slide_description; ?>
										</div>
									<?php endif; ?>
								</div>

								<?php if($slide_cta): ?>
									<span class="slide__cta"><?php echo $slide_cta; ?></span>
								<?php endif; ?>
							</div>

							<?php if( $slide_link): ?>
								</a>
							<?php endif; ?>

						</div>

					<?php endwhile; ?>
				</div>

				<button aria-label="Previous" class="slider__control slider__control--prev">«</button>
				<button aria-label="Next" class="slider__control slider__control--next">»</button>

			</div>

		</div>
	</div>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
