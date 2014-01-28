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

<!-- menu //-->
<div class="colunaMenu" >
  <div id="menuDaComunidades">
      <ul class="menuUl">
        <li><a href="#pessoasMarcaoAncora" class="pessoa" ><span>Pessoas</span></a></li>
        <li><a href="#comunidadeMarcacaoAncora" class="comunidade" ><span>Comunidades</span></a></li>
        <li><a class="cursos" href="#cursosMarcacaoAncora"><span>Cursos</span></a></li>
        <li><a href="#mostraMarcacaoAncora" class="ivmostra" ><span>IV Mostra</span></a></li>
        <li><a class="webtv" href="#webtvMarcacaoAncora"><span>Webtv</span></a></li>
      </ul>
  </div>
</div>

<!-- topo para cadastra-se //-->
<?php include( "cadastrese.tpl.php"); ?>

<div class="main-container container">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
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



<!-- Bg pattern //-->
<div class="conteudoBg">
<!-- começa o contéudo //-->



<div id="conteudo">

            <div class="row">
            <div class="col-md-2">
            </div>


            <div class="col-md-4 video-player-home">
                <!-- video //-->
                <iframe width="370" height="220"
                  src="//www.youtube.com/embed/f-p034fWL1A" frameborder="0" allowfullscreen>
                </iframe>
            </div>

 <a name="pessoasMarcaoAncora"></a>
            <div id="inicieIcone" class="col-md-6">
            <!--- textos //-->
              <div class="ajustes">
                  <img class="Ralinhar"  src="/sites/all/themes/cdp_strap/images/front/inicieIcone.png"/>
                    <h2>Inicie a experiência</h2>
                    <p class="inicie-descricao">
                      Olá, bem-vindo ao Comunidade de Práticas. Aqui gestores e trabalhadores do SUS se comunicam, compartilham experiências e constituem esta grande rede colaborativa, dinâmica e viva. Veja cada serviço, cada espaço de interação e cada possibilidade de comunicação e faça parte deste movimento para o fortalecimento e a ampliação da qualidade dos serviços de saúde no Brasil.
                    </p>
                    <!-- conteudoTextoL //-->

                </div>
      </div>
            </div>

            <a name="comunidadeMarcacaoAncora"></a>
      <div id="pessoasMarcao" class="row">

                <div class="col-md-1">

                </div>

                <div class="col-md-6">
                    <img class="Lalinhar" src="/sites/all/themes/cdp_strap/images/front/pessoas.png"/>
                   <h2>Pessoas</h2>
                    <p>
                      A Comunidade de Práticas possibilita que você se una aos milhares de profissionais da saúde em todo o país. Participe e descubra que há muitos iguais a você. Encontre seus amigos, conheça novos homens e mulheres que fortalecem o SUS.
                    </p>
                    <div class="ajustarBotoes">
                       <a href="#" class="icon-info-sign" data-toggle="tooltip" title="Xirlei" > <img src="/sites/all/themes/cdp_strap/images/front/perfil1.png" class="img-circleNew" /></a>
                        <a href="#" class="icon-info-sign" data-toggle="tooltip" title="Priscila" ><img src="/sites/all/themes/cdp_strap/images/front/perfil2.png" class="img-circleNew" /></a>
                        <a href="#" class="icon-info-sign" data-toggle="tooltip" title="Almeida" ><img src="/sites/all/themes/cdp_strap/images/front/perfil3.png" class="img-circleNew" /></a>
                        <a href="#" class="icon-info-sign" data-toggle="tooltip" title="Rubens Pinto Mello Rego" ><img src="/sites/all/themes/cdp_strap/images/front/perfil4.png" class="img-circleNew" /></a>
                       <a href="#" class="icon-info-sign" data-toggle="tooltip" title="Tabata" > <img src="/sites/all/themes/cdp_strap/images/front/perfil5.png" class="img-circleNew" /></a>
                        <br/>
                        <a href="/people/" class="btn btn-warning">Ache pessoas</a>
                    </div>

                </div>


                <div class="col-md-1">

                </div>

                <div class="col-md-4">

                </div>

            </div>

            <div id="comunidadeMarcacao" class="row">
              <div id="comuna"  id="comSome">
              <div class="col-md-1">
                </div>

              <div class="col-md-1">
                </div>

              <div  class="col-md-10">

                    <img class="Ralinhar" src="/sites/all/themes/cdp_strap/images/front/comunidades.png"/>
                  <div class="empurrar">
                    <h2>Comunidades</h2>
                    <p>
                      Um ambiente de interação entre os profissionais da Atenção Básica / Saúde da Família. Troque experiências, faça projetos colaborativos, comunique-se. Participe das mais diversas comunidades ou crie a sua. O espaço para você é aqui!
                    </p>
                        <br/>
                    <a href="/comunidades/" class="btn btn-primary">VEJA AS COMUNIDADES</a>
                    </div>

                </div>
                </div>
                <a name="cursosMarcacaoAncora"></a>
            </div>

            <a name="mostraMarcacaoAncora"></a>
            <div id="cursosMarcacao" class="row">


              <div class="col-md-1">
                </div>


              <div class="col-md-6">
                   <img class="Lalinhar" src="/sites/all/themes/cdp_strap/images/front/cursos.png"/>
                    <h2>Cursos</h2>
                  <p>
                    Aqui o conhecimento está ao seu alcance. Participe dos nossos cursos, aprenda com sua rede e acrescente esta experiência a sua qualificação. Também é possível criar o seu próprio curso.
                  </p>
                    <div class="ajustarBotoes">

                    <br/>
                <a href="/courses/" class="btn btn-success">VEJA OS CURSO</a>
                  </div>
                </div>

              <div class="col-md-2">
                </div>

            </div>

            <a name="webtvMarcacaoAncora"></a>
            <div id="mostraMarcacao" class="row">
              <div class="col-md-1">
                </div>

              <div class="col-md-5">
                </div>

              <div class="col-md-6">
                  <img class="Ralinhar" src="/sites/all/themes/cdp_strap/images/front/mostra.png"/>
                    <h2>IV MOSTRA</h2>
                    <p>
                      O maior evento da Atenção Básica e Saúde da Família também acontece aqui. Veja os diversos relatos de experiências de todo o Brasil e dialogue com a saúde.
                    </p>
                    <a href="/mostra/" class="btn btn-mostra">VISITE O SITE DA MOSTRA</a>
                </div>

            </div>


            <div id="webtvMarcacao" class="row">
              <div class="col-md-6">
                  <img class="Lalinhar" src="/sites/all/themes/cdp_strap/images/front/webtv.png"/>
                    <h2>WEBTV</h2>
                    <p>
                      A WebTV permite dar adeus à via de mão única na comunicação, possibilitando que o profissional da atenção básica participe conosco através de vídeos na web, bate-papos e muito mais.
                    </p>
                    <div class="ajustarBotoes">
                                <br />
                    <a href="/webtv/" class="btn btn-danger">VEJA OS VÍDEOS</a>
                    </div>
                </div>

              <div class="col-md-4">
                </div>

              <div class="col-md-1">
                </div>

            </div>
        </div>
      </div>


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