<?php

add_action('wp_ajax_revealed_favorites_action', 'handle_favorites');
add_action('wp_ajax_nopriv_revealed_favorites_action', 'handle_favorites');

function handle_favorites() {
    
    check_ajax_referer('revealed_favorites_nonce', 'nonce');

    $product_id = intval($_POST['product_id'] ?? 0);
    
    if (!$product_id) {
        wp_send_json_error(['message' => 'Product ID missing']);
    }

    $product = wc_get_product($product_id);

    $favorites_list = get_favorites_list();
    $is_favorite = false;


    if ( false !== ( $key = array_search( $product_id, $favorites_list ) ) ) {
        unset( $favorites_list[$key] );
        $is_favorite = false;
    } else {
        $favorites_list[] = $product_id;
        $is_favorite = true;
    }

    $favorites_str = array_values(array_filter($favorites_list));
    $favorites_list = implode( ',', $favorites_str );
    setcookie( 'revealed_favorites_list', $favorites_list, time() + 3600 * 24 * 30, '/');
    

    //удалить потом
    wp_send_json_success([
        'product_id' => $product_id,
        'product_name' => $product ? $product->get_name() : null,
        'product_image' => $product ? wp_get_attachment_image_url($product->get_image_id(), 'thumbnail') : null,
        'product_sku' => $product ? $product->get_sku() : null,
        'is_favorite' => $is_favorite,
        'favorites_list' => $favorites_list, 
        'product_price' => $product ? $product->get_price_html() : null,
    ]);

}


function get_favorites_list() {
    $favorites_list = $_COOKIE['revealed_favorites_list'] ?? [];

    if ( $favorites_list ) {
        $favorites_list = explode( ',', $favorites_list );
    }

    return $favorites_list;
}


function is_in_favorites( $product_id ) {
    $favorites_list = get_favorites_list();

    return false !== array_search( $product_id, $favorites_list );
}


add_action('wp_ajax_remove_favorites_action', 'remove_from_favorites');
add_action('wp_ajax_nopriv_remove_favorites_action', 'remove_from_favorites');

function remove_from_favorites() {
    check_ajax_referer('revealed_favorites_nonce', 'nonce');

    $product_id = intval($_POST['product_id'] ?? 0);
    if (!$product_id) {
        wp_send_json_error(['message' => 'Product ID missing']);
    }

    $product = wc_get_product($product_id);

    $favorites_list = get_favorites_list();

    if (false !== ($key = array_search($product_id, $favorites_list))) {
        unset($favorites_list[$key]);
    }

    $favorites_list = array_values(array_filter($favorites_list));
    $favorites_list_str = implode(',', $favorites_list);
    setcookie('revealed_favorites_list', $favorites_list_str, time() + 3600 * 24 * 30, '/');

    wp_send_json_success([
        'product_id' => $product_id,
        'product_name' => $product ? $product->get_name() : null,
        'product_image' => $product ? wp_get_attachment_image_url($product->get_image_id(), 'thumbnail') : null,
        'product_sku' => $product ? $product->get_sku() : null,
        'is_favorite' => false,
        'favorites_list' => $favorites_list_str,
    ]);
}


add_action('wp_ajax_remove_from_cart', 'revealed_remove_from_cart');
add_action('wp_ajax_nopriv_remove_from_cart', 'revealed_remove_from_cart');

function revealed_remove_from_cart() {
    if ( ! WC()->cart ) {
        wp_send_json_error(['message' => 'Cart not initialized']);
    }

    if ( ! empty($_POST['cart_item_key']) ) {
        $key = wc_clean(wp_unslash($_POST['cart_item_key']));
        WC()->cart->remove_cart_item($key);
        WC_AJAX::get_refreshed_fragments();
        wp_die();
    }

    if ( empty($_POST['product_id']) ) {
        wp_send_json_error(['message' => 'No cart_item_key or product_id']);
    }

    $pid = (int) $_POST['product_id'];
    $removed = false;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $item ) {
        $prod = (int) $item['product_id'];
        $var  = (int) ($item['variation_id'] ?? 0);
        if ( $prod === $pid || $var === $pid ) {
            WC()->cart->remove_cart_item($cart_item_key);
            $removed = true;
        }
    }

    if ( ! $removed ) {
        wp_send_json_error(['message' => 'Product not found in cart']);
    }

    WC_AJAX::get_refreshed_fragments();
    wp_die();
}
