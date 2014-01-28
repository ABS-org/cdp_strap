
<div class="profile"<?php print $attributes; ?>>
  <div class="row">
    <div class="col-md-3 user-profile-row1-left">

      <?php print render($user_profile['username']); ?>

      <?php print $avatar; ?>

      <?php print render($user_profile['field_cidade']); ?>

    </div>

    <div class="col-md-9 user-profile-row1-right">
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

