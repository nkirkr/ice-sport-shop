<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( $product->is_type('variable') ) {
    $attributes = $product->get_variation_attributes(); 
    $available_variations = $product->get_available_variations(); 

    echo '<div class="product__options">';

    foreach ( $attributes as $attribute_name => $options ) {
        $list_class = ($attribute_name === 'pa_size') ? 'product__options-list--rd' : 'product__options-list--sq';

        echo '<div>';
        echo '<span>' . wc_attribute_label($attribute_name) . '</span>';
        echo '<ul class="product__options-list ' . $list_class . '">';

        foreach ( $options as $option ) {
            echo '<li class="centered" data-attribute="' . esc_attr($attribute_name) . '" data-value="' . esc_attr($option) . '">' . esc_html($option) . '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

    echo '</div>';
}
