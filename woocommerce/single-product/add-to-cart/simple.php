<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.2.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}
$is_in_cart = false;
if ( WC()->cart ) {
	foreach ( WC()->cart->get_cart() as $cart_item ) {
		if ( (int) $cart_item['product_id'] === (int) $product->get_id() ) {
			$is_in_cart = true;
			break;
		}
	}
}
$btn_text = $is_in_cart ? 'В корзине' : 'В корзину';

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart product__controls" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => $product->get_min_purchase_quantity(),
				'max_value'   => $product->get_max_purchase_quantity(),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<button type="button" class="to-favorite centered <?php echo is_in_favorites( $product->get_id() ) ? 'to-favorite--checked' : ''; ?>" data-id="<?php echo $product->get_id(); ?>" aria-label="Добавить в избранное">
            <svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use 
					xlink:href="<?php echo esc_url( 
						get_template_directory_uri() . '/assets/img/sprite.svg#' . ( is_in_favorites( $product->get_id() ) ? 'to-favorite-checked' : 'to-favorite' ) 
					); ?>"
				></use>
            </svg>
        </button>

		<button 
		type="button" 
		name="add-to-cart" 
		value="<?php echo esc_attr( $product->get_id() ); ?>"
		data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
		data-quantity="<?php echo esc_attr( $product->get_min_purchase_quantity() ); ?>"
		class="btn-to-cart accent-btn single_add_to_cart_button button alt<?php 
		echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); 
		echo $is_in_cart ? ' btn-to-cart--added' : ''; 
		?>"><?php echo esc_html( $btn_text ); ?>
		</button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
