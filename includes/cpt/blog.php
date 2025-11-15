<?php 

add_action('init', function() {

    // CPT: Блог
    register_post_type('blog', [
        'labels' => [
            'name'          => 'Блог',
            'singular_name' => 'Статья',
            'breadcrumbs_label' => 'Блог',
            'add_new'       => 'Добавить статью',
            'add_new_item'  => 'Добавить новую статью',
            'edit_item'     => 'Редактировать статью',
            'new_item'      => 'Новая статья',
            'view_item'     => 'Просмотр статьи',
            'search_items'  => 'Искать статьи',
            'not_found'     => 'Статьи не найдены',
            'menu_name'     => 'Блог',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'blog'],
        'supports'      => ['title'],
        'show_in_nav_menus' => true,
        'show_in_rest'  => false,
        'menu_icon'     => 'dashicons-welcome-write-blog',
    ]);

    register_taxonomy('topic', 'blog', [
        'label' => 'Темы',
        'hierarchical' => true,
        'rewrite' => ['slug' => 'topics'],
    ]);

    register_taxonomy('tags', 'blog', [
        'label' => 'Метки',
        'hierarchical' => true,
        'rewrite' => ['slug' => 'metki'],
    ]);

    register_taxonomy('author', 'blog', [
        'label' => 'Авторы',
        'hierarchical' => true,
        'rewrite' => ['slug' => 'avtory'],
    ]);


});