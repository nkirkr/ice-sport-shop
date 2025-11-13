<?php
/* Template Name: Главная */
?>

<?php get_header(); ?>

<?php 
    get_template_part('template-parts/home/hero');
    get_template_part('template-parts/home/popular-categories');
    get_template_part('template-parts/home/bestsellers');
    get_template_part('template-parts/reviews');
    get_template_part('template-parts/home/about');
    get_template_part('template-parts/home/services');
    get_template_part('template-parts/home/promo');
    get_template_part('template-parts/contact');
    get_template_part('template-parts/home/map');
?>

<?php get_footer(); ?>