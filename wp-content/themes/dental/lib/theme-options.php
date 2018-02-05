<?php

namespace dental\Libs;

function dental_add_menu_page() {

  // Generate the main menu page
  add_menu_page( 'Opções do Tema', 'Options', 'manage_options', 'dental_options', __NAMESPACE__ . '\\dental_theme_create_page' , 'dashicons-admin-generic
', 110 );

  // Generates the submenus page
  add_submenu_page( 'dental_options', 'Geral', 'Geral', 'manage_options', 'dental_options', __NAMESPACE__ . '\\dental_theme_create_page' );

  // Activate custom settings
  add_action( 'admin_init', __NAMESPACE__ . '\\dental_custom_settings' );

}
add_action( 'admin_menu', __NAMESPACE__ . '\\dental_add_menu_page' );


function dental_theme_create_page() {
  require_once( get_template_directory() . '/templates/admin/theme-general.php' );
}

function dental_custom_settings() {
  // Register the goup section
  add_settings_section( 'dental-general-options', 'Opções Gerais', __NAMESPACE__ . '\\dental_opcoes_gerais', 'dental_options' );

  // Facebook Field
  register_setting( 'dental-options-group', 'dental_facebook' );
  add_settings_field( 'dental-facebook', 'Facebook', __NAMESPACE__ . '\\dental_facebook', 'dental_options', 'dental-general-options' );

  // Facebook Logo Field
  register_setting( 'dental-options-group', 'dental_facebook_logo' );
  add_settings_field( 'dental-facebook-logo', 'Facebook Logo', __NAMESPACE__ . '\\dental_facebook_logo', 'dental_options', 'dental-general-options' );

  // Instagram Field
  register_setting( 'dental-options-group', 'dental_instagram' );
  add_settings_field( 'dental-instagram', 'Instagram', __NAMESPACE__ . '\\dental_instagram', 'dental_options', 'dental-general-options' );

  // Instagram Logo Field
  register_setting( 'dental-options-group', 'dental_instagram_logo' );
  add_settings_field( 'dental-instagram-logo', 'Instagram Logo', __NAMESPACE__ . '\\dental_instagram_logo', 'dental_options', 'dental-general-options' );

  // Whatsapp Field
  register_setting( 'dental-options-group', 'dental_whatsapp' );
  add_settings_field( 'dental-whatsapp', 'Whatsapp', __NAMESPACE__ . '\\dental_whatsapp', 'dental_options', 'dental-general-options' );

  // Whatsapp Logo Field
  register_setting( 'dental-options-group', 'dental_whatsapp_logo' );
  add_settings_field( 'dental-whatsapp-logo', 'Whatsapp Logo', __NAMESPACE__ . '\\dental_whatsapp_logo', 'dental_options', 'dental-general-options' );
}

function dental_opcoes_gerais() {
  echo "Informações gerais sobre a empresa";
}


function dental_telefone() {
  $dental_tel = esc_attr( get_option( 'dental_telefone' ) );
  echo '<input type="text" name="dental_telefone" value="'. $dental_tel .'" />';
}

function dental_telefone_export() {
  $dental_tel_export = esc_attr( get_option( 'dental_telefone_export' ) );
  echo '<input type="text" name="dental_telefone_export" value="'. $dental_tel_export .'" />';
}

function dental_endereco() {
  $dental_endereco = esc_attr( get_option( 'dental_endereco' ) );
  echo '<input type="text" name="dental_endereco" class="regular-text" value="'. $dental_endereco .'" />';
}

function dental_facebook() {
  $dental_facebook = esc_attr( get_option( 'dental_facebook' ) );
  echo '<input type="text" name="dental_facebook" class="regular-text" value="'. $dental_facebook .'" />';
}

function dental_facebook_logo() {
  $dental_facebook_logo = esc_attr( get_option( 'dental_facebook_logo' ) );
  echo '<input type="text" name="dental_facebook_logo" class="regular-text" value="'. $dental_facebook_logo .'" />';
}

function dental_instagram() {
  $dental_instagram = esc_attr( get_option( 'dental_instagram' ) );
  echo '<input type="text" name="dental_instagram" class="regular-text" value="'. $dental_instagram .'" />';
}

function dental_instagram_logo() {
  $dental_instagram_logo = esc_attr( get_option( 'dental_instagram_logo' ) );
  echo '<input type="text" name="dental_instagram_logo" class="regular-text" value="'. $dental_instagram_logo .'" />';
}

function dental_whatsapp() {
  $dental_whatsapp = esc_attr( get_option( 'dental_whatsapp' ) );
  echo '<input type="text" name="dental_whatsapp" class="regular-text" value="'. $dental_whatsapp .'" />';
}

function dental_whatsapp_logo() {
  $dental_whatsapp_logo = esc_attr( get_option( 'dental_whatsapp_logo' ) );
  echo '<input type="text" name="dental_whatsapp_logo" class="regular-text" value="'. $dental_whatsapp_logo .'" />';
}
