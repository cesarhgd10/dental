<div class="wrap">
  <h1>Geral</h1>

  <?php settings_errors(); ?>
  <form action="options.php" method="post">
    <?php settings_fields( 'dental-options-group' ); ?>
    <?php do_settings_sections( 'dental_options' ); ?>
    <?php submit_button(); ?>
  </form>
</div>
