<?php
// подключаем Redux
require_once get_template_directory() . '/files/sample-config.php';
//Отключаем режим разработчика в redux
function mihdan_redux_disable_dev_mode( ReduxFramework $redux ) {
    $redux->args['dev_mode'] = false;
    $redux->args['forced_dev_mode_off'] = false;
}
add_action( 'redux/construct', 'mihdan_redux_disable_dev_mode' );

// подключаем стили и скриты
require_once(get_template_directory() . '/files/style-script.php' );

// подключаем меню
require_once(get_template_directory() . '/files/menu.php' );

/* Подключение миниатюр */

if ( function_exists( 'add_theme_support' ) ) {

    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 350, 250 );

}


// регистрируем сайтбары
require_once(get_template_directory() . '/files/sidebar.php' );
// подключаем хлебные крошки
require_once(get_template_directory() . '/files/breadcrumbs.php' );
// Первый баннер в шапке сайта
require_once(get_template_directory() . '/files/banner-top.php' );
// Первый баннер в середине записи
require_once(get_template_directory() . '/files/banner1.php' );
// виджет популярные записи
require get_template_directory() . '/files/popular-posts-widget.php';
// слайдер записей в шапке
require get_template_directory() . '/files/slider-top.php';
//  подключаем стили бутсрап4  для меню
require_once get_template_directory() . '/files/wp_bootstrap_navwalker.php';
//ограничиваем колличество знаков в TITLE
function trim_title_chars($count, $after) {
    $title = get_the_title();
    if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
    else $after = '';
    echo $title . $after;
}


// регистрируем свой тип записи
require_once get_template_directory() . '/files/post-type.php';

// органичиваем текст в анонсах
function wphome_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
// подключаем установищик плагинов
require_once get_template_directory() . '/files/plugin-activation.php';
// подключаем скрипты обратной связи
require get_template_directory() . '/files/mail.php';

