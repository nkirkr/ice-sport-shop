<?php
/**
 * Custom pagination template for WooCommerce.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw(
	str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) )
);
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}

$links = paginate_links( array(
	'base'      => $base,
	'format'    => $format,
	'add_args'  => false,
	'current'   => max( 1, $current ),
	'total'     => $total,
	'prev_text' => '<span class="pagination__prev">←</span>',
	'next_text' => '<span class="pagination__next">→</span>',
	'type'      => 'array', // важно: получаем массив для кастомной верстки
	'end_size'  => 1,
	'mid_size'  => 2,
) );

if ( ! empty( $links ) ) : ?>
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Пагинация', 'woocommerce' ); ?>">
		<ul class="pagination__list">
			<?php foreach ( $links as $link ) :
				// заменим стандартные классы page-numbers → на твои
				$link = str_replace( 'page-numbers', 'pagination__link', $link );

				// оборачиваем в <li>
				echo '<li class="pagination__item">' . $link . '</li>';
			endforeach; ?>
		</ul>
	</nav>
<?php endif; ?>
