<?php
/**
 * Template Name: Search Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

get_header();
?>

<main class="main">

  <?php get_template_part( 'template-parts/entry-header' ); ?>

  <div class="layer">

    <div class="wrapper">

      <?php get_template_part( 'template-parts/search-form' ); ?>

    </div>

  </div>

</main>

<?php get_footer(); ?>