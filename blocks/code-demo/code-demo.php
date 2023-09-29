<?php
  /**
   * Code Demo Block Template.
   *
   * @param   array $block The block settings and attributes.
   * @param   string $content The block inner HTML (empty).
   * @param   bool $is_preview True during backend preview render.
   * @param   int $post_id The post ID the block is rendering content against.
   *          This is either the post ID currently being displayed inside a query loop,
   *          or the post ID of the post hosting this block.
   * @param   array $context The context provided to the block by the post or it's parent block.
   */

  // Support custom "anchor" values.
  $anchor = '';
  if ( ! empty( $block['anchor'] ) ) {
      $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
  }

  // Create class attribute allowing for custom "className" and "align" values.
  $class_name = 'code-documentation-block';
  if ( ! empty( $block['className'] ) ) {
      $class_name .= ' ' . $block['className'];
  }
  if ( ! empty( $block['align'] ) ) {
      $class_name .= ' align' . $block['align'];
  }

  // Load values and assign defaults.
  $library = get_field( 'library' ) ?: 'Library';
  $version = get_field( 'version' ) ?: 'Version';
  $component = get_field( 'component' ) ?: 'Component';
  $example = get_field( 'example' ) ?: 'Example';

  // Include vertical "row" spacing helper
  include_once get_template_directory() . '/inc/vertical-spacing-helper.php';
  $verticalSpacing = get_field('vertical_spacing');
  $vertical_spacing_classes = get_vertical_spacing_classes($verticalSpacing);

  // Build a valid style attribute for background and text colors.
  // $styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
  // $style  = implode( '; ', $styles );

?>
<section class="code-demo-block border border-ids-graphite-20 mt-4 mb-8 <?php echo esc_attr( $class_name ); ?> <?php echo esc_attr( $vertical_spacing_classes ); ?>" <?php echo $anchor; ?> style="<?php echo esc_attr( $style ); ?>">
  <?php $demo_url = 'https://design.infor.com/code/'.$library.'/'.$version.'/demo/components/'.$component.'/'.$example.'?theme=uplift&variant=light&layout=embedded'; ?>
  <iframe height="500px" width="100%" src="<?php echo $demo_url; ?>"></iframe>
</section>

