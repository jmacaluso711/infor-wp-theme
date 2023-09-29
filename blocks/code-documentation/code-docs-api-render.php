<?php
  // Include vertical "row" spacing helper
  include_once get_template_directory() . '/inc/vertical-spacing-helper.php';
  $verticalSpacing = get_field('vertical_spacing');
  $vertical_spacing_classes = get_vertical_spacing_classes($verticalSpacing);

  // Code documentation render callback
  function code_docs_api_render($block) {
    $library = get_field('library', $block['id']);
    $version = get_field('version', $block['id']);
    $component = get_field('component', $block['id']);

    $api_url = 'https://design.infor.com/api/docs/'.$library.'/'.$version.'/docs'.'/'.$component.'.json';

    if ($api_url) {
      $response = wp_remote_get($api_url);

      if (is_wp_error($response)) {
        echo 'API call failed. Error: ' . $response->get_error_message();
      } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if ($data) {
          // Output the API response data
          ob_start();
          ?>
          <section class="code-documentation <?php echo esc_attr( $vertical_spacing_classes ); ?>">
            <h2>Code</h2>
            <?php foreach ($data as $key => $value) : ?>
              <?php if (is_array($value)) : ?>
                <?php foreach ($value as $key => $v) : ?>
                  <?php
                    if ($key === 'embedded') :
                    $name = $v[0]['name'];
                    $slug = $v[0]['slug'];
                  ?>
                    <section class="mt-6">
                      <?php if (isset($name) && is_string($name)) : ?>
                        <h3><?php echo $name; ?></h3>
                      <?php endif; ?>
                      <?php $demo_url = 'https://design.infor.com/code/'.$library.'/'.$version.'/demo/components/'.$component.'/'.$slug.'?theme=uplift&variant=light&layout=embedded'; ?>
                      <div class="code-demo border border-ids-graphite-20 mt-2 mb-8">
                        <iframe height="500px" width="100%" src="<?php echo $demo_url; ?>"></iframe>
                      </div>
                    </section>
                  <?php endif; ?>
                  <?php if ($key === 'pages') : ?>
                    <section style="margin-top: 2rem;" class="mt-6">
                      <h2 class="border-b pb-3 !mb-0">Usage Examples</h2>
                      <ul class="!mt-0 !mb-0 !p-0">
                      <?php foreach ($v as $key => $page) : ?>
                        <?php
                          $demo_link = 'https://design.infor.com/code/'.$library.'/'.$version.'/demo/components/'.$component.'/'.$page['slug'].'?theme=uplift&variant=light';
                          //$github_link
                        ?>
                        <li class="!list-none py-3 border-b border-ids-slate-20">
                          <a href="<?php echo $demo_link; ?>" target="_blank"><?php echo $page['name']; ?></a>
                        </li>
                      <?php endforeach; ?>
                      </ul>
                    </section>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else : ?>
                <?php if ($key !== 'title') : ?>
                  <?php if (is_string($value)) : ?>
                    <div style="margin-top: 2rem;"><?php echo wp_kses_post($value); ?></div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </section>
          <?php
          // End output buffering and display the buffered content
          echo ob_get_clean();
        } else {
          echo 'Invalid API response.';
        }
      }
    } else {
      echo 'API URL is not provided.';
    }
  }
