
<?php if(isset($root_content_node) ): ?>
  <?php print $root_content_node; ?>
<?php endif; ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
    
    <?php if(isset($node->subtitle) ): ?>
      <h6 class="subtitle">
        <a href="<?php print $node_url; ?>">
          <?php print $title; ?>
        </a>
      </h6>
      <h2<?php print $title_attributes; ?>>
        <a href="<?php print $node->subtitleUrl; ?>"><?php print $node->subtitle; ?></a>
      </h2>      
    <?php else: ?>

      <h2<?php print $title_attributes; ?>>
        <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
      </h2>
    <?php endif; ?>

  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php if($content_next_and_previus): ?>
    <?php print $content_next_and_previus; ?>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
