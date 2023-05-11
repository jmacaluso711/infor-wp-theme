<?php
/**
 * Displays the search form
 *
 * @package WordPress
 * @subpackage Infor_Documentation
 */

?>

<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label class="sr-only" for="<?php echo esc_attr( $infor_unique_id ); ?>">
    <span class="sr-only"><?php _e( 'Search for:', 'infor' ); ?></span>
  </label>
  <input class="search-form__input" type="search" id="<?php echo esc_attr( $infor_unique_id ); ?>" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'infor' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  <button type="submit" class="search-form__btn">
    Search
  </button>
</form>