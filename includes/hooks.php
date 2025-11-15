<?php

add_action( 'pre_get_posts', function( $query ) {
    if ( is_admin() || !$query->is_main_query() ) {
        return;
    }

    if ( is_post_type_archive('blog') || is_tax('tags') || is_tax('topic') ) {
        $query->set( 'posts_per_page', 2 );
    }

    if ( is_post_type_archive('services') ) {
        $query->set( 'posts_per_page', 9 );
    }
});
