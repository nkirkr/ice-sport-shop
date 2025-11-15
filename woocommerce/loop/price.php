<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();
$price_html = $product->get_price_html(); 
?>

<div class="price">
    <?php if ( $sale_price && $sale_price != $regular_price ) : ?>
        <p class="price__current"><?php echo wc_price( $sale_price ); ?>&nbsp;</p>
        <p class="price__before"><?php echo wc_price( $regular_price ); ?>&nbsp;</p>
    <?php else : ?>
        <p class="price__current"><?php echo wc_price( $regular_price ); ?>&nbsp;</p>
    <?php endif; ?>
</div>
