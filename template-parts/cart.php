<?php
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

<aside class="cart sidebar">
    <div class="sidebar__content">
        <div class="sidebar__header">
            <p class="sidebar__title">Ваш заказ</p>
            <button class="sidebar__close" aria-label="Закрыть корзину" id="cart-close">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/sidebar-close.svg' ); ?>" alt="">
            </button>
        </div>

        <?php woocommerce_mini_cart(); ?>

        <div class="cart__checkout" id="cart-summary">
            <div class="cart__checkout-info">
                <p>КОЛИЧЕСТВО: <span class="cart__checkout-value"><?php echo esc_html($items_count); ?></span></p>
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
            <?php if ($items_count === 0) echo 'disabled'; ?> 
            style="display: inline-block; text-align: center" 
            class="cart__checkout-btn accent-btn"
            data-modal-open="cart"
            >
            Оформить заказ</button>
        </div>
    </div>
</aside>