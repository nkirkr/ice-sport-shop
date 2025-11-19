<?php
$current_cat = get_queried_object();

?>

<div class="catalog-filters-new" id="catalog-filters-mobile">
  <div class="catalog-filters-new__header">
    <h3>Фильтры</h3>
    <button
      class="catalog-filters-new__close"
      id="close-filters-btn"
      aria-label="Закрыть фильтры"
    >
      <svg
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M18 6L6 18M6 6L18 18"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
        />
      </svg>
    </button>
  </div>
  <div class="catalog-filters-new__icon">
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
  </div>
  <?php
  $current_cat = get_queried_object();
  $top_level = get_top_level_category( $current_cat );

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
  
  <form method="POST" id="ajaxform" class="catalog-filters-new__dropdowns">
    <input type="hidden" name="action" value="ajaxfilter" />
    <input type="hidden" name="current_cat" value="<?php echo $current_cat->term_id; ?>">
    <input type="hidden" name="orderby" id="orderby" value="price-asc">
    <input type="hidden" name="per_page" id="per_page" value="5">
    <input type="hidden" name="page" id="page" value="1">

    <?php if ( $current_cat->term_id == $top_level->term_id && !empty($subsections) ) : ?>

    <div class="filter-dropdown">
      <button type="button" class="filter-dropdown__button">
        <span>Категория</span>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" />
      </button>


      <div class="filter-dropdown__menu">
          <?php foreach ($subsections as $cat) : ?>
              <label class="filter-dropdown__item">
                  <input type="checkbox" name="product_cats[]" value="<?php echo $cat->term_id; ?>">
                  <span><?php echo esc_html($cat->name); ?></span>
              </label>
          <?php endforeach; ?>
      </div>

    </div>

    <?php endif; ?>

    <?php 
    if ( !empty($children) && $current_cat->parent == $top_level->term_id || $current_cat->term_id == $top_level->term_id ) : ?>
    <div class="filter-dropdown">
      <button type="button" class="filter-dropdown__button">
        <span>Подкатегория</span>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" />
      </button>

      <div class="filter-dropdown__menu">
          <?php foreach ($children as $child) : ?>
              <label class="filter-dropdown__item">
                  <input type="checkbox" name="subcats[]" value="<?php echo $child->term_id; ?>">
                  <span><?php echo esc_html($child->name); ?></span>
              </label>
          <?php endforeach; ?>
      </div>

    </div>

    <?php endif; ?>

    <div class="filter-dropdown">
      <button type="button" class="filter-dropdown__button">
        <span>Цена</span>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" />
      </button>
      <div class="filter-dropdown__menu filter-dropdown__menu--price">
        <div class="filter-price-range">
          <input type="number" name="min_price" placeholder="От" min="0" />
          <input type="number" name="max_price" placeholder="До" min="0" />
        </div>
      </div>
    </div>

    <?php
    $sizes = get_terms([
      'taxonomy'   => 'pa_size',
      'hide_empty' => false,
    ]);
    ?>
    <div class="filter-dropdown">
      <button type="button" class="filter-dropdown__button">
        <span>Размер</span>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" />
      </button>
      <div class="filter-dropdown__menu">
        <?php foreach ($sizes as $size) : ?>

        <label class="filter-dropdown__item">
          <input type="checkbox" name="razmer[]"  value="<?php echo esc_attr( $size->slug ); ?>"/>
          <span><?php echo esc_html($size->name); ?></span>
        </label>

       <?php endforeach; ?>
      </div>
    </div>

    <?php
    $colors = get_terms([
      'taxonomy'   => 'pa_color',
      'hide_empty' => false,
    ]);
    ?>
    <div class="filter-dropdown">
      <button type="button" class="filter-dropdown__button">
        <span>Цвет</span>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" />
      </button>
      <div class="filter-dropdown__menu">

        <?php foreach ($colors as $color) : ?>

        <label class="filter-dropdown__item">
          <input type="checkbox" name="color[]" value="<?php echo esc_attr($color->slug); ?>"/>
          <span><?php echo esc_html($color->name); ?></span>
        </label>

        <?php endforeach; ?>
        
      </div>
    </div>

    <!-- <div class="filter-dropdown">
      <button type="button" class="filter-dropdown__button">
        <span>Другое</span>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" />
      </button>
      <div class="filter-dropdown__menu">
        <label class="filter-dropdown__item">
          <input type="checkbox" name="other" />
          <span>Значение 1</span>
        </label>
        <label class="filter-dropdown__item">
          <input type="checkbox" name="other" />
          <span>Значение 2</span>
        </label>
      </div>
    </div> -->
  </form>

  <div class="catalog-filters-new__actions">
    <button class="catalog-filters-new__reset">Сбросить фильтры</button>
    <button class="catalog-filters-new__apply">Применить</button>
  </div>
</div>
