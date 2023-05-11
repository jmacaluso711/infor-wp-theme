<?php
/**
 * Template Name: Landing w/ Sidebar
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

      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

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
                    
              <div class="container">
                <div class="text-block">
                  <?php the_content(); ?>
                </div>
              </div>

              <?php if(have_rows('card')): ?>
                <div class="container --ultra-reduced">
                
                  <div class="grid --reduced">
                  
                    <div class="row">
                    
                     <?php while(have_rows('card')): the_row(); ?>
                      <?php 
                        $card_title = get_sub_field('card_title');
                        $card_content = get_sub_field('card_content');
                        $card_link = get_sub_field('card_link');                             
                      ?>
                        <div class="col --md-6">
                        
                          <div class="card">
                            
                            <div class="card-content">
                              <?php if( $card_title ): ?>
                                <h3 class="heading heading--3"><?php echo $card_title; ?></h3>
                              <?php endif; ?>
                              <?php if( $card_content ): ?>
                                <div class="text-block --sm">
                                  <?php echo $card_content; ?>
                                </div>
                              <?php endif; ?>

                              <?php if( $card_link ): ?>
                                <a class="btn --primary --outline --caret" href="<?php echo esc_url( $card_link['url'] ); ?>" target="<?php echo esc_attr( $card_link['target'] ); ?>">
                                  <?php echo esc_html( $card_link['title'] ); ?>
                                </a>
                              <?php endif; ?>
                            </div>

                          </div>

                        </div>
                      <?php endwhile; ?>

                    </div>

                  </div>
              
                </div>
              <?php endif; ?>

              <div class="container container--reduced">
                <?php get_template_part( 'template-parts/navigation' ); ?>
              </div>

            </div>

          </div>

        </div>

      </article>

    </div>

  </div>

</main>

<?php get_footer(); ?>