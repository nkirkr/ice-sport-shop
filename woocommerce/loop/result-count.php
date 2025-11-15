<?php
/**
 * Simplified WooCommerce Result Count
 * Example: "256 товаров"
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 🧩 Функция склонения слов
if ( ! function_exists( 'declOfNum' ) ) {
	function declOfNum( $number, $titles ) {
		$cases = [2, 0, 1, 1, 1, 2];
		return $titles[ ($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)] ];
	}
}
?>

<p class="woocommerce-result-count" role="alert" aria-relevant="all">
	<?php
	printf(
		'%1$d %2$s',
		$total,
		declOfNum( $total, [ 'товар', 'товара', 'товаров' ] )
	);
	?>
</p>
