<header id="navbar" role="banner" class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <?php if ($logo): ?>
      <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
      <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation']) || !empty($page['main_search']) ): ?>
      <div class="navbar-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>

          <?php if (!empty($secondary_nav)): ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>

          <div class="user-search-container">
            <?php if (!empty($page['main_search'])): ?>
              <?php print render($page['main_search']); ?>
            <?php endif; ?>

            <?php if (!empty($page['user_menu'])): ?>
              <?php print render($page['user_menu']); ?>
            <?php endif; ?>
          </div>

          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
</header>
<!-- barraCores //-->
<div id="barraCores">
</div>

<?php include( "cadastrese.tpl.php"); ?>

<div class="main-container container">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#header -->

  <div class="breadcrumb-wrapper row">
    <div class="col-md-12">
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
    </div>
  </div>
  
  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['user_side_block']); ?>
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section id="main-content-area" <?php print $content_column_class; ?>>

      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>

      <div id="main-content-inner">
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <h1 class="page-header"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
      </div>

      <?php if (!empty($page['post_content'])): ?>
       <div class="post-content">
          <?php print render($page['post_content']); ?>
        </div>
      <?php endif; ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>

  <div class="row after-content">

  <section id="after-content-left" class="col-sm-4 col-md-3">
    <?php if (!empty($page['after_content_left'])): ?>  
      <?php print render($page['after_content_left']); ?>
     <?php endif; ?>  
  </section><!-- /#after_content_left -->

  <section id="after-content-right" class="col-sm-8 col-md-9">
    <?php if (!empty($page['after_content_right'])): ?>
      <?php print render($page['after_content_right']); ?>
    <?php endif; ?>  
  </section>

  </div>
</div>


<footer class="footer container">
  <?php print render($page['footer']); ?>

  <div class="footer-logos row">
    <div class="col-md-5 promocao">
      <p class"text-muted">Promoção</p>
      <a href="http://dab.saude.gov.br/" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/saude.png"></a>
      <a href="http://www.saude.gov.br" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/sus.png"></a>
      <a href="http://www.saude.gov.br" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/governo.png"></a>
    </div>
    <div class="col-md-5 parcerias">
      <p class"text-muted">Parcerias</p>
      <a href="http://www.communitas.org.br" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/communitas.png"></a>
      <a href="http://www.opas.org.br" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/pan.png"></a>
      <a href="http://www.otics.org" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/oties.png"></a>
      <a href="http://atencaointegrada.org/" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/atencaointegrada.png"></a>
    </div>
    <div class="col-md-2 selos">
      <p class"text-muted">Selos</p>
      <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/br/deed.pt_BR" rel="license" target="_blank"><img alt="Creative Commons License" src="/sites/all/themes/cdp_strap/images/logos/creative.png"></a>
      <a href="http://www.w3.org/" target="_blank"><img src="/sites/all/themes/cdp_strap/images/logos/w3c.png"></a>
    </div>
  <div>


</footer>
