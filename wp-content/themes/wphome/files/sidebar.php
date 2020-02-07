<?php
/**
 * подключаем сайтбары
 */

add_action( 'widgets_init', 'register_wphome_widgets' );
function register_wphome_widgets(){
    register_sidebar( [
            'name'          => 'Правый сайтбар',
            'id'            => 'sidebar-right',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="treading-articles-widget mb-70 %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => "</h4>\n",
        ]

    );
    register_sidebar( [
            'name'          => 'Левый подвал сайтбара',
            'id'            => 'footer-1',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="footer-widget-area %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h5 class="widgettitle-foter">',
            'after_title'   => "</h5>\n",
        ]

    );

    register_sidebar( [
            'name'          => 'Правый сайтбар подвала',
            'id'            => 'footer-3',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="footer-widget-area %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h5 class="widgettitle-foter">',
            'after_title'   => "</h5>\n",
        ]

    );
    register_sidebar( [
            'name'          => 'Статистика сайта',
            'id'            => 'footer-stat',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="footer-widget-area %2$s">',
            'after_widget'  => "</div>\n",

        ]

    );
}