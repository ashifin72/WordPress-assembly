<?php
/**
 * активация плагинов
 */
require_once dirname(__FILE__).'/class-tgm-plugin-activation.php';
add_action('tgmpa_register','my_theme_register_required_plugins');
function my_theme_register_required_plugins(){
    $plugins = array(
        /* установка плагинов из папки темы, которые вы поставляете в комплекте */
        array(
            'name' => 'Redux Framework', // имя  плагина
            'slug' => 'redux-framework', // Имя плагина (совпадает с именем папки плагина)
            'source' => get_stylesheet_directory().'/plugins/redux-framework.zip', // источник плагина
            'required' => false,
            // 'required' - плагин обязательый? нужно ли го активировать поле установки?
        ),
        /* установка плагинов на автомате из репозитория wordpress */
        array(
            'name' => 'Edit Howdy',
            'slug' => 'redux-framework',
// слуг можно посмотреть в ссылке к плагину
// https://wordpress.org/plugins/edit-howdy/ - edit-howdy
        ),
        array(
            'name' => 'Redux Framework',
            'slug' => 'redux-framework',
            'source' => get_stylesheet_directory().'/plugins/redux-framework.zip', // источник плагина
            'required' => false,
        ),

    );
    $theme_text_domain = 'twentyeleven'; // текстовый домен темы
    $config = array(
        /*domain => $theme_text_domain, // текстовый домен, точно такой как указан в вашей теме*/
        /*dafault_path => '', // Абсолютный путь по умолчанию к папке плагинов*/
        /*menu => 'install-my-theme-plugin', // Menu slug*/
        'settings' => array(
            /*'page_title'	=> __('Install Required Plugins', $theme_text_domain)*/
            /*'menu_title'	=> __('Install Plugins', $theme_text_domain)*/
            /*'instructions_install'	=> __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name */
            /*'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
            /*'button'                 => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name */
            /*'installing'             => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name */
            /*'oops'                   => __( 'Something went wrong with the plugin API.', $theme_text_domain ), // */
            /*'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL */
            /*'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name */
            /*'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
            /*'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name */
            /*'return'                 => __( 'Return to Required Plugins Installer', $theme_text_domain ), // */
        ),
    );
    tgmpa( $plugins, $config );
}
