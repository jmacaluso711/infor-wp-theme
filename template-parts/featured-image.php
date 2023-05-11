<?php
/**
 * Displays the featured image
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

if ( has_post_thumbnail() && ! post_password_required() ) {

	$featured_media_inner_classes = '';

	// Make the featured media thinner on archive pages.
	if ( ! is_singular() ) {
		$featured_media_inner_classes .= ' medium';
	}
	?>

	<figure class="featured-image">

		<?php
		the_post_thumbnail();

		$caption = get_the_post_thumbnail_caption();

		if ( $caption ) {
			?>

			<figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>

			<?php
		}
		?>

	</figure>

	<?php
}
