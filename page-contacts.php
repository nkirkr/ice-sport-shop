<?php
/* Template Name: Контакты */
get_header();
?>

<main class="main">
    <section class="contacts-page-header">
    <?php custom_breadcrumbs(); ?>
    <div class="container">
        <h1 class="contacts-page-header__title">Контактная информация</h1>
    </div>
    </section>
    <?php get_template_part('template-parts/map'); ?>
</main>

<?php get_footer(); ?>

