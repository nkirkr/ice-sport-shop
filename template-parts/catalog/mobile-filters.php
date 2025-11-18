<?php
$current_cat = get_queried_object();


$top_level = get_top_level_category( $current_cat );
$is_level_1 = ($current_cat->term_id == $top_level->term_id);
$is_level_2 = ($current_cat->parent == $top_level->term_id);
$is_level_3 = (!$is_level_1 && !$is_level_2);

$subsections = get_terms([
    'taxonomy' => 'product_cat',
    'parent'   => $top_level->term_id,
    'hide_empty' => true,
]);

$children = [];
foreach ($subsections as $sub) {
    $items = get_terms([
        'taxonomy' => 'product_cat',
        'parent'   => $sub->term_id,
        'hide_empty' => true,
    ]);
    $children = array_merge($children, $items);
}
?>

<div class="catalog__filters-wrapper">
    <form method="POST" id="ajaxform-mobile" class="catalog-filters">
      <input type="hidden" name="current_cat" value="<?php echo $current_cat->term_id; ?>">
      <input type="hidden" name="action" value="ajaxfilter">
      <div class="catalog-filters-wrapper acnav">
        <div class="acnav__main-list">
          <section class="catalog-filters nav-wrap">
            <!-- Сортировка -->
            <div class="catalog-filters__section">
              <p class="catalog-filters__title categories-title acnav__main-label">
                Сортировка
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" class="catalog-filters__arrow" />
              </p>
              <div class="catalog-filters__content">
                <div class="catalog-filters__select">
                  <span>Выбрать</span>
                </div>
              </div>
            </div>
            
            <!-- Категории -->
            <?php if ( $is_level_1 && !empty($subsections) ) : ?>
                <div class="catalog-filters__section">
                <p class="catalog-filters__title categories-title acnav__main-label">
                    Категории
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" class="catalog-filters__arrow" />
                </p>

                <div class="catalog-filters__categories acnav">
                    <div class="acnav__main-list">
                        <ul class="acnav__list acnav__list--level1">
                        <?php foreach ($subsections as $cat) : ?>
                            <li class="catalog-filters__categories-item">
                                <label class="acnav__label catalog-filters__attribute-item">
                                    <input type="checkbox" name="product_cats[]" value="<?php echo $cat->term_id; ?>">
                                    <span><?php echo esc_html($cat->name); ?></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            
            <!-- Подкатегория -->
            <?php if ( !$is_level_3 && !empty($children) ) : ?>
                <div class="catalog-filters__section">
                <p class="catalog-filters__title categories-title acnav__main-label">
                    Подкатегория
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" class="catalog-filters__arrow" />
                </p>

                <div class="catalog-filters__categories acnav">
                    <div class="acnav__main-list">
                        <ul class="acnav__list acnav__list--level1">
                        <?php foreach ($children as $child) : ?>
                            <li class="catalog-filters__categories-item">
                                <label class="acnav__label catalog-filters__attribute-item">
                                    <input type="checkbox" name="subcats[]" value="<?php echo $child->term_id; ?>">
                                    <span><?php echo esc_html($child->name); ?></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                </div>
            <?php endif; ?>

            
            <!-- Цена -->
            <div class="catalog-filters__section">
              <p class="catalog-filters__title categories-title acnav__main-label">
                Цена
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" class="catalog-filters__arrow" />
              </p>
              <div class="catalog-filters__categories acnav" role="navigation">
                <div class="acnav__main-list">
                  <div class="catalog-filters__range">
                    <input type="number" name="min_price" placeholder="От" />
                    <input type="number" name="max_price" placeholder="До" />
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Размер -->
            <?php 
            $sizes = get_terms([
                'taxonomy' => 'pa_size',
                'hide_empty' => false,
            ]);
            ?>

            <div class="catalog-filters__section">
            <p class="catalog-filters__title categories-title acnav__main-label">
                Размер
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" class="catalog-filters__arrow" />
            </p>

            <div class="catalog-filters__content">
                <div class="catalog-filters__attributes">
                <?php foreach ($sizes as $size): ?>
                <label class="catalog-filters__attribute-item">
                    <input type="checkbox" name="razmer[]" value="<?php echo $size->slug; ?>">
                    <span><?php echo $size->name; ?></span>
                </label>
                <?php endforeach; ?>
                </div>
            </div>
            </div>

            
            <!-- Цвет -->
            <?php 
            $colors = get_terms([
                'taxonomy' => 'pa_color',
                'hide_empty' => false,
            ]);
            ?>

            <div class="catalog-filters__section">
            <p class="catalog-filters__title categories-title acnav__main-label">
                Цвет
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" class="catalog-filters__arrow" />
            </p>

            <div class="catalog-filters__content">
                <div class="catalog-filters__attributes">
                <?php foreach ($colors as $color): ?>
                <label class="catalog-filters__attribute-item">
                    <input type="checkbox" name="color[]" value="<?php echo $color->slug; ?>">
                    <span><?php echo $color->name; ?></span>
                </label>
                <?php endforeach; ?>
                </div>
            </div>
            </div>

            
           
          </section>
        </div>
        <div class="catalog-filters__actions">
          <button class="catalog-filters__reset" type="button">Сбросить фильтры</button>
          <button class="catalog-filters__apply" type="button">Применить</button>
        </div>
      </div>
    </form>
  </div>