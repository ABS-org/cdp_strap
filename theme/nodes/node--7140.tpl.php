<?php
/*
Template para o conteúdo do curso com image map
 */
?>
<div style="width: 960px; heigth: 720px;" id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>


  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>


  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <div class="node-links-container clearfix">
    <?php print render($content['links']); ?>

  </div>

<script>
  /* macumba para fazer o mapeamento do link da imagem nesse conteúdo */
  var image = jQuery('#node-7140 .field-name-field-imagem img');
  image.attr('useMap','#Map');
  image.attr('usemap','#Map');

  jQuery(document).ready(function(){
    //jQuery('#image_target_modal').modal({});
  });

  function MM_openBrWindow(modal) {
     jQuery('#' + modal).modal({

     });

  }
  console.log(image);

</script>

<!-- Modal 1-->
<div class="modal fade" id="organizacaosaude" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Organização da Atenção à Saúde</h3>
      </div>
      <div class="modal-body">
        <ul>
          <li>
            Constituição de ambiente institucional favorável à mudança no âmbito da gestão do Sistema de Saúde:

          <ul>
              <li>
                Reorganização do modelo de atenção, buscando adequar às necessidades das pessoas com doenças crônicas;
              </li>
              <li>
                Investimento institucional é fundamental para o desenvolvimento dos outros princípios;
              </li>
              <li>
                Comprometimento dos dirigentes da organização com a mudança do modelo de atenção;
              </li>
              <li>
                Incentivo aos profissionais e serviços que aderirem ao novo modelo de atenção;
              </li>
              <li>
                Modelos de contratos e de prestação de serviços que valorizem a qualidade e os resultados clínicos.
              </li>
          </ul>
        </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal 2-->
<div class="modal fade" id="autocuidadoapoiado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" >Autocuidado Apoiado</h3>
      </div>
      <div class="modal-body">
         <ul>
          <li>Na atenção às doenças crônicas, o usuário é o principal responsável pelo seu cuidado;</li>
          <li> A prescrição dos remédios ou das mudanças de hábitos de vida não necessariamente é seguida;</li>
          <li> Os usuários passam muito mais tempo sozinhos ou em companhia da família ou da comunidade do quem em contato com os profissionais de saúde;</li>
          <li> Desenvolvimento de diálogo colaborativo entre os profissionais e os usuários, buscando a adesão de hábitos saudáveis:
            <ul>
              <li> Estabelecimento de metas reais e alcançáveis;</li>
              <li> Aumento da autonomia do usuário no seu cuidado;</li>
              <li> Aumento do conhecimento do usuário sobre a sua condição de saúde;</li>
              <li> Movimento contínuo, que ultrapassa o momento das consultas. </li>
              </ul>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal 3-->
<div class="modal fade" id="recursosepoliticas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Recursos e Políticas da Comunidade</h3>
      </div>
      <div class="modal-body">
        <ul>
          <li>Para a atenção às condições crônicas, é fundamental o estabelecimento de parcerias intersetoriais:
            <ul>
              <li>Parcerias institucionais nacionais, estaduais e municipais, envolvendo outras secretarias, outros ministérios, entidades da sociedade civil organizada, organizações não governamentais, etc.</li>
              </ul>
          </li>
          <li>Desenvolvimento de projetos nos territórios, envolvendo os equipamentos existentes:
            <ul>
              <li>Equipamentos do Estado, como creches, escolas, centros da assistência social, quadras esportivas, centros culturais, etc;</li>
              <li>Organizações da sociedade civil, como associações de moradores, movimentos sociais organizados, igrejas, etc.</li>
              </ul>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal 4-->
<div class="modal fade" id="desenholinhacuidado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Desenho da Linha de Cuidado</h3>
      </div>
      <div class="modal-body">
        <ul>
        <li>Estruturação do desenho da linha de cuidado, realizada de forma compartilhada entre os diversos atores:
          <ul>
            <li>Definição de atribuições de cada ponto de atenção;</li>
            <li>Constituição de fluxos de usuários e de informações;</li>
            <li>Critérios para referência e contrarreferência;</li>
            </ul>
          </li>
        <li>Considerar o papel da atenção básica, enquanto ordenadora da rede de atenção e coordenadora do cuidado;</li>
        <li>Estabelecimento de diálogo entre os pontos de atenção, permitindo a flexibilidade e a abordagem individualizada em casos que necessitem de um olhar especial.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal 5-->
<div class="modal fade" id="suportedecisoesclinicas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Suporte às Decisões Clínicas</h3>
      </div>
      <div class="modal-body">
        <ul>
          <li>É fundamental que as condutas estejam embasadas em protocolos e diretrizes clínicas;</li>
          <li>Os documentos devem ser construídos coletivamente, com o estabelecimento de parcerias entre os profissionais da atenção básica e os da atenção especializada;</li>
          <li>Os níveis de evidência de cada recomendação devem estar bem claros;</li>
          <li>As ações propostas devem estar adequadas ao ambiente da Atenção Básica e à realidade local, respeitando as especificidades. </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal 6-->
<div class="modal fade" id="sistemainformacoesclinicas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Suporte às Decisões Clínicas</h3>
      </div>
      <div class="modal-body">
        <ul>
          <li>O manejo das informações clínicas é fundamental para o cuidado adequado das pessoas com doenças crônicas;</li>
          <li>Os diversos profissionais devem ter acesso às informações relevantes para a continuidade do cuidado, como medicações em uso, presença de complicações, encaminhamentos, etc;</li>
          <li>A relação entre os diversos pontos de atenção também deve utilizar de tecnologias de informação, propiciando o conhecimento das condutas adotadas em outros serviços, como UPAs e ambulatórios de especialidades;</li>
          <li>Mesmo em ambientes não totalmente informatizados, podem ser pactuados instrumentos simplificados para acompanhamento dos usuários com doenças crônicas.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<map name="Map" id="Map">
  <area shape="rect" coords="316,193,654,225" href="#" alt="Organização da Atenção à Saúde" onclick="MM_openBrWindow('organizacaosaude','MCC','scrollbars=yes,width=600,height=600');return false; " />
  <area shape="rect" coords="66,243,305,279" href="#" alt="Autocuidado Apoiado" onclick="MM_openBrWindow('autocuidadoapoiado','MCC','scrollbars=yes,width=600,height=600');return false; " />
  <area shape="rect" coords="108,291,320,323" href="#" alt="Recursos e Políticas" onclick="MM_openBrWindow('recursosepoliticas','MCC','scrollbars=yes,width=600,height=600');return false; " />
  <area shape="rect" coords="319,328,509,389" href="#" alt="Desenho da Linha de Cuidado" onclick="MM_openBrWindow('desenholinhacuidado','MCC','scrollbars=yes,width=600,height=600');return false; " />
  <area shape="rect" coords="559,328,678,416" href="#" alt="Suporte às Decições Clínicas" onclick="MM_openBrWindow('suportedecisoesclinicas','MCC','scrollbars=yes,width=600,height=600');return false; " />
  <area shape="rect" coords="693,281,825,369" href="#" alt="Sistema de nformações Clínicas" onclick="MM_openBrWindow('sistemainformacoesclinicas','MCC','scrollbars=yes,width=600,height=600');return false; " />
</map>


  <?php if($content_next_and_previus): ?>
    <?php print $content_next_and_previus; ?>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
