<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

?>

<?php get_template_part( 'template-parts/entry-header' ); ?>

<div class="layer">

	<div class="wrapper">

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<?php if (is_page_template('templates/template-sidebar.php')) { ?>
			<div class="grid --ultra-spaced">

				<div class="row">

					<div class="col --md-3 --display-md">

						<nav class="sidebar-menu" data-sidebar-menu>
							<ul class="sidebar-menu-list">
								<?php
									wp_nav_menu(
										array(
											'container'      => '',
											'items_wrap'     => '%3$s',
											'show_toggles'   => true,
											'theme_location' => 'primary'
										)
									);
								?>
							</ul>
						</nav>

					</div>
					

					<div class="col --md-9">

		<?php }?>	

						<?php if (!is_search() && has_post_thumbnail()) {?>
							<?php get_template_part( 'template-parts/featured-image' ); ?>
						<?php }?>

						<div class="container">
							<div class="text-block">

								<?php
								if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
									the_excerpt();
								} else {
									the_content( __( 'Continue reading', 'infor' ) );
								}
								?>

							</div>
						</div>

				<?php if (is_page_template('templates/template-sidebar.php')) { ?>

						<div class="container --reduced">
							<?php get_template_part( 'template-parts/navigation' ); ?>
						</div>

					</div>

				</div>
				<?php }?>	

			</div>


		</article>

	</div>

</div>
