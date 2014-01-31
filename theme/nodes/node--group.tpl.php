<?php

hide($content['field_group_logo']);
hide($content['field_topics']);
hide($content['group_group']);

?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="title-area">
    <span class="content-type">
      <?php print 'Comunidade'; ?>
    </span>
    <?php print render($title_prefix); ?>
    <h2 class="node-title" <?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
    <?php print render($title_suffix); ?>
  </div>

  <div class="logo-banner-container">
    <?php print render($content['field_banner']); ?>
  </div>

  <div id="grupo-content-container" class="panel-collapse collapse content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <div class='grupo-rodape'>

    <ul class="nav nav-pills">
      <li>
        <buttom data-toggle="collapse" data-parent="#accordion" href="#grupo-content-container" type="buttom" class="btn btn-primary sobre-grupo-toggler collapsed">
          Sobre a comunidade <span class="glyphicon "></span>
        </buttom>
      </li>
      <li>
        <?php print render($content['group_group']); ?>
      </li>
      <li>
        <?php print render($content['field_topics']); ?>
      </li>

    </ul>

  </div>

  <div class="node-links-container clearfix">
    <?php print render($content['links']); ?>
  </div>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
