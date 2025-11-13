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
    ]);
//Акция
Container::make('post_meta', 'Дополнительные поля')
    ->show_on_post_type('promo')
    ->add_tab('Основное фото (превью)', [
        Field::make('image', 'promo_preview', 'Фото'),
    ]);