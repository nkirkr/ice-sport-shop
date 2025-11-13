<?php

/**
 * Enqueue scripts and styles.
 */
function icesport_scripts() {
    
    if ( is_front_page() ) {
        wp_enqueue_script('home-js', get_template_directory_uri() . '/build/js/index.bundle.js', array(), true);
    }

    if ( is_singular( 'services' ) ) {
        wp_enqueue_script('services-single-js', get_template_directory_uri() . '/build/js/services-single.bundle.js', array(), true);
    }

    
	wp_enqueue_style( 'icesport-style', get_template_directory_uri() . '/build/css/main.css', array() );
	
}
add_action( 'wp_enqueue_scripts', 'icesport_scripts' );