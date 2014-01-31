<?php

/**
 * @file
 * theme implementation to display a course.
 * <?php print $user_picture; ?>
 * <?php print render($content['group_group']); ?>
 */
hide($content['field_certified_by_dab']);
//$x = get_defined_vars();
//kpr($x['content']);
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="title-creator-area row">
    <div class="title-area col-xs-12 col-md-12">
      <span class="content-type"><?php print t($type); ?></span>
      <h2 class="node-title"><?php print $title; ?></h2>
    </div>

  </div>

  <div class="banner-and-description row">
    <div class="banner col-xs-12 col-md-12">
      <?php print render($content['field_banner']); ?>
      </div>
    </div>
  </div>

  <div class="certified-and-course-actions row">
    <?php if( $is_dab_certified ): ?>

      <div class="is-certified certified-area col-xs-6 col-md-6">
        <span class="certified-by-dab">Certifidado pelo DAB</span>

        <div class="creator-area">
          <div class="creator-name">
            <?php print $responsaveis; ?>
          </div>
        </div>

      </div>

    <?php else: ?>

      <div class="certified-area col-xs-12 col-md-6">

        <div class="creator-area">
          <div class="creator-name">
            <?php print $responsaveis; ?>
          </div>
        </div>

      </div>

    <?php endif; ?>

    <div class="course-actions col-xs-12 col-md-6">

      <?php if($course_access_type_status == 'close'): ?>

        <?php print render($rate_love); ?>
        <div class="actions-button">
          <a text="Curso fechado/sem acesso" class="course_access_type_status btn btn-danger disabled course_access_type_status pull-right">Curso fechado!</a>

          <?php hide($content['group_group']); ?>
        </div>

      <?php else: ?>

        <?php print render($rate_love); ?>
        <div class="actions-button">
          <span class="btn btn-users" >
            <span class="glyphicon glyphicon-user"></span>
            <span class="text"><?php print $members_count; ?></span>
          </span>
          <?php print $enter_in_course_btn; ?>
          <?php print render($content['group_group']); ?>
        </div>

      <?php endif; ?>

    </div>

  </div>

  <div class="course-row-2 row">
    <div class="sobre col-xs-12 col-md-8">
      <div class="content">
        <h3>Sobre o curso</h3>
        <?php print render($content['body']); ?>

        <?php print render($content['field_carga_horaria']); ?>
        <?php print render($content['field_a_quem_se_destina_']); ?>
      </div>
    </div>

    <div class="data-and-coordenadores col-xs-12 col-md-4">

      <div class="data">
        <?php print render($content['field_thematic_area_course']); ?>

        <?php print render($content['field_tags']); ?>

        <div class="course-access-type">
          <span><strong><?php print t('Course access: '); ?></strong></span>
          <span class="access-type"><?php print $course_access_type; ?></span>
        </div>
      </div>
      <div class="coordenadores">
        <h3 class="coordenadores-title">Facilitadores</h3>
        <?php print _cdp_courses_block_course_organizers_lists(); ?>
      </div>
    </div>
  </div>
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
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

    <?php print render($content['comments']); ?>

</div>
