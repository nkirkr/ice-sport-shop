<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

// Проверяем, есть ли товар в корзине
$is_in_cart = false;
if ( WC()->cart ) {
	foreach ( WC()->cart->get_cart() as $cart_item ) {
		if ( (int) $cart_item['product_id'] === (int) $product->get_id() ) {
			$is_in_cart = true;
			break;
		}
	}
}

$aria_describedby = isset( $args['aria-describedby_text'] )
	? sprintf( 'aria-describedby="woocommerce_loop_add_to_cart_link_describedby_%s"', esc_attr( $product->get_id() ) )
	: '';

$button_text  = $is_in_cart ? 'В корзине' : 'В корзину';
$button_class = ( isset( $args['class'] ) ? $args['class'] . ' ' : '' ) . 'btn-to-cart accent-btn' . ( $is_in_cart ? ' btn-to-cart--added' : '' );
$button_attrs = isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '';

// Если товар уже в корзине, добавим disabled
$disabled_attr = $is_in_cart ? ' disabled aria-disabled="true"' : '';

echo apply_filters(
	'woocommerce_loop_add_to_cart_link',
	sprintf(
		'<a href="%s" %s data-quantity="%s" class="%s" %s%s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		$aria_describedby,
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( $button_class ),
		$button_attrs,
		$disabled_attr,
		esc_html( $button_text )
	),
	$product,
	$args
);
?>
