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

<li class="listing__item" id="post-<?php the_ID(); ?>">

  <?php
  if ( is_singular() ) {
    the_title( '<h2 class="heading heading--3">', '</h1>' );
  } else {
    the_title( '<h2 class="heading heading--3"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
  }

  if ( has_excerpt()) {
  ?>

    <div class="text-block">
      <?php the_excerpt(); ?>
    </div>

  <?php }?>

</li>
