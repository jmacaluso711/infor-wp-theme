<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

?>

	<footer class="footer">

		<div class="wrapper">

			<div class="footer-container">

				<a class="footer-brand" href="https://www.infor.com" target="_blank">
					<svg viewBox="0 0 278.8 278.8">
						<rect width="278.8" height="278.8" fill="#d20021"></rect>
						<rect fill="#ffffff" x="24.9" y="115.1" width="17.6" height="57.1"></rect>
						<path fill="#ffffff" d="M51.9,115.1h16.9v5.2c0,0,2.9-6.7,16.9-6.7c17.9,0,21.2,11.8,21.2,27v31.5H89.3v-28c0-6.6-0.1-15.1-9.2-15.1 c-9.2,0-10.6,7.2-10.6,14.6v28.5H51.9V115.1z"></path><path fill="#ffffff" d="M116.4,105c0-12.5,3.2-23,22.3-23c3.5,0,7.1,0.2,10.3,1.1l-0.8,14.9c-2-0.7-3.6-1.2-5.8-1.2 c-5.6,0-8.5,1.8-8.5,9.3v9.1h13.1v14.1H134v43h-17.6V105z"></path><path fill="#ffffff" d="M181.1,113.7c17.6,0,31.7,11.8,31.7,30c0,18.2-14.1,30-31.7,30c-17.6,0-31.8-11.8-31.8-30 C149.4,125.5,163.5,113.7,181.1,113.7 M181.1,158.1c8.8,0,14.1-5.9,14.1-14.5c0-8.6-5.3-14.5-14.1-14.5c-8.8,0-14.1,5.9-14.1,14.5 C167,152.3,172.3,158.1,181.1,158.1"></path><path fill="#ffffff" d="M219.8,115.1h17.6v5c0,0,4.6-7.2,22.6-6.4v15.5c-2.5-0.7-4.9-1.2-7.5-1.2c-13.4,0-15.1,9.6-15.1,21v23.2 h-17.6V115.1z"></path><polygon fill="#ffffff" points="24.9,96.3 42.5,84.2 42.5,105.7 24.9,105.7"></polygon>
					</svg>
				</a>
			
				<?php if ( has_nav_menu( 'footer' )) { ?>

					<nav aria-label="<?php esc_attr_e( 'Footer', 'infor' ); ?>" class="footer-nav">

						<ul class="footer-nav-list">
							<?php
							wp_nav_menu(
								array(
									'container'      => '',
									'depth'          => 1,
									'items_wrap'     => '%3$s',
									'theme_location' => 'footer',
								)
							);
							?>
						</ul>

					</nav><!-- .site-nav -->

				<?php } ?>
			
			</div>

		<div>

	</footer>
	
		<?php wp_footer(); ?>

	</body>
</html>
