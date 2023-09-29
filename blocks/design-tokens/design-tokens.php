<?php
  /**
   * Card Design tokens Template.
   *
   * @param   array $block The block settings and attributes.
   * @param   string $content The block inner HTML (empty).
   * @param   bool $is_preview True during backend preview render.
   * @param   int $post_id The post ID the block is rendering content against.
   *          This is either the post ID currently being displayed inside a query loop,
   *          or the post ID of the post hosting this block.
   * @param   array $context The context provided to the block by the post or it's parent block.
   */
  $base_url = 'https://design.infor.com/api/docs/ids-identity/latest/theme-new/tokens/web/';
  $default_url = $base_url . 'theme-new.simple.json';
  $dark_url = $base_url . 'theme-new-dark.simple.json';
  $contrast_url = $base_url . 'theme-new-contrast.simple.json';

  $response_default = wp_remote_get($default_url);
  $body_default = wp_remote_retrieve_body($response_default);
  $data_default = json_decode($body_default, true);

  $response_dark = wp_remote_get($dark_url);
  $body_dark = wp_remote_retrieve_body($response_dark);
  $data_dark = json_decode($body_dark, true);

  $response_contrast = wp_remote_get($contrast_url);
  $body_contrast = wp_remote_retrieve_body($response_contrast);
  $data_contrast = json_decode($body_contrast, true);

  function get_types($item) {
    return $item['type'];
  }

  $types = array_map('get_types', $data_default);
  $types = array_unique($types);
?>

<div class="max-w-[750px]">
  <div class="flex justify-between">
    <h3 class="!text-[28px]">All tokens</h3>
    <form class="flex flex-col">
      <label for="theme" class="text-[#606066]">Theme</label>
      <select name="theme" id="token-theme-switcher" class="text-[13.333px] border border-solid border-ids-slate-40 w-[185px] rounded-sm px-3 py-[7px] cursor-pointer">
        <option value="default">Default</option>
        <option value="dark">Dark</option>
        <option value="contrast">Contrast</option>
      </select>
    </form>
  </div>
  <?php foreach ($types as $type) : ?>
    <h2 class="capitalize font-bold"><?php echo $type; ?></h2>
    <table class="border-none">
      <thead class="!bg-transparent !bg-opacity-0 font-bold border-none border-0 border-transparent">
        <tr class="border-none border-0 border-transparent">
          <th class="px-0">Token</th>
          <?php if ($type === 'color') : ?>
            <th class="px-0">Example</th>
          <?php endif; ?>
          <th class="px-0">Value</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data_default as $index => $item) :
          $sass = $item['name']['sass'];
          $value = $item['value'];
          if ($type === $item['type']) :
            ?>
              <tr
                class="token-data-container border-none"
                data-default="<?php echo $value;?>"
                data-dark="<?php echo $data_dark[$index]['value'] ?>"
                data-contrast="<?php echo $data_contrast[$index]['value'] ?>"
              >
                <td class="w-6/12 py-[16px] px-0"><?php echo $sass ;?></td>
                <?php if ($item['type'] === 'color') : ?>
                  <td class="w-3/12">
                    <div
                      class="token-data-example h-6 w-[110px] px-0" title="<?php echo $value; ?>"
                      style="background-color:<?php echo $value; ?>"
                    ></div>
                  </td>
                <?php endif; ?>
                <td class="token-data-value px-0"><?php echo $value;?></td>
              </tr>
            <?php
          endif;
        endforeach; ?>
      </tbody>
    </table>
  <?php endforeach; ?>
<div>
