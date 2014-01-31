
<div class="profile"<?php print $attributes; ?>>
  <div class="row">
    <div class="col-md-3 user-profile-row1-left">

      <?php print $avatar; ?>

      <?php print render($user_profile['field_formacao_profissional']); ?>

			<?php print render($user_profile['field_cidade']); ?>      

 			<div class="user-profile-links-redes-sociais">
        <?php if ($facebook_url): ?>
          <a class="user-profile-facebook" href="<?php print $facebook_url ?>">
          	<?php print $facebook_url ?>
          </a>
        <?php endif; ?>

        <?php if ($twitter_url): ?>
          <a class="user-profile-twitter" href="<?php print $twitter_url; ?>">
          	<?php print $twitter_url ?>
          </a>
        <?php endif; ?>

        <?php if ($linkedin_url): ?>
          <a class="user-profile-linkedin" href="<?php print $linkedin_url; ?>">
          	<?php print $linkedin_url ?>
          </a>
        <?php endif; ?>

        <?php if ($lattes_url): ?>
          <a class="user-profile-lattes" href="<?php print $lattes_url; ?>">
          	<?php print $lattes_url ?>
          </a>
        <?php endif; ?>
    	</div>
    </div>

    <div class="col-md-9 user-profile-row1-right">
      <div id="names">
      <?php if (isset($user_profile['field_name_first'][0]['#markup']) && isset($user_profile['field_name_last'][0]['#markup'])): ?>  
        <h1 class="tituloPagina"><?php print $user_profile['field_name_first'][0]['#markup']; ?> <?php print $user_profile['field_name_last'][0]['#markup']; ?></h1>
      <?php endif; ?>
      </div>
      <div id="field-bio" class="block">   
        <?php print render($user_profile['field_bio']); ?>
      </div>
      <div class="interesses">
        <?php print render($user_profile['field_interesses']);?>
      </div>
      <div id="icons">
        <div id="follow">
          <?php print render($user_profile['flags']); ?>
        </div>
        <div id="group-group">
          <?php print render($user_profile['group_group']);?>
        </div>
      </div>
    </div>
  </div>
</div>

