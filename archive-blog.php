<?php get_header(); ?>

<!-- <main class="main">
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
                        <a href="#" class="acnav__label">Категории</a>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <a href="#" class="acnav__label">Категории</a>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <a href="#" class="acnav__label">Категории</a>
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
                        <a href="#" class="acnav__label">Метка</a>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <a href="#" class="acnav__label">Метка</a>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <a href="#" class="acnav__label">Метка</a>
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
                        <a href="#" class="acnav__label">Статья1</a>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <a href="#" class="acnav__label">Статья1</a>
                      </li>
                    </ul>
                    <ul class="acnav__list acnav__list--level1">
                      <li class="blog-filters__categories-item has-children">
                        <a href="#" class="acnav__label">Статья1</a>
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
</main> -->
<main class="main">
  <section class="blog-header">
    <div class="container">
      <nav class="breadcrumbs blog-header__breadcrumbs">
        <ul class="breadcrumbs__list">
          <li><a class="breadcrumbs__link" href="/">Главная</a></li>
          <li
            class="breadcrumbs__separator breadcrumbs__separator--current"
          ></li>
          <li class="breadcrumbs__current">Блог</li>
        </ul>
      </nav>
      <div class="blog-header__top">
        <div class="blog-header__text">
          <h1 class="blog-header__title">Блог</h1>
          <p class="blog-header__subtitle">Последние публикации</p>
        </div>
      </div>
      <div class="blog-header__mobile-bar">
        <p class="blog-header__subtitle">Последние публикации</p>
        <div
          class="blog-filters__open acnav__main-label"
          id="mobile-filters-toggle"
        >
          <svg
            width="32"
            height="32"
            viewBox="0 0 32 32"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M25 17C25 17.2652 24.8946 17.5196 24.7071 17.7071C24.5196 17.8946 24.2652 18 24 18H8C7.73478 18 7.48043 17.8946 7.29289 17.7071C7.10536 17.5196 7 17.2652 7 17C7 16.7348 7.10536 16.4804 7.29289 16.2929C7.48043 16.1054 7.73478 16 8 16H24C24.2652 16 24.5196 16.1054 24.7071 16.2929C24.8946 16.4804 25 16.7348 25 17ZM29 10H3C2.73478 10 2.48043 10.1054 2.29289 10.2929C2.10536 10.4804 2 10.7348 2 11C2 11.2652 2.10536 11.5196 2.29289 11.7071C2.48043 11.8946 2.73478 12 3 12H29C29.2652 12 29.5196 11.8946 29.7071 11.7071C29.8946 11.5196 30 11.2652 30 11C30 10.7348 29.8946 10.4804 29.7071 10.2929C29.5196 10.1054 29.2652 10 29 10ZM19 22H13C12.7348 22 12.4804 22.1054 12.2929 22.2929C12.1054 22.4804 12 22.7348 12 23C12 23.2652 12.1054 23.5196 12.2929 23.7071C12.4804 23.8946 12.7348 24 13 24H19C19.2652 24 19.5196 23.8946 19.7071 23.7071C19.8946 23.5196 20 23.2652 20 23C20 22.7348 19.8946 22.4804 19.7071 22.2929C19.5196 22.1054 19.2652 22 19 22Z"
              fill="#353535"
            />
          </svg>
        </div>
      </div>

      <?php get_template_part('template-parts/blog/mobile-filters'); ?>
     
    </div>
  </section>

  <section class="blog page-section">
    <div class="container">
      <div class="blog__content">
        <!-- @@include('blog/blog-sidebar.html') -->
        
        
        <?php get_template_part('template-parts/blog/desktop-filters'); ?>
        <?php get_template_part('template-parts/blog/blog-list'); ?>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>