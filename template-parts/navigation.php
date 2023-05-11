<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

	$pagelist = get_pages('sort_column=menu_order&sort_order=asc');
	$pages = array();
	foreach ($pagelist as $page) {
   $pages[] += $page->ID;
	}
	$current = array_search(get_the_ID(), $pages);
	$prevID = $pages[$current-1];
	$nextID = $pages[$current+1];
?>


<nav class="post-navigation">

	<div class="post-navigation-container <?php if ( !$prevID ) { ?>align-right<?php }?>">

		<?php if ( $prevID ) { ?>

			<a class="post-link post-link--previous" href="<?php echo esc_url( get_permalink( $prevID ) ); ?>">
				Previous
				<span class="title"><?php echo wp_kses_post( get_the_title( $prevID ) ); ?></span>
			</a>

		<?php }
			if ( $nextID ) {
		?>

			<a class="post-link post-link--next" href="<?php echo esc_url( get_permalink( $nextID ) ); ?>">
				Next
				<span class="title"><?php echo wp_kses_post( get_the_title( $nextID ) ); ?></span>
			</a>
		<?php } ?>

	</div>

</nav>
