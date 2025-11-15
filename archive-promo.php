<?php 
get_header(); ?>

<main class="main">
    <section class="promo-page-header page-section">
    <div class="container">
        <nav class="breadcrumbs promo-page-header__breadcrumbs">
        <ul class="breadcrumbs__list">
            <li><a class="breadcrumbs__link" href="/">Главная</a></li>
            <li
            class="breadcrumbs__separator breadcrumbs__separator--current"
            ></li>
            <li class="breadcrumbs__current">Акции</li>
        </ul>
        </nav>
        <h1 class="promo-page-header__title"><?php echo esc_html( carbon_get_theme_option('promo_page_title') ); ?></h1>
        <p class="promo-page-header__subtitle">
        <?php echo esc_html( carbon_get_theme_option('promo_page_subtitle') ); ?>
        </p>
    </div>
    </section>

    <section class="promo page-section">
        <div class="container">
        <div class="promo__header">
            <div class="promo__text">
            <h2 class="promo__title">Акции</h2>
            <p class="promo__subtitle">Наши лучшие предложения</p>
            </div>
            <a href="/promo.html" class="promo__link">Все акции</a>
        </div>
        <div class="promo__grid">
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/components/promo-card' ); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Записей не найдено.</p>
            <?php endif; ?>
        </div>

    </section>


        <?php get_template_part('template-parts/promo/policy'); ?>
    
    </main>

<?php get_footer(); ?>