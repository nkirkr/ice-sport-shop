<?php get_header(); ?>

<main class="main">
    <nav class="breadcrumbs container">
        <ul class="breadcrumbs__list">
            <li><a class="breadcrumbs__link" href="/">Главная</a></li>
            <li class="breadcrumbs__separator breadcrumbs__separator--current"></li>
            <li class="breadcrumbs__current">Блог</li>
        </ul>
    </nav>

    <section class="blog container">
        <div class="blog__content">
            <div class="blog__header">
                <h1 class="blog__title section-title">Блог</h1>
                <div class="blog-filters nav-wrap">
              <div class="blog-filters__section">
                <p
                  class="blog-filters__title categories-title acnav__main-label"
                >
                  Категории
                  <img src="/img/icons/dropdown.svg" alt="" width="18" height="18" class="blog-filters__arrow" />
                </p>
                <div class="blog-filters__categories acnav" role="navigation">
                  <div class="acnav__main-list">
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Категории</div>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Категории</div>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Категории</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="blog-filters__section">
                <p
                  class="blog-filters__title categories-title acnav__main-label"
                >
                  Метки
                  <img src="/img/icons/dropdown.svg" alt="" width="18" height="18" class="blog-filters__arrow" />
                </p>
                <div class="blog-filters__categories acnav" role="navigation">
                  <div class="acnav__main-list">
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Метки</div>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Метки</div>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Метки</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="blog-filters__section">
                <p
                  class="blog-filters__title categories-title acnav__main-label"
                >
                  Лучшие статьи
                  <img src="/img/icons/dropdown.svg" alt="" width="18" height="18" class="blog-filters__arrow" />
                </p>
                <div class="blog-filters__categories acnav" role="navigation">
                  <div class="acnav__main-list">
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Лучшие статьи</div>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Лучшие статьи</div>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <div class="acnav__label">Лучшие статьи</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/components/blog-card' ); ?>
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
    </section>
</main>

<?php get_footer(); ?>