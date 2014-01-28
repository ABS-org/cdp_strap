<div class="panel panel-default">
  <div class="panel-body">  
  <section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h2<?php print $title_attributes; ?>>Amigos</h2>
      <p>Comunidade de práticas e Saúde</p>
    <?php endif;?>
    <?php print render($title_suffix); ?>

    <?php print $content ?>

  </section>
  </div>
</div>
<!-- /.block -->
