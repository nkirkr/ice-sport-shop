<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.0.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="widget_shopping_cart_content">
	<?php if ( WC()->cart && ! WC()->cart->is_empty() ) : ?>
	
	<div class="sidebar__list-wrapper" id="cart-list">
		<ul class="sidebar__list woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
	
		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );
	
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
	
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail_url = get_the_post_thumbnail_url( $product_id, 'woocommerce_thumbnail' );
					$sku = apply_filters( 'woocommerce_cart_item_name', $_product->get_sku(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="sidebar__item woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">

					
						<div class="sidebar__item-info">
							<a href="<?php echo esc_url($product_permalink); ?>" class="sidebar__item-image">
								<img class="sidebar__item-img" src="<?php echo esc_url($thumbnail_url); ?>" alt="">
							</a>
							<div class="sidebar__item-text">
								<a href="<?php echo esc_url($product_permalink); ?>" class="sidebar__item-title"><?php echo esc_html($product_name); ?></a>
								<p class="sidebar__item-sku">Код товара <?php echo esc_html($sku); ?></p>
								<span class="sidebar__item-price cart__item-price"><?php echo $product_price; ?> </span>
							</div>
						</div>
						<div class="sidebar__item-controls">
							<div class="sidebar__item-quantity quantity" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">
								<button class="quantity__btn centered quantity__dec">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
									</svg>
								</button>
								<input type="number" min="1" value="<?php echo $cart_item['quantity']; ?>" class="quantity__input" readonly>
								<button class="quantity__btn centered quantity__inc">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H10.625V16.875C10.625 17.0408 10.5592 17.1997 10.4419 17.3169C10.3247 17.4342 10.1658 17.5 10 17.5C9.83424 17.5 9.67527 17.4342 9.55806 17.3169C9.44085 17.1997 9.375 17.0408 9.375 16.875V10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H9.375V3.125C9.375 2.95924 9.44085 2.80027 9.55806 2.68306C9.67527 2.56585 9.83424 2.5 10 2.5C10.1658 2.5 10.3247 2.56585 10.4419 2.68306C10.5592 2.80027 10.625 2.95924 10.625 3.125V9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10Z" fill="#343330" />
									</svg>
								</button>
							</div>
								<button class="to-favorite centered <?php echo is_in_favorites( $product_id ) ? 'to-favorite--checked' : ''; ?>" data-id="<?php echo esc_attr( $product_id ); ?>" aria-label="Добавить в избранное">
								<svg class="to-favorite__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<use 
										xlink:href="<?php echo esc_url( 
											get_template_directory_uri() . '/assets/img/sprite.svg#' . ( is_in_favorites( $product_id ) ? 'to-favorite-checked' : 'to-favorite' ) 
										); ?>"
									></use>
								</svg>
							</button>
							<?php
							echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<a 
									role="button" 
									href="%s" 
									class="remove remove_from_cart_button sidebar__item-delete" 
									aria-label="Удалить товар из корзины" 
									data-product_id="%s" 
									data-cart_item_key="%s" 
									data-product_sku="%s" 
									data-success_message="%s">
									<img src="' . esc_url( get_template_directory_uri() ) . '/build/img/icons/sidebar-delete.svg" alt="">
									</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									/* translators: %s is the product name */
									esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() ),
									/* translators: %s is the product name */
									esc_attr( sprintf( __( '&ldquo;%s&rdquo; has been removed from your cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) )
								),
								$cart_item_key
							);
							?>
						</div>
					</li>
	
					<?php
				}
	
			}
	
		?>
		</ul>
	</div>
	
	<?php else : ?>
	
	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
	
	<?php endif; ?>
	
	<?php do_action( 'woocommerce_after_mini_cart' ); ?>
</div>