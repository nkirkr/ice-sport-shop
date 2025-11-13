<?php

add_action('init', function() {

    // CPT: Отзывы
    register_post_type('reviews', [
        'labels' => [
            'name'          => 'Отзывы',
            'singular_name' => 'Отзыв',
            'add_new'       => 'Добавить отзыв',
            'add_new_item'  => 'Добавить новый отзыв',
            'edit_item'     => 'Редактировать отзыв',
            'new_item'      => 'Новый отзыв',
            'view_item'     => 'Просмотр отзыва',
            'search_items'  => 'Искать отзывы',
            'not_found'     => 'Отзыв не найдены',
            'menu_name'     => 'Отзывы',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'reviews'],
        'supports'      => ['title', 'editor'], 
        'show_in_nav_menus' => true,
        'show_in_rest'  => false,
        'menu_icon'     => 'dashicons-admin-comments',
    ]);

});