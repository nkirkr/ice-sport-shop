<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IceSport
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
  <div class="container header__container">
    <div class="header__content">
      <!-- Logo -->
      <a href="/" class="header__logo" aria-label="Главная страница">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/logo.svg' ); ?>"
          alt="Логотип"
          width="56"
          height="50"
        />
      </a>

      <!-- Navigation -->
      <nav class="header__nav">
        <ul class="header__nav-list">
          <li class="header__nav-item">
            <button
              class="header__nav-link header__nav-link--catalog acnav__main-label"
              aria-label="Открыть каталог"
            >
              Каталог
              <svg
                width="13"
                height="13"
                viewBox="0 0 13 13"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
                <path
                  d="M3.25 4.33L6.5 8.34L9.75 4.33"
                  stroke="currentColor"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
            <div class="acnav menu">
    <div class="menu__content acnav__main-list">
    <section class="nav-wrap menu__nav-wrap">
        <div class="menu__item-wrapper" data-category="figure-skating">
            <div class="menu__item">
                <span class="menu__item-link">
                    <span class="menu__link">Фигурное катание</span>
                </span>
            </div>
        </div>
        <div class="menu__item-wrapper" data-category="hockey">
            <div class="menu__item">
                <span class="menu__item-link">
                    <span class="menu__link">Хоккей</span>
                </span>
            </div>
        </div>
        <div class="menu__item-wrapper" data-category="services">
            <div class="menu__item">
                <span class="menu__item-link">
                    <span class="menu__link">Услуги</span>
                </span>
            </div>
        </div>
    </section>
    </div>
    <!-- Подменю для Фигурное катание -->
    <div class="menu__categories" role="navigation" data-category="figure-skating">
        <div class="menu__categories-content">
            <div class="menu__categories-column menu__categories-column--subsections">
                <p class="menu__categories-title is-active">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
            </div>
            <div class="menu__categories-column menu__categories-column--categories">
                <div class="menu__categories-wrapper">
                    <ul class="menu__list">
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                    </ul>
                    <ul class="menu__list">
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Подменю для Хоккей -->
    <div class="menu__categories" role="navigation" data-category="hockey">
        <div class="menu__categories-content">
            <div class="menu__categories-column menu__categories-column--subsections">
                <p class="menu__categories-title is-active">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
            </div>
            <div class="menu__categories-column menu__categories-column--categories">
                <div class="menu__categories-wrapper">
                    <ul class="menu__list">
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                    </ul>
                    <ul class="menu__list">
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Подменю для Услуги -->
    <div class="menu__categories" role="navigation" data-category="services">
        <div class="menu__categories-content">
            <div class="menu__categories-column menu__categories-column--subsections">
                <p class="menu__categories-title is-active">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
                <p class="menu__categories-title">Подраздел</p>
            </div>
            <div class="menu__categories-column menu__categories-column--categories">
                <div class="menu__categories-wrapper">
                    <ul class="menu__list">
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                    </ul>
                    <ul class="menu__list">
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                        <li>
                            <a href="../catalog.html" class="menu__category-link">Подкатегория</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

          </li>
          <li class="header__nav-item">
            <a class="header__nav-link" href="<?php echo get_post_type_archive_link( 'services' ); ?>">Услуги</a>
          </li>
          <li class="header__nav-item">
            <a class="header__nav-link" href="<?php echo get_post_type_archive_link( 'promo' ); ?>">Акции</a>
          </li>
          <li class="header__nav-item">
            <a class="header__nav-link" href="<?php echo get_post_type_archive_link( 'blog' ); ?>">Блог</a>
          </li>
          <li class="header__nav-item">
            <a class="header__nav-link" href="<?php echo get_the_permalink(114); ?>">Контакты</a>
          </li>
        </ul>
      </nav>

      <!-- Actions -->
      <div class="header__actions">
        <!-- Search -->
        <div class="header__search-wrapper">
          <button
            class="header__action-btn header__action-btn--search"
            aria-label="Поиск"
            type="button"
            id="search-btn"
          >

            <img
              src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/search.svg' ); ?>"
              alt=""
              width="20"
              height="20"
              class="default-icon"
            />
          </button>
          <form class="header__search">
            <input type="text" placeholder="Поиск" name="search" />
          </form>
        </div>

        <button
          class="header__action-btn header__action-btn--favorites"
          aria-label="Избранное"
          type="button"
          id="favorites-btn"
        >
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/favourite.svg' ); ?>"
            alt=""
            width="18"
            height="18"
            class="default-icon"
          />
        </button>
        <button
          class="header__action-btn header__action-btn--cart"
          aria-label="Корзина"
          type="button"
          id="cart-btn"
        >
          <img 
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/cart.svg' ); ?>" 
          alt="" 
          width="18" 
          height="18" 
          class="default-icon"
          />
        </button>
      </div>

      <!-- Mobile Actions -->
      <div class="header__mobile-actions">
        <button
          class="header__mobile-btn header__mobile-btn--search"
          aria-label="Поиск"
          type="button"
        >
          <img
            src="/img/icons/header/search.svg"
            alt=""
            width="20"
            height="20"
          />
        </button>
        <button
          class="header__mobile-btn header__mobile-btn--phone"
          aria-label="Позвонить"
          type="button"
        >
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/phone.svg' ); ?>"
            alt=""
            width="18"
            height="18"
          />
        </button>
        <button class="header__burger" aria-label="Меню" type="button">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Bottom Bar -->
  <div class="container">
    <div class="header__mobile-bottom">
      <button class="header__mobile-link" id="mobile-cart-btn">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/cart-mob.svg' ); ?>"
          alt=""
          width="18"
          height="18"
        />
        <span class="header__mobile-text"
          >Корзина | <span class="header__count">0</span></span
        >
      </button>
      <button class="header__mobile-link" id="mobile-favorites-btn">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/favourite.svg' ); ?>"
          alt=""
          width="18"
          height="18"
        />
        <span class="header__mobile-text"
          >Избранное | <span class="header__count">0</span></span
        >
      </button>
      <button class="header__mobile-link" id="mobile-scales-btn">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/scales.svg' ); ?>" alt="" width="18" height="18" />
        <span class="header__mobile-text"
          >Сравнить | <span class="header__count">0</span></span
        >
      </button>
    </div>
  </div>

  <aside class="mob-menu">
  <!-- Search and Links Section (вверху) -->
  <div class="mob-menu__header">
    <form class="mob-menu__search-form">
      <div class="mob-menu__search-input">
        <input 
          type="text" 
          placeholder="Поиск" 
          name="search"
          class="mob-menu__search-field"
        />
      </div>
      <button type="submit" class="mob-menu__search-submit">Найти</button>
    </form>
    
    <div class="mob-menu__links">
      <button class="mob-menu__footer-link" id="mob-menu-cart-btn">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/cart-mob.svg' ); ?>"
          alt=""
          width="18"
          height="18"
        />
        <span class="mob-menu__link-text"
          >Корзина | <span class="header__count">0</span></span
        >
      </button>
      <button class="mob-menu__footer-link" id="mob-menu-favorites-btn">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/favourite.svg' ); ?>"
          alt=""
          width="18"
          height="18"
        />
        <span class="mob-menu__link-text"
          >Избранное | <span class="header__count">0</span></span
        >
      </button>
    </div>
  </div>

  <!-- Navigation (ниже, по центру) -->
  <ul class="mob-menu__nav">
    <li class="mob-menu__item">
      <div class="acnav">
        <button class="mob-menu__link acnav__main-label" type="button">
          Каталог
          <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.25 4.33L6.5 8.34L9.75 4.33" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <div class="acnav__main-list">
          <ul class="acnav__list acnav__list--level1">
            <li class="has-children">
              <div class="acnav__label">Категория</div>
              <ul class="acnav__list">
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
              </ul>
            </li>
          </ul>
          <ul class="acnav__list acnav__list--level1">
            <li class="has-children">
              <div class="acnav__label">Категория</div>
              <ul class="acnav__list">
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
              </ul>
            </li>
          </ul>
          <ul class="acnav__list acnav__list--level1">
            <li class="has-children">
              <div class="acnav__label">Категория</div>
              <ul class="acnav__list">
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
                <li><a href="/catalog.html" class="mob-menu__sublink">Подкатегория</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </li>
    <li class="mob-menu__item">
      <a class="mob-menu__link" href="/services.html">Услуги</a>
    </li>
    <li class="mob-menu__item">
      <a class="mob-menu__link" href="/promo.html">Акции</a>
    </li>
    <li class="mob-menu__item">
      <a class="mob-menu__link" href="/blog.html">Блог</a>
    </li>
  </ul>
</aside>
 <div class="overlay"></div>
  <aside class="cart sidebar">
    <div class="sidebar__content">
        <div class="sidebar__header">
            <p class="sidebar__title">Ваш заказ</p>
            <button class="sidebar__close" aria-label="Закрыть корзину" id="cart-close">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/sidebar-close.svg' ); ?>" alt="">
            </button>
        </div>
        <div class="sidebar__list-wrapper" id="cart-list">
            <ul class="sidebar__list">
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price cart__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <div class="sidebar__item-quantity quantity">
                            <button class="quantity__btn centered quantity__dec">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                            <input type="number" min="1" value="1" class="quantity__input" readonly>
                            <button class="quantity__btn centered quantity__inc">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H10.625V16.875C10.625 17.0408 10.5592 17.1997 10.4419 17.3169C10.3247 17.4342 10.1658 17.5 10 17.5C9.83424 17.5 9.67527 17.4342 9.55806 17.3169C9.44085 17.1997 9.375 17.0408 9.375 16.875V10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H9.375V3.125C9.375 2.95924 9.44085 2.80027 9.55806 2.68306C9.67527 2.56585 9.83424 2.5 10 2.5C10.1658 2.5 10.3247 2.56585 10.4419 2.68306C10.5592 2.80027 10.625 2.95924 10.625 3.125V9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                        </div>
                            <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price cart__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <div class="sidebar__item-quantity quantity">
                            <button class="quantity__btn centered quantity__dec">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                            <input type="number" min="1" value="1" class="quantity__input" readonly>
                            <button class="quantity__btn centered quantity__inc">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H10.625V16.875C10.625 17.0408 10.5592 17.1997 10.4419 17.3169C10.3247 17.4342 10.1658 17.5 10 17.5C9.83424 17.5 9.67527 17.4342 9.55806 17.3169C9.44085 17.1997 9.375 17.0408 9.375 16.875V10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H9.375V3.125C9.375 2.95924 9.44085 2.80027 9.55806 2.68306C9.67527 2.56585 9.83424 2.5 10 2.5C10.1658 2.5 10.3247 2.56585 10.4419 2.68306C10.5592 2.80027 10.625 2.95924 10.625 3.125V9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                        </div>
                            <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price cart__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <div class="sidebar__item-quantity quantity">
                            <button class="quantity__btn centered quantity__dec">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                            <input type="number" min="1" value="1" class="quantity__input" readonly>
                            <button class="quantity__btn centered quantity__inc">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H10.625V16.875C10.625 17.0408 10.5592 17.1997 10.4419 17.3169C10.3247 17.4342 10.1658 17.5 10 17.5C9.83424 17.5 9.67527 17.4342 9.55806 17.3169C9.44085 17.1997 9.375 17.0408 9.375 16.875V10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H9.375V3.125C9.375 2.95924 9.44085 2.80027 9.55806 2.68306C9.67527 2.56585 9.83424 2.5 10 2.5C10.1658 2.5 10.3247 2.56585 10.4419 2.68306C10.5592 2.80027 10.625 2.95924 10.625 3.125V9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                        </div>
                            <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price cart__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <div class="sidebar__item-quantity quantity">
                            <button class="quantity__btn centered quantity__dec">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                            <input type="number" min="1" value="1" class="quantity__input" readonly>
                            <button class="quantity__btn centered quantity__inc">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H10.625V16.875C10.625 17.0408 10.5592 17.1997 10.4419 17.3169C10.3247 17.4342 10.1658 17.5 10 17.5C9.83424 17.5 9.67527 17.4342 9.55806 17.3169C9.44085 17.1997 9.375 17.0408 9.375 16.875V10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H9.375V3.125C9.375 2.95924 9.44085 2.80027 9.55806 2.68306C9.67527 2.56585 9.83424 2.5 10 2.5C10.1658 2.5 10.3247 2.56585 10.4419 2.68306C10.5592 2.80027 10.625 2.95924 10.625 3.125V9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
                                </svg>
                            </button>
                        </div>
                            <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="cart__checkout">
            <div class="cart__checkout-info">
                <p>КОЛИЧЕСТВО: <span class="cart__checkout-value">5</span></p>
                <p>СУММА: <span class="cart__checkout-value">40 000 ₽</span></p>
            </div>
            <button class="cart__checkout-btn accent-btn">Оформить заказ</button>
        </div>
    </div>
</aside> <aside class="favorites sidebar">
    <div class="sidebar__content">
        <div class="sidebar__header">
            <p class="sidebar__title">Ваше избранное</p>
            <button class="sidebar__close" aria-label="Закрыть корзину" id="favorites-close">
                <img src="/img/icons/sidebar-close.svg" alt="">
            </button>
        </div>
        <div class="sidebar__list-wrapper" id="favorites-list">
            <ul class="sidebar__list">
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                            <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                            </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                        <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                        </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
                <li class="sidebar__item">
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="/img/sidebar-product.jpg" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title">Наименование</p>
                            <p class="sidebar__item-sku">Код товара 555666-321</p>
                            <span class="sidebar__item-price">7 800 ₽</span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <button class="to-favorite centered">
                        <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.9062 3.125C12.293 3.125 10.8805 3.81875 10 4.99141C9.11953 3.81875 7.70703 3.125 6.09375 3.125C4.80955 3.12645 3.57837 3.63723 2.6703 4.5453C1.76223 5.45337 1.25145 6.68455 1.25 7.96875C1.25 13.4375 9.35859 17.8641 9.70391 18.0469C9.79492 18.0958 9.89665 18.1215 10 18.1215C10.1033 18.1215 10.2051 18.0958 10.2961 18.0469C10.6414 17.8641 18.75 13.4375 18.75 7.96875C18.7486 6.68455 18.2378 5.45337 17.3297 4.5453C16.4216 3.63723 15.1904 3.12645 13.9062 3.125ZM10 16.7813C8.57344 15.95 2.5 12.1633 2.5 7.96875C2.50124 7.01601 2.88026 6.10265 3.55396 5.42896C4.22765 4.75526 5.14101 4.37624 6.09375 4.375C7.61328 4.375 8.88906 5.18438 9.42188 6.48438C9.46896 6.59901 9.54907 6.69705 9.65201 6.76605C9.75494 6.83505 9.87607 6.8719 10 6.8719C10.1239 6.8719 10.2451 6.83505 10.348 6.76605C10.4509 6.69705 10.531 6.59901 10.5781 6.48438C11.1109 5.18203 12.3867 4.375 13.9062 4.375C14.859 4.37624 15.7724 4.75526 16.446 5.42896C17.1197 6.10265 17.4988 7.01601 17.5 7.96875C17.5 12.157 11.425 15.9492 10 16.7813Z" fill="#3936FF" />
                        </svg>
                        </button>
                        <button class="sidebar__item-delete" aria-label="Удалить">
                            <img src="/img/icons/sidebar-delete.svg" alt="">
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
</header>
