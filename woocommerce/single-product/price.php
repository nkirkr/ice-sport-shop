<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();
$price_html = $product->get_price_html(); 
$discount = 0;
if ( $sale_price && $regular_price && $sale_price < $regular_price ) {
	$discount = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
}
?>



<div class="product__price-section">

    <div class="product__price-wrapper">
        <?php if ( $sale_price && $sale_price != $regular_price ) : ?>

            <p class="product__price-current">
                <?php echo wc_price( $sale_price ); ?>
            </p>

            <p class="product__price-old">
                <?php echo wc_price( $regular_price ); ?>
            </p>

        <?php else : ?>

            <p class="product__price-current">
                <?php echo wc_price( $regular_price ); ?>
            </p>

        <?php endif; ?>
    </div>

    <?php if ( $sale_price && $sale_price != $regular_price ) : ?>
        <span class="product__discount-text">Скидка <?php echo $discount; ?>%</span>
    <?php endif; ?>

</div>


