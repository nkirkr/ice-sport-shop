<?php


add_action('init', 'create_global_variable');
function create_global_variable() {
    global $contacts;

    $contacts = [
        'address' => carbon_get_theme_option('address'),
        'phone' => carbon_get_theme_option('phone'),
        'telegram' => carbon_get_theme_option('telegram'),
        'whatsapp' => carbon_get_theme_option('whatsapp'),
        'instagram' => carbon_get_theme_option('instagram'),
        'agreement' => carbon_get_theme_option('agreement'),
        'footer_first_title' => carbon_get_theme_option('footer_first_title'),
        'footer_second_title' => carbon_get_theme_option('footer_second_title'),
        'footer_first_list' => carbon_get_theme_option('footer_first_list'),
        'footer_second_list' => carbon_get_theme_option('footer_second_list'),
    ];
}