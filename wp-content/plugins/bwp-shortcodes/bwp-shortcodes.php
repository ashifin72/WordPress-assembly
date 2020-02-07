<?php
/*
Plugin Name: bwp- Shortcodes
Plugin URI: http://birdwp.com
Description: Набор шорткодов для вашего сайта. В комплекте: колонки с текстом, информационные блоки, подсветка, кнопки, разделитель, табы (вкладки), спойлеры и аккордеон. Русская локализация: GoodwinPress.ru
Version: 1.0
Author: Alexey Trofimov
Author URI: http://themeforest.net/user/BirdwpThemes
License: GPLv2
*/

 

/**
 * Changelog:
 *
 * 1.0
 * - Initial release
 */

if (!defined('ABSPATH')) {
  die('Hi there!  I\'m just a plugin...');
}

/**
 * Add shortcodes button to the wp editor
 *
 * @since bwp- Shortcodes 1.0
 * @access public
 * @return void
 */
if (!function_exists('bwpt_sc_add_button')) {
  function bwpt_sc_add_button() {
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
      return;
    }

    if (get_user_option('rich_editing') == 'true') {
      add_filter('mce_external_plugins', 'bwpt_sc_tinymce_plugin');
      add_filter('mce_buttons', 'bwpt_sc_register_new_button');
    }
  }
}
add_action('init', 'bwpt_sc_add_button');

/**
 * Add shortcodes button to TinyMCE
 *
 * @since bwp- Shortcodes 1.0
 * @access public
 * @param $plugin_array
 * @return array
 */
function bwpt_sc_tinymce_plugin($plugin_array) {
  $plugin_array['bwpShortcodes'] = plugins_url('js/tinymce-plugin.js', __FILE__);
  return $plugin_array;
}

/**
 * Register new button
 *
 * @since bwp- Shortcodes 1.0
 * @access public
 * @param $buttons
 * @return array
 */
function bwpt_sc_register_new_button($buttons) {
  array_push($buttons, "|", "bwpt_shortcodes_button");
  return $buttons;
}

/**
 * Add shortcode button style
 *
 * @since bwp- Shortcodes 1.0
 * @access public
 * @return void
 */
if (!function_exists('bwpt_sc_button_style')) {
  function bwpt_sc_button_style() {
    if (is_admin()) {
      $btn_style_url = plugins_url('css/bwp-shortcodes-button.css', __FILE__);
      wp_enqueue_style('bwpt-sc-tinymce-btn-style', $btn_style_url, '', '', 'all');
    }
  }
}
add_action('admin_enqueue_scripts', 'bwpt_sc_button_style');

/**
 * Refresh TinyMCE ver
 *
 * @since bwp- Shortcodes 1.0
 * @access public
 * @param $ver
 * @return int
 */
if (!function_exists('bwpt_sc_refresh_mce_ver')) {
  function bwpt_sc_refresh_mce_ver($ver) {
    $ver += 3;
    return $ver;
  }
}
add_filter('tiny_mce_version', 'bwpt_sc_refresh_mce_ver');

/**
 * Add shortcodes
 */
require_once('shortcodes.php');
