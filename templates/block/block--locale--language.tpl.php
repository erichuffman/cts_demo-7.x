<?php

/**
 * @file
 * Default theme implementation to display the language switcher block.
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> language-switcher"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>

  <div class="block__content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
</div>
