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

					<a href="/">
            <svg _ngcontent-kbu-c1="" fill="none" height="48" viewBox="0 0 53 48" width="53" xmlns="http://www.w3.org/2000/svg"><path _ngcontent-kbu-c1="" d="M52.2597 45.1968C52.4861 45.3236 52.6733 45.509 52.8013 45.7333C52.9316 45.9659 53 46.2275 53 46.4936C53 46.7596 52.9316 47.0213 52.8013 47.2539C52.6688 47.4801 52.4778 47.6673 52.248 47.7961C52.0147 47.9276 51.7509 47.9967 51.4824 47.9967C51.214 47.9967 50.9502 47.9276 50.7168 47.7961C50.4899 47.6663 50.3017 47.4792 50.1713 47.2539C50.0403 47.0229 49.9714 46.7624 49.9714 46.4974C49.9714 46.2325 50.0403 45.972 50.1713 45.741C50.3019 45.5152 50.4909 45.328 50.7188 45.1987C50.9543 45.0684 51.2195 45 51.4893 45C51.759 45 52.0242 45.0684 52.2597 45.1987V45.1968ZM52.1506 47.6321C52.3478 47.5178 52.5111 47.3541 52.624 47.1574C52.7366 46.9536 52.7955 46.7249 52.7955 46.4926C52.7955 46.2603 52.7366 46.0317 52.624 45.8278C52.5136 45.6332 52.352 45.4718 52.1565 45.3608C51.9513 45.2476 51.7202 45.1882 51.4853 45.1882C51.2504 45.1882 51.0194 45.2476 50.8142 45.3608C50.6167 45.4738 50.4533 45.637 50.3408 45.8336C50.2285 46.0358 50.1695 46.2628 50.1695 46.4936C50.1695 46.7243 50.2285 46.9514 50.3408 47.1535C50.4548 47.3519 50.6202 47.5166 50.8198 47.6305C51.0195 47.7445 51.2462 47.8037 51.4766 47.8019C51.7127 47.8074 51.9458 47.7487 52.1506 47.6321ZM52.1623 46.5553C52.0971 46.646 52.0042 46.7137 51.8974 46.7483L52.287 47.3465H51.9909L51.6363 46.8023H51.1688V47.3465H50.8766V45.6483H51.5623C51.7452 45.6383 51.9257 45.6938 52.0708 45.8046C52.1335 45.8554 52.1837 45.9196 52.2175 45.9926C52.2513 46.0655 52.2677 46.1451 52.2656 46.2253C52.2682 46.3424 52.2349 46.4574 52.1701 46.5553H52.1623ZM51.8604 46.4781C51.8979 46.4482 51.9278 46.4098 51.9474 46.3662C51.9671 46.3226 51.976 46.275 51.9734 46.2273C51.976 46.1801 51.9671 46.133 51.9474 46.09C51.9277 46.047 51.8979 46.0094 51.8604 45.9803C51.7667 45.9165 51.6543 45.8853 51.5409 45.8915H51.1649V46.5669H51.5409C51.6544 46.574 51.7671 46.5427 51.8604 46.4781Z" fill="white"></path><path _ngcontent-kbu-c1="" d="M48.4571 0H0V48H48.4571V0Z" fill="#D5000E"></path><path _ngcontent-kbu-c1="" d="M4.32631 29.6596H7.39073V19.8196H4.32631V29.6596ZM9.0281 29.6596H12.0943V24.7594C12.0943 23.4836 12.3393 22.2491 13.9333 22.2491C15.5272 22.2491 15.5272 23.7057 15.5272 24.8404V29.6614H18.5933V24.2326C18.5933 21.5999 18.0215 19.5837 14.9136 19.5837C12.4871 19.5837 11.9656 20.7236 11.9656 20.7236V19.8196H9.0281V29.6596ZM20.229 29.6596H23.2951V22.256H25.5548V19.8196H23.2951V18.2597C23.2951 16.9649 23.7853 16.6601 24.7674 16.6601C25.1108 16.6668 25.4501 16.7356 25.7686 16.8633L25.9111 14.2927C25.3212 14.1593 24.717 14.098 24.1121 14.1102C20.7817 14.1102 20.229 15.9318 20.229 18.0789V29.6596ZM31.482 19.5837C28.4158 19.5837 25.9632 21.6086 25.9632 24.7491C25.9632 27.8896 28.4158 29.9145 31.482 29.9145C34.5481 29.9145 37.0007 27.8896 37.0007 24.7491C37.0007 21.6086 34.5464 19.5837 31.482 19.5837ZM31.482 27.2371C29.9489 27.2371 29.0294 26.2247 29.0294 24.7457C29.0294 23.2666 29.9489 22.256 31.482 22.256C33.015 22.256 33.9345 23.2684 33.9345 24.7457C33.9345 26.223 33.015 27.2371 31.482 27.2371ZM38.2018 29.6665H41.2662V25.6565C41.2662 23.6936 41.553 22.0321 43.8839 22.0321C44.3271 22.0384 44.7672 22.1068 45.191 22.2353V19.57C42.0623 19.4357 41.2662 20.6788 41.2662 20.6788V19.8179H38.2018V29.6665ZM4.32631 18.2063H7.39073V14.4958L4.32631 16.5775V18.2063Z" fill="white"></path></svg>
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




