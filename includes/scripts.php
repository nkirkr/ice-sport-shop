<?php

/**
 * Enqueue scripts and styles.
 */
function icesport_scripts() {
    
    if ( is_front_page() ) {
        wp_enqueue_script('home-js', get_template_directory_uri() . '/build/js/index.bundle.js', array(), null, true);
    }

    if ( is_singular( 'services' ) ) {
        wp_enqueue_script('services-single-js', get_template_directory_uri() . '/build/js/services-single.bundle.js', array(), null, true);
    }

    if ( is_singular( 'blog' ) ) {
        wp_enqueue_script('article-js', get_template_directory_uri() . '/build/js/article.bundle.js', array(), null, true);
    }
    
    if ( is_product() ) {
        wp_enqueue_script('product-js', get_template_directory_uri() . '/build/js/product.bundle.js', array(), null, true);
    }

    if ( is_shop() || is_product_taxonomy() )  {
        // wp_enqueue_style( 'range-css', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.css' );
        // wp_enqueue_script( 'range-js', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js', array(), THEME_VERSION, true );
        wp_enqueue_script( 'catalog-js', get_template_directory_uri() . '/build/js/catalog.bundle.js', array(), null, true );
        // wp_enqueue_script( 'catalog-functions-js', get_template_directory_uri() . '/assets/js/catalog-functions.js', array(), THEME_VERSION, true );
        // wp_enqueue_script( 'ranges-js', get_template_directory_uri() . '/assets/js/ranges.js', array(), THEME_VERSION, true );

        // global $wp_query;
        // wp_localize_script('catalog-js', 'ajaxData', [
        //     'ajaxurl'     => admin_url('admin-ajax.php'),
        //     'query_vars'  => $wp_query->query,
        // ]);
    }

    
	wp_enqueue_style( 'icesport-style', get_template_directory_uri() . '/build/css/main.css', array() );
	
}
add_action( 'wp_enqueue_scripts', 'icesport_scripts' );