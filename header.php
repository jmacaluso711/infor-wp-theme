<?php
/**
 * Header file
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet"/>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header class="header" data-header>
		
			<div class="wrapper">

				<div class="header-container">

					<a class="header-brand" href="/">
						<svg viewBox="0 0 576.62 70.5">
							<path d="M235.27,7.53c4.25,1.92,7.52,4.65,9.81,8.18,2.29,3.53,3.44,7.72,3.44,12.56s-1.15,8.94-3.44,12.51c-2.29,3.57-5.56,6.29-9.81,8.18-4.25,1.89-9.25,2.84-15.02,2.84h-13.11v17.95h-15.07V4.65h28.18c5.77,0,10.77,.96,15.02,2.88Zm-5.53,29.06c2.36-1.95,3.53-4.73,3.53-8.32s-1.18-6.46-3.53-8.42c-2.36-1.95-5.8-2.93-10.32-2.93h-12.28v22.6h12.28c4.52,0,7.97-.98,10.32-2.93Z"/>
							<path d="M254.47,.74h14.51V69.75h-14.51V.74Z"/>
							<path d="M315.85,24.51c4.15,3.69,6.23,9.25,6.23,16.69v28.55h-13.58v-6.23c-2.73,4.65-7.81,6.98-15.25,6.98-3.84,0-7.18-.65-10-1.95-2.82-1.3-4.98-3.1-6.46-5.39-1.49-2.29-2.23-4.9-2.23-7.81,0-4.65,1.75-8.31,5.25-10.97,3.5-2.67,8.91-4,16.23-4h11.53c0-3.16-.96-5.59-2.88-7.3-1.92-1.7-4.81-2.56-8.65-2.56-2.67,0-5.29,.42-7.86,1.26-2.57,.84-4.76,1.97-6.56,3.39l-5.21-10.14c2.73-1.92,6-3.41,9.81-4.46,3.81-1.05,7.73-1.58,11.76-1.58,7.75,0,13.7,1.85,17.86,5.53Zm-12.37,34.5c1.92-1.15,3.29-2.84,4.09-5.07v-5.11h-9.95c-5.95,0-8.93,1.95-8.93,5.86,0,1.86,.73,3.33,2.19,4.42,1.46,1.09,3.46,1.63,6,1.63s4.68-.57,6.6-1.72Z"/>
							<path d="M362.81,67.33c-1.43,1.06-3.18,1.85-5.25,2.37-2.08,.53-4.26,.79-6.56,.79-5.95,0-10.56-1.52-13.81-4.56-3.25-3.04-4.88-7.5-4.88-13.39V31.99h-7.72v-11.16h7.72V8.65h14.51v12.18h12.46v11.16h-12.46v20.37c0,2.11,.54,3.74,1.63,4.88,1.08,1.15,2.62,1.72,4.6,1.72,2.29,0,4.25-.62,5.86-1.86l3.91,10.23Z"/>
							<path d="M384.11,20.83h12.83v11.16h-12.46v37.76h-14.51V31.99h-7.72v-11.16h7.72v-2.23c0-5.7,1.69-10.23,5.07-13.58C378.42,1.67,383.18,0,389.32,0c2.17,0,4.23,.23,6.18,.7,1.95,.47,3.58,1.13,4.88,2l-3.81,10.51c-1.67-1.18-3.63-1.77-5.86-1.77-4.4,0-6.6,2.42-6.6,7.25v2.14Z"/>
							<path d="M410.38,67.19c-4.18-2.2-7.46-5.25-9.81-9.16-2.36-3.91-3.53-8.34-3.53-13.3s1.18-9.39,3.53-13.3c2.36-3.91,5.63-6.96,9.81-9.16,4.19-2.2,8.91-3.3,14.18-3.3s9.98,1.1,14.14,3.3c4.15,2.2,7.41,5.25,9.77,9.16,2.36,3.91,3.53,8.34,3.53,13.3s-1.18,9.39-3.53,13.3c-2.36,3.91-5.61,6.96-9.77,9.16-4.15,2.2-8.87,3.3-14.14,3.3s-10-1.1-14.18-3.3Zm23.34-12.37c2.39-2.51,3.58-5.87,3.58-10.09s-1.19-7.58-3.58-10.09c-2.39-2.51-5.44-3.77-9.16-3.77s-6.79,1.26-9.21,3.77c-2.42,2.51-3.63,5.88-3.63,10.09s1.21,7.58,3.63,10.09c2.42,2.51,5.49,3.77,9.21,3.77s6.77-1.26,9.16-3.77Z"/>
							<path d="M477.9,20.83c2.94-1.24,6.34-1.86,10.18-1.86v13.39c-1.61-.12-2.7-.19-3.25-.19-4.15,0-7.41,1.16-9.76,3.49-2.36,2.33-3.53,5.81-3.53,10.46v23.62h-14.51V19.72h13.86v6.6c1.74-2.42,4.08-4.25,7.02-5.49Z"/>
							<path d="M571.09,24.51c3.69,3.69,5.53,9.22,5.53,16.6v28.64h-14.51v-26.41c0-3.97-.82-6.93-2.46-8.88-1.64-1.95-3.98-2.93-7.02-2.93-3.41,0-6.11,1.1-8.09,3.3-1.99,2.2-2.98,5.47-2.98,9.81v25.11h-14.51v-26.41c0-7.87-3.16-11.81-9.49-11.81-3.35,0-6.01,1.1-8,3.3-1.98,2.2-2.98,5.47-2.98,9.81v25.11h-14.51V19.72h13.86v5.77c1.86-2.11,4.14-3.72,6.84-4.84s5.66-1.67,8.88-1.67c3.53,0,6.73,.7,9.58,2.09,2.85,1.4,5.15,3.43,6.88,6.09,2.05-2.6,4.63-4.62,7.76-6.04,3.13-1.43,6.56-2.14,10.28-2.14,6.26,0,11.24,1.85,14.93,5.53Z"/>
							<path d="M0,4.36H4.73V69.31H0V4.36Z"/>
							<path d="M62.72,41.01v28.3h-4.64v-27.93c0-10.95-5.85-16.7-15.68-16.7-11.41,0-18.37,7.33-18.37,18.84v25.79h-4.64V20.88h4.45v10.48c3.25-6.77,10.02-10.86,19.21-10.86,11.78,0,19.67,6.96,19.67,20.51Z"/>
							<path d="M81.73,13.83v7.05h15.5v3.99h-15.4v44.44h-4.64V24.87h-8.91v-3.99h8.91v-7.42C77.19,5.38,82.01,.1,90.64,.1c3.53,0,7.24,1.02,9.56,3.15l-1.86,3.53c-1.95-1.76-4.64-2.69-7.52-2.69-6.03,0-9.09,3.34-9.09,9.74Z"/>
							<path d="M98.71,45.1c0-14.38,10.3-24.59,24.22-24.59s24.22,10.21,24.22,24.59-10.3,24.59-24.22,24.59-24.22-10.21-24.22-24.59Zm43.7,0c0-12.15-8.35-20.41-19.49-20.41s-19.48,8.26-19.48,20.41,8.35,20.41,19.48,20.41,19.49-8.26,19.49-20.41Z"/>
							<path d="M179.8,20.51v4.55c-.37,0-.74-.09-1.11-.09-10.76,0-17.16,7.14-17.16,19.11v25.24h-4.64V20.88h4.45v10.58c2.97-7.05,9.37-10.95,18.46-10.95Z"/>
						</svg>
					</a>

					<nav class="menu" aria-label="Menu" data-menu>

					<form class="menu-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="menu-search-container">
							<label class="sr-only" for="<?php echo esc_attr( $infor_unique_id ); ?>">
								<span class="sr-only"><?php _e( 'Search for:', 'infor' ); ?></span>
							</label>
							<input class="menu-search-input" type="search" id="<?php echo esc_attr( $infor_unique_id ); ?>" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'infor' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
							<button type="submit" class="menu-search-btn">
								Search
							</button>
						</div>
					</form>

						<ul class="menu-list">
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

					<div class="header-toggles">

						<a class="search-toggle" href="/search">
							<span>Search</span>
						</a>

						<button class="menu-toggle" type="button" aria-label="Toggle menu" data-menu-toggle>
							<span>Toggle menu</span>
						</button>

					</div>
				
				</div>

			</div>

		</header>



