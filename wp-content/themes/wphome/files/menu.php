<?php
/**
 * подключаем меню
 */
add_action('after_setup_theme', 'wphome_after_setup');
function wphome_after_setup(){
    register_nav_menu('top', 'TOP-menu');
    register_nav_menu('ticker', 'TOP-ticker');
    //подключаем форматы записей
    add_theme_support( 'post-formats', array( 'aside' ) );
}