
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="view-row clearfix">
    <div class="img img-circle pull-left">
      <?php print render($content['field_course_logo']); ?>
    </div>

    <a class="wrapper-list-item" href="<?php print $node_url; ?>">
      <div class="content">
        <h3><?php print $title; ?></h3>
        <div class="desc">
          <?php print render($content['body']); ?>
        </div>
        <div class="organizadores">
          <?php print render($content['field_responsible_for_course']); ?>
        </div>
      </div>
    </a>

    <div class="row-footer clearfix">
      <div class="botoes pull-left">
        <?php print render($content['rate_love']); ?>
        <span class="btn btn-users" >
          <span class="glyphicon glyphicon-user"></span>
          <span class="text"><?php print $members_count; ?></span>
        </span>
        <?php print render($content['group_group']); ?>
      </div>
      <div class="outras-infos">
        <div class="tipo-curso">
          <strong>Acesso:</strong>
          <span class="curso-aberto"></span><?php print $course_access ?></span>
        </div>
        <div class="tags">
          <?php print render($content['field_tags']); ?>
        </div>
      </div>
    </div>
  </div>

</div>
