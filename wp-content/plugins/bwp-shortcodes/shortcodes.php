<?php
/**
 * bwp- Shortcodes plugin | Shortcodes
 */

if (!defined('ABSPATH')) {
  die('Hi there!  I\'m just a plugin...');
}

/**
 * Add shortcodes style
 *
 * @since bwp- Shortcodes 1.0
 * @access public
 * @return void
 */
if (!function_exists('bwpt_sc_styles')) {
  function bwpt_sc_styles() {
    $genericons_style_url = plugins_url('genericons/genericons.css', __FILE__);
    $main_style_url = plugins_url('css/bwp-shortcodes-style.css', __FILE__);

    wp_enqueue_style('bwpt-sc-genericons-style', $genericons_style_url, '', '', 'all');
    wp_enqueue_style('bwpt-sc-main-style', $main_style_url, '', '', 'all');
  }
}
add_action('wp_enqueue_scripts', 'bwpt_sc_styles');

/**
 * Add scripts
 *
 * @since bwp- Shortcodes 1.0
 * @access public
 * @return void
 */
if (!function_exists('bwpt_sc_scripts')) {
  function bwpt_sc_scripts() {
    // jquery + jquery-ui
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_script('jquery-ui-tabs');

    // bwp- Shortcodes js
    $main_js_url = plugins_url('js/bwp-shortcodes-js.js', __FILE__);

    wp_register_script('bwpt-shortcodes-js', $main_js_url, false, null, true);
    wp_enqueue_script('bwpt-shortcodes-js', array('jquery'));
  }
}
add_action('wp_enqueue_scripts', 'bwpt_sc_scripts');

/**
 * Columns
 *
 * @since bwp- Shortcodes 1.0
 */

// row
if (!function_exists('bwpt_sc_row')) {
  function bwpt_sc_row($atts, $content = null) {
    $html = '<div class="bwp-sc-row bwp-clearfix">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('row', 'bwpt_sc_row');
}

// 2 columns
if (!function_exists('bwpt_sc_col_2')) {
  function bwpt_sc_col_2($atts, $content = null) {
    $html = '<div class="bwp-sc-col-2">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('col_2', 'bwpt_sc_col_2');
}

// 3 columns
if (!function_exists('bwpt_sc_col_3')) {
  function bwpt_sc_col_3($atts, $content = null) {
    $html = '<div class="bwp-sc-col-3">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('col_3', 'bwpt_sc_col_3');
}

// 4 columns
if (!function_exists('bwpt_sc_col_4')) {
  function bwpt_sc_col_4($atts, $content = null) {
    $html = '<div class="bwp-sc-col-4">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('col_4', 'bwpt_sc_col_4');
}

// 5 columns
if (!function_exists('bwpt_sc_col_5')) {
  function bwpt_sc_col_5($atts, $content = null) {
    $html = '<div class="bwp-sc-col-5">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('col_5', 'bwpt_sc_col_5');
}

// 6 columns
if (!function_exists('bwpt_sc_col_6')) {
  function bwpt_sc_col_6($atts, $content = null) {
    $html = '<div class="bwp-sc-col-6">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('col_6', 'bwpt_sc_col_6');
}

// 2/3 column
if (!function_exists('bwpt_sc_col_2_3')) {
  function bwpt_sc_col_2_3($atts, $content = null) {
    $html = '<div class="bwp-sc-col-2-3">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('col_2_3', 'bwpt_sc_col_2_3');
}

// 1/3 column
if (!function_exists('bwpt_sc_col_1_3')) {
  function bwpt_sc_col_1_3($atts, $content = null) {
    $html = '<div class="bwp-sc-col-1-3">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('col_1_3', 'bwpt_sc_col_1_3');
}

/**
 * Information boxes
 *
 * @since bwp- Shortcodes 1.0
 */

// with background color
if (!function_exists('bwpt_sc_info_box_bg')) {
  function bwpt_sc_info_box_bg($atts, $content = null) {
    extract(shortcode_atts(array(
      'pre_bg_color' => 'red', // red, orange, yellow, green, blue, purple, pink, black
      'pre_text_color' => 'white', // white, black
      'width' => '100%',
      'text_align' => 'left',
      'hex_bg_color' => '',
      'hex_text_color' => ''
    ), $atts));

    $bg_class = ($pre_bg_color) ? 'bwp-sc-bg-'.$pre_bg_color : 'bwp-sc-bg-red';
    $color_class = ($pre_text_color) ? 'bwp-sc-text-'.$pre_text_color : 'bwp-sc-text-white';
    $width_style = ($width) ? 'width: '.$width.';' : 'width: 100%;';
    $text_align_style = ($text_align) ? 'text-align: '.$text_align.';' : 'text-align: left;';
    $bg_style = ($hex_bg_color) ? 'background-color: '.$hex_bg_color.';' : '';
    $color_style = ($hex_text_color) ? 'color: '.$hex_text_color.';' : '';

    $html = '<div class="bwp-sc-info-bg '.esc_attr($bg_class).' '.esc_attr($color_class).'" style="'.esc_attr($width_style).' '.esc_attr($text_align_style).' '.esc_attr($bg_style).' '.esc_attr($color_style).'">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('info_bg', 'bwpt_sc_info_box_bg');
}

// with border
if (!function_exists('bwpt_sc_info_box_border')) {
  function bwpt_sc_info_box_border($atts, $content = null) {
    extract(shortcode_atts(array(
      'pre_border_color' => 'red', // red, orange, yellow, green, blue, purple, pink, black
      'width' => '100%',
      'text_align' => 'left',
      'hex_border_color' => '',
      'hex_text_color' => ''
    ), $atts));

    $border_color_class = ($pre_border_color) ? 'bwp-sc-border-'.$pre_border_color : 'bwp-sc-border-red';
    $width_style = ($width) ? 'width: '.$width.';' : 'width: 100%;';
    $text_align_style = ($text_align) ? 'text-align: '.$text_align.';' : 'text-align: left;';
    $border_color_style = ($hex_border_color) ? 'border-color: '.$hex_border_color.';' : '';
    $text_color_style = ($hex_text_color) ? 'color: '.$hex_text_color.';' : '';

    $html = '<div class="bwp-sc-info-border '.esc_attr($border_color_class).'" style="'.esc_attr($width_style).' '.esc_attr($text_align_style).' '.esc_attr($border_color_style).' '.esc_attr($text_color_style).'">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('info_border', 'bwpt_sc_info_box_border');
}

/**
 * Highlight
 *
 * @since bwp- Shortcodes 1.0
 */
if (!function_exists('bwpt_sc_highlight')) {
  function bwpt_sc_highlight($atts, $content = null) {
    extract(shortcode_atts(array(
      'pre_bg_color' => 'red', // red, orange, yellow, green, blue, purple, pink, black
      'hex_bg_color' => '',
      'hex_text_color' => ''
    ), $atts));

    $bg_class = ($pre_bg_color) ? 'bwp-sc-bg-'.$pre_bg_color : 'bwp-sc-bg-red';
    $bg_color_style = ($hex_bg_color) ? 'background-color: '.$hex_bg_color.';' : '';
    $text_color_style = ($hex_text_color) ? 'color: '.$hex_text_color.';' : '';

    $html = '<span class="bwp-sc-highlight bwp-sc-text-white '.esc_attr($bg_class).'" style="'.esc_attr($bg_color_style).' '.esc_attr($text_color_style).'">'.do_shortcode($content).'</span>';
    return $html;
  }
  add_shortcode('highlight', 'bwpt_sc_highlight');
}

/**
 * Buttons
 *
 * @since bwp- Shortcodes 1.0
 */
if (!function_exists('bwpt_sc_button')) {
  function bwpt_sc_button($atts, $content = null) {
    extract(shortcode_atts(array(
      'href' => '#',
      'target' => '_blank',
      'pre_bg_color' => 'red' // red, orange, yellow, green, blue, purple, pink, black
    ), $atts));

    $btn_href = ($href) ? $href : '#';
    $btn_target = ($target) ? $target : '_blank';
    $bg_class = ($pre_bg_color) ? 'bwp-sc-button-'.$pre_bg_color : 'bwp-sc-button-red';

    $html = '<a href="'.esc_url($btn_href).'" target="'.esc_attr($btn_target).'" class="bwp-sc-button '.esc_attr($bg_class).'">'.do_shortcode($content).'</a>';
    return $html;
  }
  add_shortcode('button', 'bwpt_sc_button');
}

/**
 * Divider
 *
 * @since bwp- Shortcodes 1.0
 */
if (!function_exists('bwpt_sc_divider')) {
  function bwpt_sc_divider($atts, $content = null) {
    extract(shortcode_atts(array(
      'pre_color' => 'red', // red, orange, yellow, green, blue, purple, pink, black
      'type' => 'solid', // dotted, dashed, solid, double, groove, ridge, inset, outset
      'width' => '100%',
      'height' => '1px',
      'hex_color' => ''
    ), $atts));

    $color_class = ($pre_color) ? 'bwp-sc-border-'.$pre_color : 'bwp-sc-border-red';
    $border_type = ($type) ? 'border-top-style: '.$type.';' : '';
    $border_width = ($width) ? 'width: '.$width.';' : '';
    $border_height = ($height) ? 'border-top-width: '.$height.';' : '';
    $border_hex = ($hex_color) ? 'border-color: '.$hex_color.';' : '';

    $html = '<div class="bwp-sc-divider '.esc_attr($color_class).'" style="'.esc_attr($border_height).' '.esc_attr($border_type).' '.esc_attr($border_hex).' '.esc_attr($border_width).'"></div>';
    return $html;
  }
  add_shortcode('divider', 'bwpt_sc_divider');
}

/**
 * Genericon - http://genericons.com/#portfolio
 *
 * @since bwp- Shortcodes 1.0
 */
if (!function_exists('bwpt_sc_genericons')) {
  function bwpt_sc_genericons($atts, $content = null) {
    extract(shortcode_atts(array(
      'icon' => 'genericon-polldaddy',
      'pre_color' => 'black', // red, orange, yellow, green, blue, purple, pink, black
      'size' => '28px',
      'hex_color' => ''
    ), $atts));

    $icon_class = ($icon) ? $icon : 'genericon-polldaddy';
    $color_class = ($pre_color) ? 'bwp-sc-color-'.$pre_color : 'bwp-sc-color-black';
    $size_style = ($size) ? 'font-size: '.$size.';' : '';
    $hex_color_style = ($hex_color) ? 'color: '.$hex_color.';' : '';

    $html = '<div class="genericon '.esc_attr($icon_class).' bwp-sc-icon '.esc_attr($color_class).'" style="'.esc_attr($size_style).' '.esc_attr($hex_color_style).'"></div>';
    return $html;
  }
  add_shortcode('genericon', 'bwpt_sc_genericons');
}

/**
 * Tabs
 *
 * @since bwp- Shortcodes 1.0
 */

// Tabs container
if (!function_exists('bwpt_sc_tabs_container')) {
  function bwpt_sc_tabs_container($atts, $content = null) {
    $html = '';

    $tab_titles = array();
    preg_match_all('/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);

    if (isset($matches[1])) {
      $tab_titles = $matches[1];
    }

    //global $tabs_num;
    $tabs_num = mt_rand(1, 99999);

    if (count($tab_titles)) {
      // tabs container
      $html .= '
      <script>
      jQuery.noConflict()(function($) {
        $(document).ready(function() {
          "use strict";
          $("#bwp-sc-tabs-'.$tabs_num.'").tabs();
        });
      });
      </script>';
      $html .= '<div id="bwp-sc-tabs-'.$tabs_num.'" class="bwp-sc-tabs-container">';

        // tabs nav
        $html .= '<ul class="bwp-clearfix">';
        foreach($tab_titles as $tab_title){
          $html .= '<li><a href="#bwp-sc-tab-'.sanitize_title($tab_title[0]).'">'.$tab_title[0].'</a></li>';
        }
        $html .= '</ul>';
        // end tabs nav

        // tabs content
        $html .= do_shortcode( $content );
        // end tabs content

      $html .= '</div>';
      // end tabs container
    } else {
      $html .= do_shortcode( $content );
    }

    return $html;
  }
  add_shortcode('tabs_container', 'bwpt_sc_tabs_container');
}

// Tab content
if (!function_exists('bwpt_sc_tab_content')) {
  function bwpt_sc_tab_content($atts, $content = null) {
    extract(shortcode_atts(array(
      'title'	=> 'Tab title'
    ), $atts));

    $html = '<div id="bwp-sc-tab-'.sanitize_title($title).'" class="bwp-sc-tab-content bwp-clearfix">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('tab', 'bwpt_sc_tab_content');
}

/**
 * Toggle
 *
 * @since bwp- Shortcodes 1.0
 */
if (!function_exists('bwpt_sc_toggle')) {
  function bwpt_sc_toggle($atts, $content = null) {
    extract(shortcode_atts(array(
      'title'	=> 'Toggle title'
    ), $atts));

    $toggle_title = ($title) ? $title : 'Toggle title';
    $toggle_num = mt_rand(1, 999);

    $html = '
    <div id="bwp-sc-toggle-'.$toggle_num.'" class="bwp-sc-toggle-container">
      <h3 class="bwp-sc-toggle-trigger">
        <span class="bwp-sc-toggle-icon"></span>
        '.$toggle_title.'
      </h3>
      <div class="bwp-sc-toggle-content bwp-clearfix">
        '.do_shortcode($content).'
      </div>
    </div>';
    return $html;
  }
  add_shortcode('toggle', 'bwpt_sc_toggle');
}

/**
 * Accordion
 *
 * @since bwp- Shortcodes 1.0
 */

// Accordion container
if (!function_exists('bwpt_sc_accordion_container')) {
  function bwpt_sc_accordion_container($atts, $content = null) {
    $accordion_num = mt_rand(1, 99999);

    $html = '
    <script>
    jQuery.noConflict()(function($) {
      $(document).ready(function() {
        "use strict";
        $("#bwp-sc-accordion-'.$accordion_num.'").accordion({
          heightStyle: "content"
        });
      });
    });
    </script>
    <div id="bwp-sc-accordion-'.$accordion_num.'" class="bwp-sc-accordion-container">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('accordion', 'bwpt_sc_accordion_container');
}

// Accordion section
if (!function_exists('bwpt_sc_accordion_section')) {
  function bwpt_sc_accordion_section($atts, $content = null) {
    extract(shortcode_atts(array(
      'title'	=> 'Section title'
    ), $atts));

    $section_title = ($title) ? $title : 'Section title';

    $html = '
    <h3>'.$section_title.'</h3>
    <div class="bwp-sc-accordion-content bwp-clearfix">'.do_shortcode($content).'</div>';
    return $html;
  }
  add_shortcode('accordion_section', 'bwpt_sc_accordion_section');
}
