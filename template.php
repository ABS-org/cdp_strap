<?php

include 'template_user_profile_preprocess.php';

/**
 * @file template.php
 */


/**
 * Overrides theme_breadcrumb().
 *
 * Print breadcrumbs as an ordered list according to path.
 */
function cdp_strap_breadcrumb($variables) {
  global $language;
  $path = drupal_get_path_alias();
  $pieces = explode('/', $path);
  $path = '';
  $parent_candidates = array();
  foreach ($pieces as $piece) {
    $path .= $piece . '/';
    $parent_candidates[] = drupal_get_normal_path(rtrim($path, '/'));
  }

  // Don't even bother if current page is root
  if (empty($parent_candidates)) {
    return;
  }

  // Find link items matching the parent candidates in all menus
  $matched_menus = array();
  $matched_link_titles = array();
  $results = db_select('menu_links','ml')
    ->fields('ml',array('menu_name','mlid','link_path','link_title','depth'))
    ->condition('link_path',$parent_candidates,'IN')
    ->execute();

  foreach ($results as $record) {
    // Do not touch admin menus
    if (in_array($record->menu_name, array('management','devel'))) {
      continue;
    }

    // If there is more than one matched link in a menu, use the deepest
    elseif (!isset($matched_menus[$record->menu_name]) || $record->depth > $matched_menus[$record->menu_name]['depth']) {
      $matched_menus[$record->menu_name]['link_path'] = $record->link_path;
      $matched_menus[$record->menu_name]['depth'] = $record->depth;
    }

    // Get the Link Title if it can be found in a menu item
    if ($record->link_title && !isset($matched_link_titles[$record->link_path])) {
      $matched_link_titles[$record->link_path] = $record->link_title;
      if (module_exists('i18n_menu')) {
        $matched_link_titles[$record->link_path] = _i18n_menu_link_title((array)$record, $language->language);
      }
    }
  }

  // Set the active-trail for each menu containing one of the candidates
  foreach ($matched_menus as $menu_name => $menu_link) {
    menu_tree_set_path($menu_name, $menu_link['link_path']);
  }

  // Also set breadcrumb according to path URL as well
  if (variable_get('menu_trail_by_path_breadcrumb_handling', TRUE)) {
    // First breadcrumbs is always Home
    $breadcrumbs[] = l(t('Home'),'<front>');

    foreach($parent_candidates as $link_path) {
      // skype if are home link
      if($link_path == 'home') continue;

      $breadcrumbs_text = '';
      // If title of the page is found on a menu item, use it
      if (isset($matched_link_titles[$link_path])) {
        $breadcrumbs_text = $matched_link_titles[$link_path];
      }
      // Otherwise, use slow method to find out the title of page
      elseif (($menu_item = menu_get_item($link_path)) && ($menu_item['title'] != '')) {
        $breadcrumbs_text = $menu_item['title'];
      }

      if($breadcrumbs_text){
        // limmit string lenght
        $breadcrumbs_text = (strlen($breadcrumbs_text) > 30) ? substr($breadcrumbs_text,0,28).'...' : $breadcrumbs_text;
        $breadcrumbs[] = l($breadcrumbs_text,$link_path);
      }
    }

    $output = theme('item_list', array(
      'attributes' => array(
        'class' => array('breadcrumb'),
      ),
      'items' => $breadcrumbs,
      'type' => 'ol',
    ));

    return $output;
  }
}


/**
 * Preprocess function for the emotion template.
 */
function cdp_strap_preprocess_rate_widget(&$variables) {

  // change love widget do count result
  if($variables['links'][0]['text'] == 'Love' ){
    $variables['info'] =  '<span class="love-info">' .$variables['results']['count'] . '</span>';
  }

}

/**
 * HOOK_preprocess_node
 */
function cdp_strap_preprocess_node(&$vars) {

  if(!isset($vars['content_next_and_previus'])){
    $vars['content_next_and_previus'] = false;
  }

  //  variaveis customizadas
  $vars['members_count'] = null;
  $vars['course_access'] = null;

  if($vars['view_mode'] == 'full'){

    // adicionando a contagem de membros na comunidade
    if( $vars['type'] == 'course' ){
      _cdp_strap_preprocess_node_course_set_default_vars($vars);
      $vars['members_count'] = _cdp_courses_get_course_members_count($vars['nid']);
    }

  }else if($vars['view_mode'] == 'teaser'){

    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__teaser';
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->nid . '__teaser';

    // adicionando a contagem de membros na comunidade
    if($vars['type'] == 'group'){
      _cdp_strap_set_course_members_count($vars);
    }

    if( $vars['type'] == 'course' ){
      $vars['members_count'] = _cdp_courses_get_course_members_count($vars['nid']);

      if(isset( $vars['content']['field_og_subscribe_settings'][0]['#markup'] )){
        $vars['course_access'] = $vars['content']['field_og_subscribe_settings'][0]['#markup'];
      }
    }

  }

  if( $vars['type'] == 'category'){
    _cdp_strap_preprocess_node_category_set_default_vars($vars);

  }

  _cdp_strap_set_submitted_text($vars);

  if( !($vars['type'] == 'course' && $vars['view_mode'] == 'full') ){

    if(isset($vars['rate_love'])){
      $vars['content']['links']['rate']['#links']['rate_love'] = array(
        'html' => true,
        'title' => $vars['rate_love']['#markup']
      );
    }
  }

  // remove duplicated comments links
  if(isset($vars['content']['links']['comment']['#links']['comment-comments'])){
    unset($vars['content']['links']['comment']['#links']['comment-add']);
  }
}

/**
 * HOOK_preprocess_node
 */
function cdp_strap_process_node(&$vars) {

  if($vars['view_mode'] == 'full'){

    if( $vars['type'] == 'course' ){
      $vars['responsaveis'] = '';

      if(isset($vars['content']['group_course_responsibles']['items']['#items'])){
        $responsaveis = $vars['content']['group_course_responsibles']['items']['#items'];

        $responsaveisArray = array();

        foreach ($responsaveis as $responsavel) {

          if(isset($responsavel['field_responsible_for_course']['#markup'])){
            if(isset($responsavel['field_link']['#element']['url'])){
              $responsaveisArray[] = '
                <span class="responsavel">
                  <a href="'.$responsavel['field_link']['#element']['url'].'">
                    '. $responsavel['field_responsible_for_course']['#markup'] .'
                  </a>
                </span>';
            }else{
              $responsaveisArray[] = '
                <span class="responsavel">
                  '. $responsavel['field_responsible_for_course']['#markup'] .'
                </span>';
            }
          }
        }

        if(!empty($responsaveisArray)){
          $vars['responsaveis'] .= '<span class="responsaveis-label"><strong>Responsável(is):</strong></span> ';
          $vars['responsaveis'] .= implode(', ', $responsaveisArray);
          unset($vars['content']['group_course_responsibles']);
        }

      }
    }elseif($vars['type'] == 'group' ){

      if( isset( $vars['content']['group_group'][0]['#title']) ) {

        if( $vars['content']['group_group'][0]['#title'] == t('Leave group')){
          $vars['content']['group_group'][0]['#options']['attributes']['class'] = array('unsubscribe');
        } else {
          $vars['content']['group_group'][0]['#options']['attributes']['class'] = array('subscribe');
        }

      }
    }
  }elseif( $vars['view_mode'] == 'teaser') {
    if($vars['type'] == 'experiencia' ){

      if(isset($vars['content']['links']['rate'])){

        // puxando o rate para o inicio da lista de links
        $rate = $vars['content']['links']['rate'];
        unset($vars['content']['links']['rate']);
        $vars['content']['links'] = $rate + $vars['content']['links'];

      }

      if(isset($vars['comment_count'])){
        // adicionando o botão de quantidade de comentários
        $comment_count_link['btn-comments']['#theme'] = 'links';
        $comment_count_link['btn-comments']['#attributes']['class'] = array(
          'comment-links-count'
        );
        $comment_count_link['btn-comments']['#links']['comments_count']['html'] = true;
        $comment_count_link['btn-comments']['#links']['comments_count']['title'] = $vars['comment_count'];
        $comment_count_link['btn-comments']['#links']['comments_count']['href'] = 'node/' . $vars['node']->nid;
        $comment_count_link['btn-comments']['#links']['comments_count']['fragment'] =  'comments';

        $vars['content']['links'] = $comment_count_link+$vars['content']['links'];
      }

    }
  }

  if($vars['type'] == 'course'){
    // course access type $vars['course_access_type']
    if(
      isset($vars['field_og_subscribe_settings']) &&
      isset($vars['field_og_subscribe_settings'][0]['value'])
      ){

      switch ($vars['field_og_subscribe_settings'][0]['value']) {
        case 'invitation':
            $vars['course_access_type'] = t('Closed');
            $vars['course_access_type_status'] = 'close';
            break;
        case 'approval':
            $vars['course_access_type'] = t('Open content, restricted membership');
            $vars['course_access_type_status'] = 'restricted';
            break;
        default:
            $vars['course_access_type'] = t('Open and massive');
            $vars['course_access_type_status'] = 'open';
      }

    }
  }

  if($vars['type'] == 'group' ){
    if( isset( $vars['content']['links']['node']['#links']['node-readmore']  ) ) {
      $vars['content']['links']['node']['#links']['node-readmore']['title'] = 'Entrar';
    }
  }


}
function cdp_strap_preprocess_html(&$vars) {

  // load jquery cookie
  drupal_add_library('system', 'jquery.cookie');

  if(arg(0) == 'courses' && !arg(1)){
    $vars['classes_array'][] = 'courses-list-page';
  }

  // verifica se o bloco de usuário vai aparecer aberto ou fechado
  if(isset($_COOKIE['user-block-expandable-status']) &&
     $_COOKIE['user-block-expandable-status'] == 'hide'
  ){
    $vars['classes_array'][] = 'user-block-expandable-hide';
  }else {
    // deixa o bloco de usuário fechado dentro dos grupos
    if( og_context() ||
      (
        function_exists('_cdp_courses_get_current_course') &&
        _cdp_courses_get_current_course()
      )
    ){
      $vars['classes_array'][] = 'user-block-expandable-hide';
    }else{
      $vars['classes_array'][] = 'user-block-expandable-show';
    }
  }

  // set cadastrese block in body classes
  if( !user_is_logged_in() ){
    $vars['classes_array'][] = 'cdp-cadastrese-block-enabled';
  }
}

/**
 * HOOK_preprocess_page
 */
function cdp_strap_preprocess_page(&$vars){

  if(!user_is_logged_in() && $vars['is_front']){
    $vars['theme_hook_suggestions'][] = 'page__front__loggedout';
  }

  if( user_is_logged_in() ){
    $vars['cdpCadastreseBlock'] = false;
  }else{
    $vars['cdpCadastreseBlock'] = true;
  }
}
/**
 * HOok_preprocess_field
 */
function cdp_strap_preprocess_field(&$vars) {

  if(isset($vars['element']['#field_name'] )){

    if($vars['element']['#field_name'] == 'group_group') {

      foreach ($vars['items'] as $key => $value) {

        $vars['items'][$key]['#options']['attributes']['class'][] = 'btn';
        if(isset($vars['items'][$key]['#title'])){

          if($vars['items'][$key]['#title'] == 'Adicionar como amigo' ){
            $vars['items'][$key]['#options']['attributes']['class'][] = 'add-friend';

            // trocando o titulo de adicionar amigo para ficar menor para a lista de pessoas
            if($vars['element']['#view_mode'] == 'search_result')
              $vars['items'][$key]['#title'] = 'Adicionar';


          }else if($vars['items'][$key]['#title'] == 'Mensagem' ){
            $vars['items'][$key]['#options']['attributes']['class'][] = 'send-message';
          }
        }
      }

    }

  }
}

/**
 * Set refault vars for courses template
 */
function _cdp_strap_preprocess_node_course_set_default_vars(&$vars) {

  // is certified flag and class
  $vars['is_dab_certified'] = false;

  if(isset($vars['field_certified_by_dab']) &&
   !empty($vars['field_certified_by_dab']) &&
   $vars['field_certified_by_dab'][0]['value'] == 'yes'
  ){
    $vars['is_dab_certified'] = true;
    $vars['classes_array'][] = 'is-dab-certified';
  }

  $vars['course_creator'] = t('<strong>Created by</strong> !name', array('!name' => $vars['name'])) ;

  _cdp_strap_get_course_enter_btn($vars);

}


/**
 * Set refault vars for category template
 */
function _cdp_strap_preprocess_node_category_set_default_vars(&$vars){

  // if is course unit
  if(
    isset($vars['field_tipo_de_categoria'][LANGUAGE_NONE][0]['value'] ) &&
    $vars['field_tipo_de_categoria'][LANGUAGE_NONE][0]['value'] == 'unidade'
  ){
    $vars['classes_array'][] = 'unidade';
  }
}

function _cdp_strap_get_course_enter_btn( &$vars){
  global $user;

  // does the nid for the group exist in the og_groups array
  if ( user_is_logged_in() && og_is_member('node', $vars['nid'], 'user' ) ) {
    // yup, looks like we've got ourselves a member
    // do something that only members can see
    $vars['enter_in_course_btn'] = '
      <div class="course-home-btn">
        <a class="btn btn-info" href="'.$vars['home_url'].'">Ir para o curso</a>
      </div>
    ';
  } else {
    $vars['enter_in_course_btn'] = '
      <div class="course-home-btn">
        <a class="btn btn-info" href="'.$vars['home_url'].'">Visitar o curso</a>
      </div>
    ';
  }



}

/**
 * Set submitted text
 * @return void
 */
function _cdp_strap_set_submitted_text(&$variables){

  $wrapper = entity_metadata_wrapper('node', $variables['node']);

  // Append a feature label to featured node teasers.
  if ($variables['teaser'] && $variables['promote']) {
    $variables['submitted'] .= ' <span class="featured-node-tooltip">' . t('Featured') . ' ' . $variables['type'] . '</span>';
  }

  // Replace the submitted text on nodes with something a bit more pertinent to
  // the content type.
  if (variable_get('node_submitted_' . $variables['node']->type, TRUE)) {
    $breadcrumb_text = '';

    $node_type_info = node_type_get_type($variables['node']);

    $lastTime = $variables['node']->changed;
    if(isset($variables['node']->last_comment_timestamp))
      if($variables['node']->changed < $variables['node']->last_comment_timestamp)
        $lastTime = $variables['node']->last_comment_timestamp;
    /*


    $placeholders = array(
      '!type' => '<span class="node-content-type">' . check_plain($node_type_info->name) . '</span>',
      '!user' => $variables['name'],
      '!date' => $variables['date'],
      '!title' => l($variables['node']->title,'node/' . $variables['node']->nid),
      '!action' => 'has shared',
      '@interval' => format_interval(REQUEST_TIME - $variables['node']->created),
      '@changed' => format_interval(REQUEST_TIME - $lastTime),
    );
    */
    $breadcrumb_text =  $variables['name'];

    switch ($variables['node']->type) {
      case 'post':
        $breadcrumb_text .= ' fez uma <span class="node-content-type">postagem</span> ';
        break;

      case 'imagem':
        $breadcrumb_text .= ' compartilhou uma <span class="node-content-type">imagem</span> ';
        break;

      case 'post_image':
        $breadcrumb_text .= ' compartilhou uma <span class="node-content-type">imagem</span> ';
        break;

      case 'question':
        $breadcrumb_text .= ' fez uma <span class="node-content-type">pergunta</span> ';
        break;

      case 'answer':
        $breadcrumb_text .= ' respondeu à <span class="node-content-type">pergunta</span> ';
        if(isset($variables['field_related_question'][0]['entity']->title)){
          $breadcrumb_text .= l(
            $variables['field_related_question'][0]['entity']->title,
            'node/' . $variables['field_related_question'][0]['entity']->nid
          );
        }
        break;

      case 'document':
        $breadcrumb_text .= ' compartilhou um <span class="node-content-type"> arquivo';
        break;

      default:
        $breadcrumb_text .= ' criou um(a) <span class="node-content-type"><span class="node-content-type">' . check_plain($node_type_info->name) . '</span>';
        break;
    }


    if (!empty($variables['node']->{OG_AUDIENCE_FIELD}) && $wrapper->{OG_AUDIENCE_FIELD}->count() == 1) {

      $groupLabel = '';
      if( $wrapper->{OG_AUDIENCE_FIELD}->get(0)->getBundle() == 'course'){
        $breadcrumb_text .= ' no curso ';
      }else {
        $breadcrumb_text .= ' na comunidade ';
      }

      $breadcrumb_text .= l($wrapper->{OG_AUDIENCE_FIELD}->get(0)->label(), 'node/' . $wrapper->{OG_AUDIENCE_FIELD}->get(0)->getIdentifier());
    }
    else {

    }

    $breadcrumb_text .= '<br> ';

    if($lastTime)
      $breadcrumb_text .= '<span class="created-time">Ultima atividade a '.format_interval(REQUEST_TIME - $lastTime).'</span> ';


    $breadcrumb_text .= '<span class="updated-time">Criado a '.format_interval(REQUEST_TIME - $variables['node']->created).'</span>';

    $variables['submitted'] = $breadcrumb_text;
  }
}

// !user fez uma postagem na comunidade
// !group

// !user fez uma postagem no curso
// !group

function cdp_strap_process_quiz_take_summary(&$variables){
  //$variables
}

function cdp_strap_quiz_user_summary(&$variables){
  //var_dump($variables);

  $quiz = $variables['quiz'];
  $questions = $variables['questions'];
  $score = $variables['score'];
  $summary = $variables['summary'];
  $rid = $variables['rid'];
  // Set the title here so themers can adjust.
  drupal_set_title($quiz->title);

  $randon_imagens = 'special-format-' . rand(1, 2);

  if (!$score['is_evaluated']) {
    if (user_access('score taken quiz answer')) {
      $msg = t('Parts of this @quiz have not been evaluated yet. The score below is not final. <a class="self-score" href="!result_url">Click here</a> to give scores on your own.', array('@quiz' => QUIZ_NAME, '!result_url' => url('node/' . $quiz->nid . '/results/' . $rid)));
    }
    else {
      $msg = t('Parts of this @quiz have not been evaluated yet. The score below is not final.', array('@quiz' => QUIZ_NAME));
    }
  }

  if($quiz->pass_rate <= $score['percentage_score']){
    // Success !!
    $result_class = 'quiz-success';
  }else{
    // unsucefull !!
    $result_class = 'quiz-fail';
  }

  // Display overall result.
  $output = "<div class='cdp-quiz-result-wrapper $result_class  $randon_imagens'>";
  $output .= "<div class='quiz-result-header $result_class'>";

  $output .= '<div id="quiz_score_possible">' .
    t('You got %num_correct of %question_count possible points.', array('%num_correct' => $score['numeric_score'], '%question_count' => $score['possible_score'])) .
    '</div>';
  $output .= '<div id="quiz_score_percent">' .
    t('Your score was: @score %', array('@score' => $score['percentage_score'])) .
    '</div>';

  if (isset($summary['passfail'])) {
    $output .= '<div id="quiz_summary" class="quiz-pass-fail">' . $summary['passfail'] . '</div>' . "\n";
  }
  if (isset($summary['result'])) {
    $output .= '<div id="quiz_summary" class="quiz-pass-result">' . $summary['result'] . '</div>' . "\n";
  }

  $output .= '</div>';
  // Get the feedback for all questions.
  $form = drupal_get_form('quiz_report_form', $questions, FALSE, TRUE);
  $output .= drupal_render($form);
  $output .= '</div>';
  return $output;

}
/**
 * theme_process_quiz_report_form
 */
function cdp_strap_process_quiz_report_form(&$variables){
  // Adicionando as váriaveis de proximo conteúdo e conteúdo anterior
  $variables['content_next_and_previus'] = '';

  if(isset($variables['quiz']->nid)){
    $variables['nid'] = $variables['quiz']->nid;
  } elseif( is_numeric(arg(1)) ) {
    // get current node nid from url
    $node = node_load(arg(1));
    // check if are course
    if($node && $node->type == 'quiz'){
      $variables['nid'] = $node->nid;
      $variables['course'] = $node;
    }
  }

  //var_dump($variables);
  // drupal quiz path
  $variables['p'] =  drupal_get_path('module', 'quiz') .'/theme/';
  $variables['q_image'] = $variables['p'] . 'question_bg.png';

  if(isset($variables['nid']))
    _cdp_courses_preprocess_node_course_set_next_previus_content_vars($variables);
}

function cdp_strap_menu_link__main_menu(&$variables) {

  $element = $variables['element'];

  // -- Pending invitations block
  if( isset($element['#localized_options']['attributes']['id']) &&
    $element['#localized_options']['attributes']['id'] == 'link-pessoas'
  ){
    global $user;

    if ( $user->uid && function_exists('commons_trusted_contacts_get_pending_invitations')) {

      $unread_invitations = commons_trusted_contacts_get_pending_invitations($user->uid);

      $unread_invitations_count = count($unread_invitations);
      $unread_invitations_html = '';

      if($unread_invitations_count > 0 ){

        foreach ($unread_invitations as $og_membership_id => $value) {

          $og_memberships = entity_load('og_membership', array($og_membership_id));

          // get friend avatar
          $friend = user_load( $og_memberships[$og_membership_id]->etid );

          if($friend){
            $friend_avatar = theme('user_picture', array('account' => $friend));


            $options = array('absolute' => TRUE);
            $token = $og_memberships[$og_membership_id]->field_membership_token[LANGUAGE_NONE][0]['value'];

            // aprove url
            $aprove_url = url('approve-trust/' . $og_membership_id . '/' . $token, $options);

            // ignore url
            $ignore_url = url('ignore-trust/' . $og_membership_id . '/' . $token, $options);

            $unread_invitations_html .= '
              <div class="view-row">
                <span class="img-circle">' . $friend_avatar . '</span>
                <div class="info">
                  <p>' . $friend->realname .'</p>
                  <a href="' .$aprove_url. '" class="btn btn-default btn-xs btn-aprovar">
                    Aprovar
                  </a>
                  <a href="'. $ignore_url .'" class="btn btn-default btn-xs btn-ignorar">
                    Ignorar
                  </a>
                </div>
              </div>
            ';
          }

        }

        $element['#title'] .= '<span class="badge text-danger">'. $unread_invitations_count .'</span>';
        $element['#localized_options']['html'] = true;

      } else {
        $unread_invitations_html = '';
      }
      // ver todos convites url
      $todos_invites_url = url('user/' . $user->uid . '/contacts');


      $element['#action_block'] = '<div class="col-md-3 main-menu-actions-block">
            <div class="view-submenu aba-pessoas">
              <div class="view-header">
                <p>Solicitações de amizade</p>
                <a href="/pessoas" class="btn btn-default btn-xs btn-block">Buscar Amigos</a>
              </div>
              <div class="view-content">
              ' . $unread_invitations_html . '
              </div>';

      if($unread_invitations_html != ''){
        $element['#action_block'] .= '<div class="view-footer">
                <a href="'. $todos_invites_url .'" class="btn btn-block">Ver todas</a>
              </div>
            </div>';
      }
      $element['#action_block'] .= '</div>';
    }
  }else if( isset($element['#localized_options']['attributes']['id']) &&
    $element['#localized_options']['attributes']['id'] == 'mensagens'
  ){
    global $user;
    if($user->uid){

      // setando o link de mensagens correto para o usuário logado
      $element['#href'] = 'user/'. $user->uid .'/contacts';
      $element['#localized_options']['query'] = array('qt-commons_trusted_contacts'=> 'messages');

      // unread messages count
      $unread_messages_count = privatemsg_unread_count($user);

      if($unread_messages_count > 0){
        $element['#title'] .= '<span class="badge text-danger">'. $unread_messages_count .'</span>';
        $element['#localized_options']['html'] = true;
      }

    }
  }

  $sub_menu = '';

  if( isset($element['#action_block']) ){
    $sub_menu = $element['#action_block'];
  }else if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output .  $sub_menu . "</li>\n";

  //return $variables;

}

/**
 * Set course members count in node links for preprocess node
 */
function _cdp_strap_set_course_members_count(&$vars){
  if(!isset($vars['nid']))
    return null;

  if(!function_exists('_cdp_courses_get_course_members_count'))
    return null;

  // get members count number
  $group_member_count = _cdp_courses_get_course_members_count($vars['nid']);

  if(empty($group_member_count))
    $group_member_count = 0;

  $group_links = array(
    'members_count' => array(
      'title' => '<span class="count">'.$group_member_count.'</span>',
      'html' => true,
      'href' => 'node/' . $vars['node']->nid,
      'fragment' => 'members'
    )
  );

  $member_count_links['members-count'] = array(
    '#theme' => 'links',
    '#links' => $group_links,
    '#attributes ' => array(
      'class' => array(
      )
    )
  );

  $vars['content']['links'] = $member_count_links + $vars['content']['links'];

}