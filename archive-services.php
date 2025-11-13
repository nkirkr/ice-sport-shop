<?php get_header(); ?>

<main class="main">
    <section class="services-page__header">
    <div class="container">
        <nav class="breadcrumbs" aria-label="Хлебные крошки">
        <ul class="breadcrumbs__list">
            <li><a class="breadcrumbs__link" href="/">Главная</a></li>
            <li
            class="breadcrumbs__separator breadcrumbs__separator--current"
            ></li>
            <li class="breadcrumbs__current">Услуги</li>
        </ul>
        </nav>
        <div class="services-page__top">
        <div class="services-page__text">
            <h1 class="services-page__title">Все наши услуги</h1>
        </div>
        </div>
    </div>
    </section>

    <section class="services-page">
    <div class="container">
        <div class="services-page__grid">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/components/service-card' ); ?>
            <?php endwhile; ?>

            <?php
            $big = 999999999; 

            $pagination_links = paginate_links([
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => 'page/%#%/',
                'current'   => max(1, get_query_var('paged')),
                'total'     => $wp_query->max_num_pages,
                'prev_text' => '«',
                'next_text' => '»',
                'type'      => 'array', 
            ]);

            if (!empty($pagination_links)) :
            ?>
            <nav class="pagination" aria-label="Пагинация">
                <ul class="pagination__list">
                    <?php foreach ($pagination_links as $link) : ?>
                        <li class="pagination__item"><?php echo str_replace('page-numbers', 'pagination__link', $link); ?></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <?php endif; ?>
        <?php else : ?>
            <p>Записей не найдено.</p>
        <?php endif; ?>
        
        </div>

        <nav class="pagination" aria-label="Пагинация">
        <ul class="pagination__list">
            <li class="pagination__item">
            <button
                class="pagination__arrow pagination__arrow--disabled"
                disabled
                aria-label="Предыдущая страница"
            >
                Предыдущая
            </button>
            </li>
            <li class="pagination__item">
            <a class="pagination__link pagination__link--active" href="#"
                >1</a
            >
            </li>
            <li class="pagination__item">
            <a class="pagination__link" href="#">2</a>
            </li>
            <li class="pagination__item">
            <a class="pagination__link" href="#">3</a>
            </li>
            <li class="pagination__item pagination__item--dots">
            <span>...</span>
            </li>
            <li class="pagination__item">
            <a class="pagination__link" href="#">10</a>
            </li>
            <li class="pagination__item">
            <button
                class="pagination__arrow"
                aria-label="Следующая страница"
            >
                Далее
            </button>
            </li>
        </ul>
        </nav>
    </div>
    </section>
</main>

<?php get_footer(); ?>