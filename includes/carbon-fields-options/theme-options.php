<?php 

if (!defined('ABSPATH')) {
    exit;
}


use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('theme_options', 'Общие настройки')
    ->add_tab('Логотип', [
        Field::make('image', 'logo', '')

    ])
    ->add_tab('Контактная информация', [
        Field::make('text', 'address', 'Адрес'),
        Field::make('text', 'phone', 'Телефон'),
        Field::make('text', 'telegram', 'Telegram'),
        Field::make('text', 'whatsapp', 'Whatsapp'),
        Field::make('text', 'instagram', 'Instagram'),
        Field::make('text', 'site-email', 'Email'),
    ])
    ->add_tab('Подвал сайта', [
        Field::make('text', 'footer_first_title', 'Первая колонка - заголовок')
            ->set_width(33),
        Field::make('text', 'footer_second_title', 'Вторая колонка - заголовок')
            ->set_width(33),
        Field::make('text', 'footer_third_title', 'Третья колонка - заголовок')
            ->set_width(33),
        Field::make('complex', 'footer_first_list', 'Первая колонка - пункты')
            ->add_fields([
                Field::make('text', 'footer_list_item', 'Пункт'),
            ])->set_width(25),
        Field::make('complex', 'footer_second_list', 'Вторая колонка - ссылки')
            ->add_fields([
                Field::make('text', 'footer_list_item', 'Пункт')
                    ->set_width(50),
                Field::make('text', 'footer_list_link', 'Ссылка')
                    ->set_width(50),
            ])->set_width(25),
       
        
    ])
    ->add_tab('Форма обратной связи', [
        Field::make('text', 'contact_title', 'Заголовок'),
        Field::make('text', 'contact_subtitle', 'Подзаголовок'),
        Field::make('image', 'contact_image', 'Фоновое изображение'),
    ])
    ->add_tab('Страница «Акции»', [
        Field::make('text', 'promo_page_title', 'Заголовок'),
        Field::make('text', 'promo_page_subtitle', 'Подзаголовок'),
        Field::make('rich_text', 'policy_text', 'Политика скидок – текстовый блок'),
        Field::make('image', 'policy_image', 'Политика скидок – изображение'),
    ])
    ->add_tab('Текст на странице каталога', [
        Field::make('image', 'catalog_image_1', 'Изображение – 1')->set_width(50),
        Field::make('image', 'catalog_image_2', 'Изображение – 2')->set_width(50),
        Field::make('rich_text', 'catalog_text', 'Текст'),
    ]);