<?php

/**
 * @file
 * Template para o tipo de conteúdo relato dos profissionais do DAB relato_de_experi_ncia_dab_curado
 */
$relato_link = url(drupal_get_path_alias('node/' . $node->nid), array('absolute' => TRUE));

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="cabecalho row">

    <?php if ($view_mode == 'teaser'): ?>
      <?php if ($display_submitted): ?>
        <div class="submitted col-md-8">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
          <?php print render($content['og_group_ref']); ?>
        </div>
      <?php endif; ?>
    <?php else: ?>

      <?php if ($display_submitted): ?>
        <div class="submitted col-md-8">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>

          <?php print render($content['og_group_ref']); ?>

        </div>
      <?php endif; ?>

      <div class="node-relato-menu col-md-4">
        <a href="#autores-atores" class="autores-relato-atores-experiencia">
          Autores do relato e Atores da experiência
        </a>
      </div>
    <?php endif; ?>

  </div>

  <div class="destacado clearfix">
    <?php print render($content['field_imagem_de_destaque']); ?>
    <header>
      <?php print render($title_prefix); ?>
        <h2<?php print $title_attributes; ?>>
          <a rel="bookmark" href="<?php print $node_url; ?>">
            <?php print $title; ?>
          </a>
        </h2>
      <?php print render($title_suffix); ?>

      <?php print render($content['field_descricao']); ?>
    </header>

  </div>

  <div class="dados-da-experiencia row clearfix">
    <div class="dados-da-experiencia-header col-md-12">
      <h3 class="dados-da-experiencia-subject">
        Dados da Experiência
      </h3>
      <?php print render($content['field_cidade']); ?>
    </div>
      <div class="esquerda col-md-6">
        <?php print render($content['field_experiencia_ambito']); ?>
        <?php print render($content['field_experiencia_catespecificas']); ?>
      </div>

      <div class="direita col-md-6">
        <?php print render($content['field_envolve_quais_pontos_equip']); ?>
        <?php print render($content['field_temas']); ?>
      </div>
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
