<?php

add_action('init', function() {

    // CPT: Акции
    register_post_type('promo', [
        'labels' => [
            'name'          => 'Акции',
            'singular_name' => 'Акция',
            'breadcrumbs_label' => 'Акции',
            'add_new'       => 'Добавить акцию',
            'add_new_item'  => 'Добавить новую акцию',
            'edit_item'     => 'Редактировать акцию',
            'new_item'      => 'Новая акция',
            'view_item'     => 'Просмотр акции',
            'search_items'  => 'Искать акции',
            'not_found'     => 'Акции не найдены',
            'menu_name'     => 'Акции',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'aktsii'],
        'supports'      => ['title', 'excerpt'],
        'show_in_nav_menus' => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-tag',
    ]);

});