<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$aria_describedby = isset( $args['aria-describedby_text'] ) ? sprintf( 'aria-describedby="woocommerce_loop_add_to_cart_link_describedby_%s"', esc_attr( $product->get_id() ) ) : '';

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'catalog__card', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
	
	<div class="catalog__card-image-wrapper">
		<a href="<?php echo $product->get_permalink(); ?>">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		</a>
		<button class="catalog__card-favorite <?php echo is_in_favorites( $product->get_id() ) ? 'catalog__card-favorite--checked' : ''; ?>" data-id="<?php echo $product->get_id(); ?>" aria-label="Добавить в избранное">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M14.5969 2.99561C12.5857 1.76192 10.8303 2.25909 9.77576 3.05101C9.34339 3.37572 9.1272 3.53807 9 3.53807C8.8728 3.53807 8.65661 3.37572 8.22424 3.05101C7.16971 2.25909 5.41431 1.76192 3.40308 2.99561C0.763551 4.6147 0.166291 9.95614 6.25465 14.4625C7.41429 15.3208 7.99411 15.75 9 15.75C10.0059 15.75 10.5857 15.3208 11.7454 14.4625C17.8337 9.95614 17.2364 4.6147 14.5969 2.99561Z" stroke="#F8F8F8" stroke-width="1.125" stroke-linecap="round" />
		</svg>    
        </button>
	</div>

	<div class="catalog__card-top">
		<p class="catalog__card-sku paragraph">Код товара <?php echo $product->get_sku(); ?></p>
	</div>
	<?php
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );
	?>

	<p class="catalog__card-excerpt paragraph">
		<?php
			$desc = $product->get_description();

			$desc = preg_replace('/<h2.*?<\/h2>/is', '', $desc);

			$desc = str_replace(
				['</p>', '<br>', '<br/>', '<br />'],
				"\n",
				$desc
			);

			$desc = strip_tags($desc);

			$desc = preg_replace('/\s+/', ' ', $desc);
			$desc = trim($desc);

			echo nl2br($desc);
		?>
	</p>
	<div class="catalog__card-properties">
	<span>Свойства:</span>
	<?php
	$attributes = $product->get_attributes();

	if ( ! empty( $attributes ) ) {
		echo '<ul class="catalog__card-properties-list">';

		foreach ( $attributes as $attribute ) {
			if ( $attribute->is_taxonomy() ) {
				$taxonomy = $attribute->get_name();
				$tax_obj = get_taxonomy( $taxonomy );
				$attr_label = $tax_obj->labels->singular_name ?? wc_attribute_label( $taxonomy );

				$terms = wc_get_product_terms( $product->get_id(), $taxonomy, [ 'fields' => 'all' ] );

				$values = [];
				foreach ( $terms as $term ) {
					$custom_label = carbon_get_term_meta( $term->term_id, 'display_name' );
					$values[] = $custom_label ?: $term->name;
				}
			} else {
				$attr_label = wc_attribute_label( $attribute->get_name() );
				$values = $attribute->get_options();
			}

			if ( ! empty( $values ) ) {
				echo '<li>' . esc_html( $attr_label ) . ': ' . esc_html( implode( ', ', $values ) ) . '</li>';
			}
		}

			echo '</ul>';
		} else {
			echo '<p class="paragraph">—</p>';
		}
		?>
	</div>




	<?php
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	?>

	<div class="catalog__card-bottom">
        <div class="quantity">
            <button class="quantity__btn centered quantity__dec" aria-label="Уменьшить количество">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/build/img/sprite.svg#quantity-decrement' ); ?>"></use>
                </svg>
            </button>
            <input type="number" min="1" value="1" class="quantity__input" readonly aria-label="Количество товара">
            <button class="quantity__btn centered quantity__inc" aria-label="Увеличить количество">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/build/img/sprite.svg#quantity-increment' ); ?>"></use>
                </svg>
            </button>
        </div>

        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
    </div>
</li>
