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
        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.25 4.33L6.5 8.34L9.75 4.33" stroke="currentColor" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    <div class="acnav menu">

        <!-- ===================== LEFT COLUMN — MAIN CATEGORIES ===================== -->
        <div class="menu__content acnav__main-list">
            <section class="nav-wrap menu__nav-wrap">

                <?php
                $sections = get_terms([
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => true,
                    'parent'     => 0,
                ]);
                ?>

                <?php foreach ($sections as $section) : ?>
                    <div class="menu__item-wrapper" data-category="<?php echo esc_attr($section->slug); ?>">
                        <div class="menu__item">
                            <a href="<?php echo esc_url(get_term_link($section)); ?>" class="menu__item-link">
                                <span class="menu__link"><?php echo esc_html($section->name); ?></span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Static "Services" -->
                <div class="menu__item-wrapper" data-category="services">
                    <div class="menu__item">
                        <a href="<?php echo get_post_type_archive_link('services'); ?>" class="menu__item-link">
                            <span class="menu__link">Услуги</span>
                        </a>
                    </div>
                </div>

            </section>
        </div>

        <!-- ===================== RIGHT MEGA-MENU PER CATEGORY ===================== -->
        <?php foreach ($sections as $section) : ?>

            <?php
            $subsections = get_terms([
                'taxonomy'   => 'product_cat',
                'parent'     => $section->term_id,
                'hide_empty' => false,
            ]);
            ?>

            <div class="menu__categories" role="navigation" data-category="<?php echo esc_attr($section->slug); ?>">

                <div class="menu__categories-content">

                    <!-- LEFT COLUMN — subsections -->
                    <div class="menu__categories-column menu__categories-column--subsections">
                        <?php if (!empty($subsections)) : ?>

                            <?php foreach ($subsections as $i => $sub) : ?>
                                <a href="<?php echo esc_url(get_term_link($sub)); ?>"
                                   class="menu__categories-title <?php echo $i === 0 ? 'is-active' : ''; ?>"
                                   data-subsection="<?php echo esc_attr($i); ?>">
                                    <?php echo esc_html($sub->name); ?>
                                </a>
                            <?php endforeach; ?>

                        <?php else : ?>
                            <p class="menu__categories-title">Нет подразделов</p>
                        <?php endif; ?>
                    </div>

                    <!-- RIGHT COLUMN — child categories -->
                    <div class="menu__categories-column menu__categories-column--categories">

                        <?php foreach ($subsections as $i => $sub) : ?>

                            <?php
                            $children = get_terms([
                                'taxonomy'   => 'product_cat',
                                'parent'     => $sub->term_id,
                                'hide_empty' => false,
                            ]);
                            ?>

                            <div class="menu__categories-wrapper"
                                 data-subsection="<?php echo esc_attr($i); ?>"
                                 style="<?php echo $i === 0 ? '' : 'display:none;'; ?>">

                                <ul class="menu__list">
                                    <?php foreach ($children as $child) : ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_term_link($child)); ?>"
                                               class="menu__category-link">
                                                <?php echo esc_html($child->name); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

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
          <div class="header__search">
            <?php aws_get_search_form( true ); ?>
          </div>
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
            src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/header/search.svg' ); ?>"
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

  <!-- Notification -->
  <?php get_template_part('template-parts/notification'); ?>
  
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
      <a class="mob-menu__link" href="<?php echo get_post_type_archive_link( 'services' ); ?>">Услуги</a>
    </li>
    <li class="mob-menu__item">
      <a class="mob-menu__link" href="<?php echo get_post_type_archive_link( 'promo' ); ?>">Акции</a>
    </li>
    <li class="mob-menu__item">
      <a class="mob-menu__link" href="<?php echo get_post_type_archive_link( 'blog' ); ?>">Блог</a>
    </li>
  </ul>
</aside>
 <div class="overlay"></div>

<?php get_template_part('template-parts/cart'); ?>
<?php get_template_part('template-parts/favorites'); ?>

</header>
