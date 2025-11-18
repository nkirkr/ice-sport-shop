<?php
$current_cat = get_queried_object();
?>

<div class="catalog__items">
  <?php woocommerce_breadcrumb(); ?>
  <h1 class="catalog__title section-title"><?php single_term_title(); ?></h1>
  
  <!-- Первая строка: количество товаров и "На странице" -->
  <div class="catalog__top-row">
    <p class="catalog__count">1122 Товара</p>
    <div class="catalog__page-size">
      <p>На странице:</p>
      <div class="custom-dropdown" data-name="pageSize2">
        <div class="dropdown-selected"><span>50</span></div>
        <div class="dropdown-options">
          <div class="dropdown-option" data-value="20">20</div>
          <div class="dropdown-option" data-value="50">50</div>
          <div class="dropdown-option" data-value="100">100</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Вторая строка: Фильтры и иконки -->
  <div class="catalog__filters-row">
    <span class="catalog__filters-label">Фильтры</span>
    <div class="catalog__view-controls">
      <button
        class="catalog__filters-toggle"
        id="mobile-filters-btn"
        aria-label="Открыть фильтры"
      >
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M6 4H8V10H6V8H3V6H6V4ZM10 8V6H21V8H10ZM14 14H16V20H14V18H3V16H14V14ZM18 18V16H21V18H18Z"
            fill="currentColor"
          />
        </svg>
      </button>
      <button class="catalog__view-btn catalog__view-btn--list" aria-label="Список">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/catalog/stripes.svg' ); ?>" alt="" width="20" height="20" />
      </button>
    </div>
  </div>
  
  <!-- Десктопный header (скрыт на мобилке) -->
  <div class="catalog__header">
    <button
      class="catalog__filters-toggle"
      id="mobile-filters-btn-desktop"
      aria-label="Открыть фильтры"
    >
      <svg
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M6 4H8V10H6V8H3V6H6V4ZM10 8V6H21V8H10ZM14 14H16V20H14V18H3V16H14V14ZM18 18V16H21V18H18Z"
          fill="currentColor"
        />
      </svg>
    </button>
    <p class="catalog__count">
        <?php
        global $wp_query;

        $found_posts   = intval( $wp_query->found_posts );
        $per_page      = intval( $wp_query->get( 'posts_per_page' ) );
        $shown_to      = min( $per_page, $found_posts );

        if ( $found_posts > 0 ) {
            printf( 'Товаров 1–%d из %d', $shown_to, $found_posts );
        } else {
            echo '';
        }
        ?>
    </p>
    <div class="catalog__sorting">
      <div class="catalog__sorting-list">
        <div class="catalog__sorting-item">
          <p>На странице:</p>
          <div class="custom-dropdown" data-name="pageSize3">
            <div class="dropdown-selected"><span>5</span></div>
            <div class="dropdown-options">
              <div class="dropdown-option" data-value="5">5</div>
              <div class="dropdown-option" data-value="10">10</div>
              <div class="dropdown-option" data-value="20">20</div>
            </div>
          </div>
        </div>
        <div class="catalog__sorting-item">
            <p>Сортировка:</p>
            <div class="custom-dropdown" data-name="orderby">
                <div class="dropdown-selected"><span data-value="price-asc">Дешевые</span></div>
                <div class="dropdown-options">
                    <div class="dropdown-option" data-value="date">Новинки</div>
                    <div class="dropdown-option" data-value="price-asc">Дешевые</div>
                    <div class="dropdown-option" data-value="price-desc">Дорогие</div>
                </div>
                </div>
            </div>
      </div>
    </div>
  </div>
  <!-- Мобильные фильтры (как в блоге) -->
  <?php get_template_part('template-parts/catalog/mobile-filters'); ?>
  
  <!-- Десктопные фильтры -->
  <?php get_template_part('template-parts/catalog/desktop-filters'); ?>

  <?php if ( woocommerce_product_loop() ) : ?>
      <?php woocommerce_product_loop_start(); ?>

      <?php while ( have_posts() ) : the_post(); ?>
          <?php wc_get_template_part( 'content', 'product' ); ?>
      <?php endwhile; ?>

      <?php woocommerce_product_loop_end(); ?>
      <?php do_action( 'woocommerce_after_shop_loop' ); ?>
  <?php else : ?>
      <?php do_action( 'woocommerce_no_products_found' ); ?>
  <?php endif; ?>
  <!-- <div class="catalog__show-more-wrapper">
  <button class="catalog__show-more btn-show-more">Показать ещё</button>
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
        <a class="pagination__link pagination__link--active" href="#">1</a>
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
        <button class="pagination__arrow" aria-label="Следующая страница">
          Далее
        </button>
      </li>
    </ul>
  </nav> -->
</div>
