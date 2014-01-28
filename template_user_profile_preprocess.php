<?php
/**
 * Preprocess for user profile
 */

/**
 * HOOK_preprocess_user_profile
 * @param  array $variables Variables to use in user profile
 */
function cdp_strap_preprocess_user_profile(&$variables){
  global $base_url;
  $user = $variables['elements']['#account'];

  // adicionando os templates de acordo com o view mode
  if(isset($variables['view_mode']))
    $variables['theme_hook_suggestions'][] = 'user_profile__' . $variables['view_mode'];

  if(isset($variables['elements']['#view_mode'] ))
    $variables['theme_hook_suggestions'][] = 'user_profile__' . $variables['elements']['#view_mode'];

  // setando as variaveis padrão
  $variables['facebook_url'] = null;
  $variables['twitter_url'] = null;
  $variables['linkedin_url'] = null;
  $variables['lattes_url'] = null;

  // add or change a variable.... Like:
  // $variables['name_of_variable'] = 'value';
  //
  if(isset($variables['field_facebook_url'][0]["url"])){
    $variables['facebook_url'] = $variables['field_facebook_url'][0]["url"];
  }

  if(isset($variables['field_twitter_url'][0]["url"])){
    $variables['twitter_url'] = $variables['field_twitter_url'][0]["url"];
  }

  if(isset($variables['field_linkedin_url'][0]["url"])){
    $variables['linkedin_url'] = $variables['field_linkedin_url'][0]["url"];
  }

  if(isset($variables['field_curriculo_lattes_url'][0]["url"])){
    $variables['lattes_url'] = $variables['field_curriculo_lattes_url'][0]["url"];
  }

  // USER AVATAR
  if(isset($user->picture) && $user->picture != '') {
    $user->picture_uri = $user->picture->uri;
  } else {
    $user->picture_uri = variable_get('user_picture_default', 'public://pictures/default.jpg' );
  }

  $avatar = array(
    '#theme'=>'image_style',
    '#style_name' => 'large',
    '#path' => $user->picture_uri,
    '#alt' => $user->realname,
    '#attributes' => array(
      'class' => 'picture user-avatar'
    )
  );

  $variables['avatar'] =
    '<a class="user-profile-picture" title="'. $user->realname .'" href="'. url('user/' . $user->uid) .'">
      '. render($avatar) .'
    </a>';

}