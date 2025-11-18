<?php

add_action('wc_ajax_update_cart_item_quantity', 'ajax_update_cart_item_quantity');
add_action('wc_ajax_nopriv_update_cart_item_quantity', 'ajax_update_cart_item_quantity');

function ajax_update_cart_item_quantity() {
    $cart_item_key = sanitize_text_field($_POST['cart_item_key'] ?? '');
    $quantity = intval($_POST['quantity'] ?? 1);

    if (!$cart_item_key || $quantity < 1) {
        wp_send_json_error(['message' => 'Некорректные данные']);
    }

    $cart = WC()->cart;
    $cart_item = $cart->get_cart_item($cart_item_key);

    if (!$cart_item) {
        wp_send_json_error(['message' => 'Товар не найден']);
    }

    // Обновляем количество
    $cart->set_quantity($cart_item_key, $quantity, true);
    $cart->calculate_totals();

    // Отправляем новые фрагменты WooCommerce
    WC_AJAX::get_refreshed_fragments();
    wp_die();
}


add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    $cart = WC()->cart;

    $items_count = $cart->get_cart_contents_count();
    $cart_subtotal = $cart->get_subtotal();

    $discount_rules = carbon_get_theme_option('crb_discount_rules');
    $applied_discount = 0;

    if (!empty($discount_rules) && is_array($discount_rules)) {
        foreach ($discount_rules as $rule) {
            $min_order = floatval($rule['min_order_amount']);
            $discount_percent = floatval($rule['discount_percent']);
            if ($cart_subtotal >= $min_order && $discount_percent > $applied_discount) {
                $applied_discount = $discount_percent;
            }
        }
    }

    $discount_amount = $cart_subtotal * $applied_discount / 100;
    $total_after_discount = $cart_subtotal - $discount_amount;
    ?>

    <div class="cart__checkout" id="cart-summary">
        <div class="cart__checkout-info">
            <p>КОЛИЧЕСТВО: 
                <span class="cart__checkout-value"><?php echo esc_html($items_count); ?></span>
            </p>
            <p>СУММА:
                <span class="cart__checkout-value">
                    <?php if ($applied_discount > 0): ?>
                        <del class="old-price" style="opacity:.6;"><?php echo wc_price($cart_subtotal); ?></del>
                        <ins class="cart-total-final" style="margin-left:8rem; color:var(--accent-color,#E53935); text-decoration:none;">
                            <?php echo wc_price($total_after_discount); ?>
                        </ins>
                    <?php else: ?>
                        <span class="cart-total-final"><?php echo wc_price($cart_subtotal); ?></span>
                    <?php endif; ?>
                </span>
            </p>
        </div>
        <button 
            style="display:inline-block; text-align:center" 
            class="cart__checkout-btn accent-btn"
            <?php if ($items_count === 0) echo 'disabled'; ?>>
            Оформить заказ
        </button>
    </div>

    <?php
    $fragments['#cart-summary'] = ob_get_clean();
    return $fragments;
});
