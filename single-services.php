<?php get_header(); ?>

<main class="main">

    <?php

        custom_breadcrumbs();

        get_template_part('template-parts/service/hero');
        get_template_part('template-parts/service/portfolio');
        get_template_part('template-parts/service/price');
        get_template_part('template-parts/service/about');
        get_template_part('template-parts/reviews');
        get_template_part('template-parts/service/subservices');
        get_template_part('template-parts/service/faq');
        get_template_part('template-parts/service/documents');
        get_template_part('template-parts/service/process');
        get_template_part('template-parts/contact');

    ?>

</main>


<?php get_footer(); ?>