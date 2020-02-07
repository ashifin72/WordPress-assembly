<?php
/**
 * Подключаем скрипты и стили
 */
add_action( 'wp_enqueue_scripts', 'wphome_style' );
add_action( 'wp_footer', 'wphome_scripts' );
add_action( 'init', 'wphome_post_types' );

function wphome_style() {
    wp_enqueue_style( 'wphome_style', get_stylesheet_uri() );

    wp_enqueue_style( 'main-min', get_template_directory_uri() . '/assets/css/style.min.css' );

}
function wphome_scripts() {

    wp_enqueue_script( 'jquery-2.2.4', get_template_directory_uri() . '/assets/js/jquery/jquery-2.2.4.min.js' );
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/bootstrap/popper.min.js' );
    wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js' );
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins/plugins.js' );
    wp_enqueue_script( 'active', get_template_directory_uri() . '/assets/js/active.js' );
    wp_enqueue_script( 'theia-sticky', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.min.js' );
}

//класс active для активного пункта меню
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}

//  переопрелеляем стили для поиска
function my_search_form( $form ) {
    $form = '
  <form role="search" method="get" class="searhform" id="searchform" action="' . home_url( '/' ) . '" >
  
  <input type="text" placeholder="Поиск по сайту..." value="' . get_search_query() . '" name="s" id="s" />
  <button type="submit" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
  
  </form>';
    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );