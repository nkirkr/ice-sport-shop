<?php
add_action('wp_ajax_ajaxfilter', 'custom_filter');
add_action('wp_ajax_nopriv_ajaxfilter', 'custom_filter');

function custom_filter() {
    sleep(1);

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $per_page = isset($_POST['per_page']) ? intval($_POST['per_page']) : 5;

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => $per_page, 
        'paged' => $page,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'exclude-from-catalog',
                'operator' => 'NOT IN'
            ),
        ),
    );

    $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : 'price-asc';

    switch ($orderby) {
        case 'price':
        case 'price-asc': 
            $args['meta_key'] = '_price';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'ASC';
            break;

        case 'price-desc':
        case 'price-descending':
            $args['meta_key'] = '_price';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'DESC';
            break;

        case 'title':
            $args['orderby'] = 'title';
            $args['order']   = 'ASC';
            break;

        case 'date':
            $args['orderby'] = 'date';
            $args['order']   = 'DESC';
            break;

        default:
            $args['orderby'] = 'menu_order';
            $args['order']   = 'ASC';
            break;
    }

    $current_cat = intval($_POST['current_cat'] ?? 0);

    if ($current_cat > 0) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => [$current_cat],
        ];
    }

    $product_cats = ! empty( $_POST[ 'product_cats' ] ) && $_POST[ 'product_cats' ] ? $_POST[ 'product_cats' ] : array();

    if( $product_cats ) {
		$args[ 'tax_query' ][] = array(
			'taxonomy' => 'product_cat',
            'field'    => 'term_id',
			'terms' => $product_cats
		);
	}

    $subcats = !empty($_POST['subcats']) ? $_POST['subcats'] : [];

    if ($subcats) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $subcats
        ];
    }

    $colors = !empty($_POST['color']) ? $_POST['color'] : [];

    if ($colors) {
        $args['tax_query'][] = [
            'taxonomy' => 'pa_color',
            'field'    => 'slug',
            'terms'    => $colors
        ];
    }

    $sizes = ! empty( $_POST[ 'razmer' ] ) && $_POST[ 'razmer' ] ? $_POST[ 'razmer' ] : array();

    if( $sizes ) {
		$args[ 'tax_query' ][] = array(
			'taxonomy' => 'pa_size',
            'field' => 'slug',
			'terms' => $sizes
		);
	}

    $min_price = ! empty( $_POST[ 'min_price' ] ) && $_POST[ 'min_price' ] ? $_POST[ 'min_price' ] : 0;
    $max_price = ! empty( $_POST[ 'max_price' ] ) && $_POST[ 'max_price' ] ? $_POST[ 'max_price' ] : 10000;

    $args['meta_query'] = [
        'relation' => 'AND',

        [
            'key'     => '_price',
            'value'   => [$min_price, $max_price],
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC',
        ],
    ];

    $query = new WP_Query( $args );

    $no_more = ($page >= $query->max_num_pages);

	ob_start();

	if( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            wc_get_template_part( 'content', 'product' );
        }

	} else {
		echo '<p>Ничего не найдено.</p>';
	}

	$html_products = ob_get_contents();
	ob_end_clean();

    $found_posts = intval($query->found_posts);
    $from = ($page - 1) * $per_page + 1;
    $to = min($page * $per_page, $found_posts);
    if ($found_posts === 0) {
        $from = 0;
        $to   = 0;
    }

    if ($found_posts > 0) {
        $count_text = "Товаров {$from}–{$to} из {$found_posts}";
    } else {
        $count_text = "";
    }

    wp_send_json([
        'products' => $html_products,
        'count'    => $count_text,
        'no_more' => $no_more
    ]);

    die();
}