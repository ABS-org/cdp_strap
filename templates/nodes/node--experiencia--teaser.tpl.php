<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="cabecalho">
    <?php if ($display_submitted): ?>
      <div class="submitted">
        <?php print $user_picture; ?>
        <?php print $submitted; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
