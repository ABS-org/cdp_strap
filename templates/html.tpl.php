<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces;?>>
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <div id="barra-brasil">
      <div class="barra">
          <ul>
              <li><a target="_blank" title="Acesso à informação" class="ai" href="http://www.acessoainformacao.gov.br">www.sic.gov.br</a></li>
              <li><a target="_blank" title="Portal de Estado do Brasil" class="brasilgov" href="http://www.brasil.gov.br">www.brasil.gov.br</a></li>
          </ul>
      </div>
  </div>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

  <div id="help-modal-info" class="modal" tabindex="-1" role="dialog" aria-labelledby="help-modal-info" aria-hidden="true"></div><!-- /.modal -->

  <!-- Scripts at bottom of page for fast loading -->
  <?php print $scripts; ?>
  
</body>
</html>
