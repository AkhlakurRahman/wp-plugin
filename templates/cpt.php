<div class="wrap">
  <h1>CPT Manager</h1>
  <?php settings_errors(); ?>

  <form action="options.php" method="POST">
    <?php
    settings_fields('first_plugin_cpt_settings');
    do_settings_sections('first_cpt');
    submit_button();
    ?>
  </form>

</div>