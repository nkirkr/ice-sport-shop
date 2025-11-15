<?php

add_action('init', function() {

    // CPT: Услуги
    register_post_type('services', [
        'labels' => [
            'name'          => 'Услуги',
            'singular_name' => 'Услуга',
            'breadcrumbs_label' => 'Услуги',
            'add_new'       => 'Добавить услугу',
            'add_new_item'  => 'Добавить новую услугу',
            'edit_item'     => 'Редактировать услугу',
            'new_item'      => 'Новая услуга',
            'view_item'     => 'Просмотр услуги',
            'search_items'  => 'Искать услуги',
            'not_found'     => 'Услуги не найдены',
            'menu_name'     => 'Услуги',
        ],
        'hierarchical' => true,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'uslugi'],
        'supports'      => ['title', 'thumbnail', 'excerpt', 'page-attributes'],
        'show_in_nav_menus' => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-hammer',
    ]);


});