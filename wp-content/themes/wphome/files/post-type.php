<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.07.2019
 * Time: 15:25
 */
function wphome_post_types(){
    register_post_type('wpshop', [
        'labels' => [
            'name'               => 'Предложения', // основное название для типа записи
            'singular_name'      => 'Предложение', // название для одной записи этого типа
            'add_new'            => 'Добавить новое', // для добавления новой записи
            'add_new_item'       => 'Добавление предложения', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование предложения', // для редактирования типа записи
            'new_item'           => 'Новое предложение', // текст новой записи
            'view_item'          => 'Смотреть предложение', // для просмотра записи этого типа.
            'search_items'       => 'Искать предложения', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Предложения', // название меню
        ],
        'public'              => true,
        'description'         => 'Платные предложения сайта',
        'menu_position'       => 25,
        'menu_icon'           => 'dashicons-format-quote',
        'hierarchical'        => false,
        'supports'            => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'rewrite'             => true,
    ]);
}