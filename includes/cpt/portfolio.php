<?php 

add_action('init', function() {

    // CPT: Портфолио
    register_post_type('portfolio', [
        'labels' => [
            'name'          => 'Портфолио',
            'singular_name' => 'Проект',
            'breadcrumbs_label' => 'Наши работы',
            'add_new'       => 'Добавить проект',
            'add_new_item'  => 'Добавить новый проект',
            'edit_item'     => 'Редактировать проект',
            'new_item'      => 'Новый проект',
            'view_item'     => 'Просмотр проекта',
            'search_items'  => 'Искать проекты',
            'not_found'     => 'Проекты не найдены',
            'menu_name'     => 'Портфолио',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'portfolio'],
        'supports'      => ['title', 'thumbnail', 'excerpt'],
        // 'show_in_nav_menus' => true,
        // 'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-portfolio',
    ]);

    register_taxonomy('direction', 'portfolio', [
        'label' => 'Направления',
        'hierarchical' => true,
        'rewrite' => ['slug' => 'napravleniya'],
    ]);

});