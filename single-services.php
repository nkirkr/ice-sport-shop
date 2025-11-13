<?php get_header(); ?>

<main class="main">
    <nav class="breadcrumbs container">
    <ul class="breadcrumbs__list">
        <li><a class="breadcrumbs__link" href="/">Главная</a></li>
        <li class="breadcrumbs__separator"></li>
        <li>
        <a class="breadcrumbs__link" href="./services.html">Услуги</a>
        </li>
        <li
        class="breadcrumbs__separator breadcrumbs__separator--current"
        ></li>
        <li class="breadcrumbs__current">Заточка лезвий коньков</li>
    </ul>
    </nav>

    <?php

        get_template_part('template-parts/service/hero');
        get_template_part('template-parts/service/portfolio');
        get_template_part('template-parts/service/price');
        get_template_part('template-parts/service/about');
        get_template_part('template-parts/reviews');
        get_template_part('template-parts/service/subservices');

    ?>
    @@include('services/hero.html') @@include('services/portfolio.html')
    @@include('services/price.html') @@include('services/about.html')
    @@include('services/reviews.html') @@include('services/subservices.html')
    @@include('services/faq.html') @@include('services/promo.html')
    @@include('services/process.html') @@include('services/contact.html')
</main>


<?php get_footer(); ?>