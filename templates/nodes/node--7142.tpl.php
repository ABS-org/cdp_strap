<?php
/*
Template para o conteúdo do curso com image map
 */
?>
<div style="width: 1327px; heigth: 870px;" id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>


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
  var image = jQuery('#node-7142 .field-name-field-imagem img');
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
<div class="modal fade" id="gestaodecaso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Nível 5 – Subpopulação com condição crônica muito complexa</h3>
      </div>
      <div class="modal-body">
        <ul>
        <li>Parcela pequena do total de usuários do território, que necessita de uma intervenção mais próxima e frequente:
          <ul>
            <li>Associação com diversas Comorbidades;</li>
            <li>Doenças sem controle com as intervenção já realizadas pela equipe;</li>
            <li>Vulnerabilidade social;</li>
            <li>Já apresentaram alguma complicação:
              <ul>
                <li>IAM, AVC, amputações, etc.</li>
              </ul>
            </li>
            </ul>
        </li>
        <li>Necessita de construção de um Projeto Terapêutico Singular.</li>
        <li>Frequentemente, necessitam de atenção de outros pontos de atenção:
          <ul>
            <li>Atenção Básica enquanto coordenadora do cuidado;</li>
            <li>Acompanhamento longitudinal;</li>
            <li>Identificar as necessidades em cada momento e possibilitar o acesso ao serviço mais adequado;</li>
            <li>Abordagem integral ao usuário e à família.</li>
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
<div class="modal fade" id="gestaosaude" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Nível 3 e 4 – Subpopulação com condição crônica</h3>
      </div>
      <div class="modal-body">
        <ul>
        <li>População que já tem a doença, que se estratifica de acordo com a gravidade e controle da doença:
          <ul>
            <li>A estratificação entre esses níveis deve ser elaborada a partir de protocolos clínicos específicos;</li>
            <li>O nível 4 necessita de uma maior frequência de consultas e demais intervenções da equipe.</li>
            </ul>
        </li>
        <li>Necessidade de intervenções de apoio ao autocuidado;</li>
        <li>Cuidado centrado na pessoa e na família, buscando interações produtivas que possibilitem uma maior adesão ao tratamento;</li>
        <li>Construção conjunta de planos terapêuticos:
          <ul>
            <li>Medicações;</li>
            <li>Alimentação;</li>
            <li>Atividade Física.</li>
            </ul>
        </li>
        <li>Atenção multiprofissional:
          <ul>
            <li>Estruturada a partir do trabalho em equipe, que atende determinada população e se reúne periodicamente para discutir casos e intervenções conjuntas;</li>
            <li>Definições locais de atribuições específicas e compartilhadas;</li>
            <li>Atendimentos individuais e coletivos. </li>
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
<div class="modal fade" id="intervencaosaude" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Nível 2 – Subpopulação com fatores de risco ligados aos comportamentos e estilo de vida</h3>
      </div>
      <div class="modal-body">
        <ul>
        <li>Obesidade;</li>
        <li>Tabagismo;</li>
        <li>Sedentarismo;</li>
        <li>Uso excessivo de álcool;</li>
        <li>Intervenções intersetoriais voltadas às pessoas com os fatores de risco;</li>
        <li>Intervenções com usuários dos serviços de saúde, visando evitar o desenvolvimento dessas doenças:
          <ul>
            <li>Apoio ao Autocuidado;</li>
            <li>Necessidade de abordagens comportamentais e de técnicas para suporte às mudanças;</li>
            <li>Construção conjunta de prioridades e de metas terapêuticas – plano de cuidado.</li>
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
<div class="modal fade" id="intervencaopromocao" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Nível 1 - População Total</h3>
      </div>
      <div class="modal-body">
        <ul>
        <li>Intervenções de Promoção da saúde:
          <ul>
            <li>Ações voltadas à adoção de hábitos de vida saudável;</li>
            <li>Não são voltadas para uma doença específica, influenciam no processo de morbidade de maneira geral;</li>
            <li>Também atuam sobre os determinantes sociais em saúde:
              <ul>
                <li>Condições de vida e trabalho;</li>
                <li>Acesso aos serviços essenciais;</li>
                <li>Redes sociais e comunitárias.</li>
                </ul>
            </li>
            <li>Programa Saúde na Escola;                          </li>
            <li>Programa Academia da Saúde;</li>
            <li>Ações regulatórias:
              <ul>
                <li>Tabagismo;</li>
                <li>Indústria de Alimentos.</li>
                </ul>
            </li>
            <li>Articulações intersetoriais, em âmbito federal, estadual e municipal;</li>
            <li>Articulações locais, a partir da realidade de cada Equipe de Atenção Básica/ Equipe de Saúde da Família. </li>
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




<map name="Map" id="Map">
  <area shape="rect" coords="553,161,695,264" href="#" alt="Gestão de Caso" onclick="MM_openBrWindow('gestaodecaso','MACC','scrollbars=yes,width=600,height=600'); return false;">
  <area shape="rect" coords="530,266,719,367" href="#" alt="Gestão da Condição de Saúde" onclick="MM_openBrWindow('gestaosaude','MACC','scrollbars=yes,width=600,height=600'); return false;">
  <area shape="rect" coords="477,367,770,484" href="#" alt="Gestão da Condição de Saúde" onclick="MM_openBrWindow('gestaosaude','MACC','scrollbars=yes,width=600,height=600'); return false;">
  <area shape="rect" coords="410,487,835,610" href="#" alt="Intervenções de Prevenção das Condições de Saúde" onclick="MM_openBrWindow('intervencaosaude','MACC','scrollbars=yes,width=600,height=600'); return false;">
  <area shape="rect" coords="294,613,952,746" href="#" alt="Intervenções de Promoção da Saúde" onclick="MM_openBrWindow('intervencaopromocao','MACC','scrollbars=yes,width=600,height=600'); return false;">
</map>


  <?php if($content_next_and_previus): ?>
    <?php print $content_next_and_previus; ?>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
