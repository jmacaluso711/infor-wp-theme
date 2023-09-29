<?php
  /**
   * Card Icons Template.
   *
   * @param   array $block The block settings and attributes.
   * @param   string $content The block inner HTML (empty).
   * @param   bool $is_preview True during backend preview render.
   * @param   int $post_id The post ID the block is rendering content against.
   *          This is either the post ID currently being displayed inside a query loop,
   *          or the post ID of the post hosting this block.
   * @param   array $context The context provided to the block by the post or it's parent block.
   */

  $version = empty(get_field('version', $block['id'])) ? 'latest' : get_field('version', $block['id']);
  $base_url = 'https://design.infor.com/api/docs/ids-identity/' . $version . '/theme-new/icons';
  $api_url = $base_url . '/standard/metadata.json';

  $response = wp_remote_get($api_url);
  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body, true);
  $icons = !empty($data['error']) || empty($data['categories']) ? [] : array_reduce($data['categories'], function ($acc, $category) {
    return array_merge($acc, $category['icons']);
  }, []);
  sort($icons);
?>

<?php if (!empty($data['error'])) : ?>
  <div class="alert alert-danger" role="alert">
    <?php echo 'API call failed' ?>
  </div>
<?php else : ?>
  <section class="icons <?php echo esc_attr( $vertical_spacing_classes ); ?>">
    <input id="icons-filter" type="text" name="icons-filter" class="focus:outline-none  focus:border-[#0075e9]  search border border-ids-slate-50 py-2 px-3 rounded-md w-full mb-6" placeholder="Filter icons"/>
    <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 elastic !pl-0" >
      <?php foreach ($icons as $icon) :
          $download_png = "$base_url/standard/png/$icon.png?download=true";
          $download_svg = "$base_url/standard/svg/$icon.svg?download=true";
        ?>
        <li class="!list-none h-[7.5rem] border border-solid border-ids-graphite-20 rounded-sm flex flex-col justify-center items-center p-2.5 group/item relative " data-icon-name="<?php echo $icon ?>">
          <?php echo get_custom_icon($icon, "h-[18px] w-[18px]") ?>
          <span class="text-sm text-center mt-2.5 leading-none"><?php echo $icon ?></span>
          <div class="absolute group/edit invisible group-hover/item:visible text-sm flex w-full justify-around bottom-[10px]">
            <a title="SVG" class="font-semibold text-[16px] !no-underline hover:!no-underline !text-[#4da6ff]  hover:!text-[#0563c2]" download="true" target="_blank" href="<?php echo $download_svg; ?>">SVG</a>
            <a title="PNG" class="font-semibold text-[16px] !no-underline hover:!no-underline !text-[#4da6ff]  hover:!text-[#0563c2]"  download="true" target="_blank" href="<?php echo $download_png; ?>">PNG</a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>
