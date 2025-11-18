<?php

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//карточка товара

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

//temp
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action('woocommerce_before_shop_loop_item_title', function () {
    global $product;
    $regular_price = (float) $product->get_regular_price();
    $sale_price    = (float) $product->get_sale_price();
    $discount = 0;
    if ( $sale_price && $regular_price && $sale_price < $regular_price ) {
        $discount = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
    }
    if ($discount !== 0) {
        echo '<div class="catalog__card-discount">' . $discount . '%</div>';
    }
}, 10);

add_action('woocommerce_before_shop_loop_item_title', function() {
    global $product;
    echo '<img src="' . wp_get_attachment_image_url($product->get_image_id(), 'full') . '" alt="' . esc_attr(get_the_title()) . '" class="catalog__card-img" loading="lazy">';
}, 10);

add_action('woocommerce_shop_loop_item_title', function() {
    global $product;
    echo '<a href="' . esc_url( $product->get_permalink() ) . '" class="catalog__card-title">' . esc_html( get_the_title() ) . '</a>';
}, 10);


// Страница товара

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 11);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 12);

add_action('woocommerce_single_product_summary', function() {
    global $product;
    echo '<p class="product__sku paragraph">Код товара ' . $product->get_sku() . '</p>';
}, 6);

add_action('woocommerce_single_product_summary', function() {
    global $product;
    $description = $product->get_description();
    if ( empty( $description ) ) {
        return;
    }
    echo '<div class="product__description">' . wpautop( $description ) . '</div>';
}, 7);

add_action('woocommerce_single_product_summary', function() {
    echo '<div class="product__divider"></div>';
}, 8);

add_action('woocommerce_single_product_summary', function() {

    $variations = carbon_get_the_post_meta('related_products');

    if (empty($variations)) {
        return;
    }

    echo '<div class="product__variants">
            <h3 class="product__variants-title">Вариация товара</h3>
            <div class="product__variant-colors">';

    foreach ($variations as $index => $variation) {
        $prod_id = $variation['id'];
        $thumb = get_the_post_thumbnail_url($prod_id, 'woocommerce_thumbnail');
        if (!$thumb) {
            $thumb = wc_placeholder_img_src();
        }

        $active_class = ($index === 0) ? ' product__color--active' : '';

        echo '<a href="' . esc_url(get_permalink($prod_id)) . '" 
                class="product__color' . $active_class . '" 
                style="background-image: url(' . esc_url($thumb) . ');" 
                aria-label="Цвет ' . ($index + 1) . '">
              </a>';
    }

    echo '</div></div>';

}, 9);


add_action('woocommerce_single_product_summary', function() {
  global $product;
  $sizes = wc_get_product_terms( $product->get_id(), 'pa_size' );

  echo '<div class="product__sizes">
  <h3 class="product__sizes-title">Выберите размер:</h3>
  <div class="product__size-list">';

  foreach ($sizes as $size) {
    echo '<button class="product__size-btn">'. $size->name .'</button>';
  }

  echo '</div>
  </div>';
}, 10);

add_action('woocommerce_single_product_summary', function() {
    echo '<div class="product__divider"></div>';
}, 11);


// add_action( 'woocommerce_single_product_summary', function() {
//     global $product;
//     $route = get_template_directory_uri();

//     echo '<div class="product__controls">
//     <button class="product__add-to-cart">Добавить в корзину</button>
//     <div class="quantity">
//       <button class="quantity__btn" aria-label="Уменьшить количество">
//         <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
//           <line x1="2.5" y1="9.375" x2="17.5" y2="9.375" stroke="currentColor" stroke-width="1.25"></line>
//         </svg>
//       </button>
//       <input type="number" min="1" value="3" class="quantity__input" readonly="">
//       <button class="quantity__btn" aria-label="Увеличить количество">
//         <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
//           <line x1="2.5" y1="10" x2="17.5" y2="10" stroke="currentColor" stroke-width="1.25"></line>
//           <line x1="10" y1="2.5" x2="10" y2="17.5" stroke="currentColor" stroke-width="1.25"></line>
//         </svg>
//       </button>
//     </div>
//     <div class="product__action-buttons">
//       <button 
//       class="product__action-btn product__favorite to-favorite" 
//       aria-label="Добавить в избранное"
//       data-id="' . esc_attr( $product->get_id() ) . '"
//       >
//         <img src="' . $route . '/build/img/icons/bestsellers/favourite.svg" alt="" width="19" height="19">
//       </button>
//     </div>
//   </div>';
// }, 12);





add_action('product_specs', function() {
    global $product;

    if (! $product) return;

    $attributes = $product->get_attributes();

    if (empty($attributes)) return;

    $rows = [];

    foreach ($attributes as $attribute) {

        if (! $attribute->get_visible()) continue;
        $name = wc_attribute_label($attribute->get_name());
        $terms = wc_get_product_terms($product->get_id(), $attribute->get_name(), ['fields' => 'all']);

        $value_labels = [];
        foreach ($terms as $term) {
            $label = carbon_get_term_meta($term->term_id, 'display_name') ?: $term->name;
            $value_labels[] = $label;
        }

        $value = implode(', ', $value_labels);

        $rows[] = [
            'name'  => $name,
            'value' => $value,
        ];
    }

    $half = ceil(count($rows) / 2);
    $col1 = array_slice($rows, 0, $half);
    $col2 = array_slice($rows, $half);

    echo '<section class="product-specs page-section">
        <h2 class="product-specs__title">Характеристики</h2>
        <div class="product-specs__wrapper">

            <div class="product-specs__column">
                <table class="product-specs__table">
                    <tbody>';

                        foreach ($col1 as $row) {
                            echo '<tr class="product-specs__row">
                                <td class="product-specs__cell product-specs__cell--label">' . esc_html($row['name']) . '</td>
                                <td class="product-specs__cell product-specs__cell--value">' . esc_html($row['value']) . '</td>
                            </tr>';
                        }

    echo '          </tbody>
                </table>
            </div>

            <div class="product-specs__column">
                <table class="product-specs__table">
                    <tbody>';

                        foreach ($col2 as $row) {
                            echo '<tr class="product-specs__row">
                                <td class="product-specs__cell product-specs__cell--label">' . esc_html($row['name']) . '</td>
                                <td class="product-specs__cell product-specs__cell--value">' . esc_html($row['value']) . '</td>
                            </tr>';
                        }

    echo '          </tbody>
                </table>
            </div>

        </div>
    </section>';
});




// Каталог
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

add_filter('loop_shop_per_page', function( $cols ) {
    return 6; 
}, 20);


add_filter( 'woocommerce_breadcrumb_defaults', function( $defaults ) {
    return array(
        'delimiter'   => '<div class="breadcrumbs__separator"></div>',
        'wrap_before' => '<nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => 'Главная', 
    );
});

add_filter( 'woocommerce_get_breadcrumb', function( $crumbs ) {
    if ( is_paged() && !empty( $crumbs ) ) {
        $last = end( $crumbs );

        if ( isset( $last[0] ) && preg_match( '/Страница\s+\d+/u', $last[0] ) ) {
            array_pop( $crumbs );
        }
    }
    return $crumbs;
});

add_filter('wc_get_price_decimals', function() {
    return 0;
});


add_filter( 'loop_shop_per_page', 'catalog_default_per_page', 20 );

function catalog_default_per_page( $cols ) {

    if ( defined('DOING_AJAX') && DOING_AJAX && isset($_POST['action']) && $_POST['action'] === 'ajaxfilter' ) {
        return $cols;
    }

    return 5;
}
