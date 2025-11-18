<?php

/**
 * Enqueue scripts and styles.
 */
function icesport_scripts() {
    
    if ( is_front_page() ) {
        wp_enqueue_script('home-js', get_template_directory_uri() . '/build/js/index.bundle.js', array(), null, true);
    }

    if ( is_post_type_archive( 'services' ) ) {
        wp_enqueue_script('services-js', get_template_directory_uri() . '/build/js/services.bundle.js', array(), null, true);
    }

    if ( is_singular( 'services' ) ) {
        wp_enqueue_script('services-single-js', get_template_directory_uri() . '/build/js/services-single.bundle.js', array(), null, true);
    }

    if ( is_post_type_archive( 'promo' ) ) {
        wp_enqueue_script('promo-js', get_template_directory_uri() . '/build/js/promo.bundle.js', array(), null, true);
    }

    if ( is_singular( 'promo' ) ) {
        wp_enqueue_script('promo-single-js', get_template_directory_uri() . '/build/js/dekor.bundle.js', array(), null, true);
    }

    if ( is_singular( 'blog' ) ) {
        wp_enqueue_script('article-js', get_template_directory_uri() . '/build/js/article.bundle.js', array(), null, true);
    }

    if ( is_post_type_archive( 'blog' ) ) {
        wp_enqueue_script('blog-js', get_template_directory_uri() . '/build/js/blog.bundle.js', array(), null, true);
    }
    
    if ( is_product() ) {
        wp_enqueue_script('product-js', get_template_directory_uri() . '/build/js/product.bundle.js', array(), null, true);
        wp_enqueue_script( 'favorites-js', get_template_directory_uri() . '/js/favorites.js', array(), null, true );
        wp_enqueue_script( 'cart-js', get_template_directory_uri() . '/js/cart.js', array(), null, true );

        wp_localize_script( 'favorites-js', 'revealed_favorites_object', array(
            'url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'revealed_favorites_nonce' ),
            // 'sprite' => get_template_directory_uri() . '/assets/img/sprite.svg',
        ) );
    }

    if ( is_shop() || is_product_taxonomy() )  {
        wp_enqueue_script( 'catalog-js', get_template_directory_uri() . '/build/js/catalog.bundle.js', array(), null, true );
        wp_enqueue_script( 'filtration-js', get_template_directory_uri() . '/js/filtration.js', array(), null, true );
        wp_enqueue_script( 'favorites-js', get_template_directory_uri() . '/js/favorites.js', array(), null, true );

        wp_localize_script( 'favorites-js', 'revealed_favorites_object', array(
            'url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'revealed_favorites_nonce' ),
            // 'sprite' => get_template_directory_uri() . '/assets/img/sprite.svg',
        ) );
        // global $wp_query;
        // wp_localize_script('catalog-js', 'ajaxData', [
        //     'ajaxurl'     => admin_url('admin-ajax.php'),
        //     'query_vars'  => $wp_query->query,
        // ]);
    }

    
	wp_enqueue_style( 'icesport-style', get_template_directory_uri() . '/build/css/main.css', array() );
    
	
}
add_action( 'wp_enqueue_scripts', 'icesport_scripts' );