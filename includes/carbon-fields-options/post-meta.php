<?php 

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


//Главная
Container::make('post_meta', 'Дополнительные поля')
    ->show_on_page(60)
    ->add_tab('Первый блок', [
        Field::make('text', 'hero_title', 'Заголовок'),
        Field::make('textarea', 'hero_subtitle', 'Подзаголовок'),
        Field::make('text', 'hero_call', 'Призыв к действию'),
        Field::make('text', 'hero_button', 'Текст кнопки'),
        Field::make('image', 'hero_image', 'Изображение'),
    ])
    ->add_tab('Популярные категории', [
        Field::make('text', 'popular_title', 'Заголовок секции'),
        Field::make('text', 'popular_subtitle', 'Подзаголовок секции'),
        Field::make('association', 'popular_list', 'Список популярных категорий')
            ->set_types(array(
                array(
                    'type' => 'term',
                    'taxonomy' => 'product_cat',
                )
        ))->set_max(3)
    ])
    ->add_tab('Бестселлеры', [
        Field::make('text', 'bestsellers_title', 'Заголовок секции'),
        Field::make('text', 'bestsellers_subtitle', 'Подзаголовок секции'),
        Field::make('association', 'bestsellers_list', 'Список товаров')
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'product',
                )
        ))->set_max(3)
    ])
    ->add_tab('Блок с SEO-текстом', [
        Field::make('rich_text', 'home_seo_text_1', 'Текст – 1')->set_width(50),
        Field::make('image', 'home_seo_image_1', 'Изображение – 1')->set_width(50),
        Field::make('image', 'home_seo_image_2', 'Изображение – 2')->set_width(50),
        Field::make('rich_text', 'home_seo_text_2', 'Текст – 2')->set_width(50),
        Field::make('complex', 'home_seo_advantages', 'Преимущества')
            ->add_fields([
                Field::make('text', 'advantages_title', 'Заголовок')->set_width(50),
                Field::make('text', 'advantages_text', 'Краткий текст')->set_width(50),
            ])->set_max(3),
    ])
    ->add_tab('Услуги', [
        Field::make('text', 'services_title', 'Заголовок секции'),
        Field::make('text', 'services_subtitle', 'Подзаголовок секции'),
        Field::make('association', 'services_list', 'Список услуг')
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'services',
                )
        ))->set_max(3)
    ])
    ->add_tab('Акции', [
        Field::make('text', 'promo_title', 'Заголовок секции'),
        Field::make('text', 'promo_subtitle', 'Подзаголовок секции'),
        Field::make('association', 'promo_list', 'Список акций')
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'promo',
                )
        ))->set_max(3)
    ]);
    
//Товар
Container::make('post_meta', 'Дополнительно')
        ->where('post_type', '=', 'product')
        ->add_tab('Вариации товара', [
            Field::make('association', 'related_products', 'Этот товар в другом цвете')
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'product',
                    ]
                ])
                ->set_help_text('Выберите товары, которые отличаются цветом.'),
        ])
        ->add_tab('Блок текст + фото', [
            Field::make('image', 'about_image', 'Фото'),
            Field::make('rich_text', 'about_text', 'Текст'),
        ])
        ->add_tab('С этим товаром часто покупают', [
             Field::make('association', 'product_additional', 'Выберите до 4-х товаров')
                ->set_types(array(
                    array(
                        'type' => 'post',
                        'post_type' => 'product',
                    )
                ))->set_max(4),
        ]);

//Проект (Портфолио)
Container::make('post_meta', 'Дополнительные поля')
    ->show_on_post_type('portfolio')
    ->add_tab('Фото до и после', [
        Field::make('image', 'portfolio_before', 'Фото до'),
        Field::make('image', 'portfolio_after', 'Фото после'),
    ]);
    // ->add_tab('Первый блок (Фото до и после + текст' , [
    //     Field::make('rich_text', 'hero_text', 'Текст'),
    // ])
    // ->add_tab('Описаниие проблемы', [
    //     Field::make('image', 'problem_image', 'Фото'),
    //     Field::make('rich_text', 'problem_text', 'Текст'),
    // ])
    // ->add_tab('Ход работы', [
    //     Field::make('image', 'process_image_1', 'Фото – 1')
    //         ->set_width(50),
    //     Field::make('image', 'process_image_2', 'Фото – 2')
    //         ->set_width(50),
    //     Field::make('rich_text', 'process_text', 'Текст'),
    // ]);

//Отзыв
Container::make('post_meta', 'Дополнительные поля')
    ->show_on_post_type('reviews')
    ->add_fields([
        Field::make('text', 'review_author', 'Автор отзыва'),
        Field::make('image', 'review_image', 'Фото автора'),
        Field::make('text', 'review_date', 'Дата публикации'),
    ]);

//Услуга
Container::make('post_meta', 'Дополнительные поля')
    ->show_on_post_type('services')
    ->add_tab('Основное фото (превью)', [
        Field::make('image', 'service_preview', 'Фото'),
    ])
    ->add_tab('Первый блок', [
        Field::make('text', 'service_subtitle', 'Подзаголовок'),
        Field::make('text', 'service_price', 'Цена'),
        Field::make('rich_text', 'service_hero_text', 'Текст под фото'),
    ])
    ->add_tab('Наши работы', [
        Field::make('complex', 'portfolio_list', 'Список работ')
            ->add_fields([
                Field::make('image', 'portfolio_before', 'Фото – до')
                    ->set_width(50),
                Field::make('image', 'portfolio_after', 'Фото – после')
                    ->set_width(50),
        ])->set_max(3)
    ])
    ->add_tab('Прайс', [
        Field::make('complex', 'price_list', 'Прайс лист')
            ->add_fields([
                Field::make('text', 'price_list_title', 'Наименование')
                    ->set_width(33),
                Field::make('textarea', 'price_list_descr', 'Краткое описание')
                    ->set_width(33),
                Field::make('text', 'price_list_price', 'Стоимость')
                    ->set_width(33),
        ])->set_max(3)
    ])
    ->add_tab('SEO-блок', [
        Field::make('rich_text', 'service_seo_text_1', 'Текст – 1')->set_width(50),
        Field::make('rich_text', 'service_seo_text_2', 'Текст – 2')->set_width(50),
        Field::make('image', 'service_seo_image_1', 'Изображение – 1')->set_width(50),
        Field::make('image', 'service_seo_image_2', 'Изображение – 2')->set_width(50),
    ])
    ->add_tab('Подуслуги', [
        Field::make('association', 'subservices_list', 'Список подуслуг')
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'services',
                )
        ))->set_max(3)
    ])
    ->add_tab('FAQ', [
        Field::make('association', 'faq_list_1', 'Частые вопросы – левая колонка')
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'faq',
                )
            ))->set_width(50),
        Field::make('association', 'faq_list_2', 'Частые вопросы – правая колонка')
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'faq',
                )
            ))->set_width(50),
    ])
    ->add_tab('Документы', [
        Field::make('complex', 'documents_list', 'Список документов')
            ->add_fields([
                Field::make('image', 'documents_image', 'Изображение документа'),
                Field::make('text', 'documents_caption', 'Подпись к изображению')
        ])->set_max(4),
    ])
    ->add_tab('Описание процесса', [
        Field::make('rich_text', 'process_text', 'Текст')->set_width(50),
        Field::make('image', 'process_image', 'Изображение')->set_width(50),
    ]);

//Акция
Container::make('post_meta', 'Дополнительные поля')
    ->show_on_post_type('promo')
     ->add_tab('Шапка записи', [
        Field::make('text', 'promo_head_1', 'Текст 1 (Дата проведения)'),
        Field::make('text', 'promo_head_2', 'Текст 2 (Слева от кнопки)'),
        Field::make('text', 'promo_btn', 'Текст кнопки'),
     ])
    ->add_tab('Основное фото (превью)', [
        Field::make('image', 'promo_preview', ''),
    ])
    ->add_tab('Основной текст', [
        Field::make('rich_text', 'promo_main_text', ''),
    ]);

// Статья (Блог)
Container::make('post_meta', 'Контент статьи')
    ->show_on_post_type('blog')
    ->add_tab('Основные фото (превью)', [
        Field::make('image', 'main_image_desktop', 'Фото')
            ->set_width(50),
    ])
    ->add_tab('Отрывок на превью', [
        Field::make('rich_text', 'article_excerpt', ''),
    ])
    ->add_tab('Текст статьи', [
        Field::make('rich_text', 'article_text', ''),
    ])
    ->add_tab('Элемент конверсии', [
        Field::make('rich_text', 'conversion_text', 'Текстовый блок'),
        Field::make('image', 'conversion_image', 'Изображение'),
    ])
    ->add_tab('Аудио', [
        Field::make( 'file', 'article_audio', '' )
            ->set_type( 'audio' )
    ])
    ->add_tab('Видео', [
        Field::make( 'file', 'article_video', 'Видео' )
            ->set_type( 'video' )
            ->set_width(50),
        Field::make('image', 'article_video_thumb', 'Обложка видео')
            ->set_width(50),
        Field::make('textarea', 'article_video_descr', 'Краткое описание под видео'),
    ])
    ->add_tab('Галерея', [
        Field::make( 'complex', 'article_gallery', 'Галерея изображений' )
            ->add_fields([
                Field::make('image', 'article_gallery_img', 'Изображение'),
                Field::make('text', 'article_gallery_text', 'Описание'),
            ])
    ])
    ->add_tab('Статистика', [
        Field::make('text', 'likes', 'Лайки')
            ->set_default_value('0')
            ->set_attribute('readOnly', true)
            ->set_help_text('Поле недоступно для самостоятельного редактирования')
            ->set_width(50),
        Field::make('text', 'views', 'Просмотры')
            ->set_default_value('0')
            ->set_attribute('readOnly', true)
            ->set_help_text('Поле недоступно для самостоятельного редактирования')
            ->set_width(50),
    ])
    ->add_tab('Настройки статьи', [
        Field::make('checkbox', 'is_best_article', 'Показывать в блоке “Лучшие статьи”')
            ->set_option_value('yes')
            ->set_help_text('Отметьте, если хотите показать статью в блоке “Лучшие статьи”.'),
    ]);