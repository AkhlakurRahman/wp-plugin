<div class="wrap">
  <h1>First Plugin</h1>
  <?php settings_errors() ?>

  <form action="options.php" method="POST">
    <?php
    settings_fields('first_options_group');
    do_settings_sections('first_plugin');
    submit_button();
    ?>
  </form>
</div>