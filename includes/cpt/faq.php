<?php 

add_action('init', function() {

    // CPT: FAQ
    register_post_type('faq', [
        'labels' => [
            'name'          => 'FAQ',
            'singular_name' => 'Вопрос',
            'add_new'       => 'Добавить вопрос',
            'add_new_item'  => 'Добавить новый вопрос',
            'edit_item'     => 'Редактировать вопрос',
            'new_item'      => 'Новый вопрос',
            'view_item'     => 'Просмотр вопроса',
            'search_items'  => 'Искать вопросы',
            'not_found'     => 'Вопросы не найдены',
            'menu_name'     => 'FAQ',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'faq'],
        'supports'      => ['title', 'editor'],
        'show_in_nav_menus' => false,
        'show_in_rest'  => false,
        'menu_icon'     => 'dashicons-editor-help',
    ]);

});