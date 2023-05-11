<?php
/**
 * Template Name: Home
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

      <div class="container --center --lg">
        <div class="text-block">
          <?php the_content(); ?>
        </div>
      </div>

      <?php if(get_field('card') && have_rows('card')): ?>
        <div class="container --reduced">
          <div class="grid --reduced">
          
            <div class="row">
            
              <?php while(have_rows('card')): the_row(); ?>
              <?php 
                $card_title = get_sub_field('card_title');
                $card_content = get_sub_field('card_content');
                $card_link = get_sub_field('card_link');             
                $card_icon = get_sub_field('card_icon');                  
              ?>
                <div class="col --md-6 --lg-4">
                
                  <?php if( $card_icon ): ?>
                  <div class="card card-has-icon --outline">
                  <?php else: ?>
                  <div class="card --outline">
                  <?php endif; ?>

                    <?php if( $card_icon ): ?>
                      <div class="card-icon">
                        <img src="<?php echo esc_url($card_icon['url']); ?>" alt="<?php echo esc_attr($card_icon['alt']); ?>" />
                      </div>
                    <?php endif; ?>
                    
                    <div class="card-content">
                      <?php if( $card_title ): ?>
                        <h3 class="heading heading--4 --weight-medium"><?php echo $card_title; ?></h3>
                      <?php endif; ?>
                      <?php if( $card_content ): ?>
                        <div class="text-block --sm">
                          <?php echo $card_content; ?>
                        </div>
                      <?php endif; ?>

                      <?php if( $card_link ): ?>
                        <a class="btn --tertiary --caret" href="<?php echo esc_url( $card_link['url'] ); ?>" target="<?php echo esc_attr( $card_link['target'] ); ?>">
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

    </div>

  </div>

  <?php if(get_field('banner_headline') || get_field('banner_content')): ?>
    <div class="layer --contrast bg--knowledge bg--geometric-cubes">
                          
      <div class="wrapper">
      
        <?php 
          $banner_headline = get_field('banner_headline');
          $banner_content = get_field('banner_content');
          $banner_cta_1 = get_field('banner_cta_1');      
          $banner_cta_2 = get_field('banner_cta_2');                              
        ?>
        <?php if( $banner_headline || $banner_content): ?>
          <div class="container --md">
            <?php if( $banner_headline ): ?>
              <h3 class="heading heading--2"><?php echo $banner_headline; ?></h3>
            <?php endif; ?>
            <?php if( $banner_content ): ?>
              <div class="text-block --md">
                <?php echo $banner_content; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if( $banner_cta_1 || $banner_cta_2 ): ?>
          <div class="button-group">
            <?php if( $banner_cta_1 ): ?>
              <a class="btn --secondary --caret" href="<?php echo esc_url( $banner_cta_1['url'] ); ?>" target="<?php echo esc_attr( $banner_cta_1['target'] ); ?>">
                <?php echo esc_html( $banner_cta_1['title'] ); ?>
              </a>
            <?php endif; ?>

            <?php if( $banner_cta_2 ): ?>
              <a class="btn --contrast --outline --caret" href="<?php echo esc_url( $banner_cta_2['url'] ); ?>" target="<?php echo esc_attr( $banner_cta_2['target'] ); ?>">
                <?php echo esc_html( $banner_cta_2['title'] ); ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      </div>

    </div>
  <?php endif; ?>

</main>

<?php get_footer(); ?>