<?php
global $product;
if ( ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product( get_the_ID() );
}
$regular_price = (float) $product->get_regular_price();
$sale_price    = (float) $product->get_sale_price();
$discount = 0;
if ( $sale_price && $regular_price && $sale_price < $regular_price ) {
    $discount = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
}
?>

<article class="bestseller-card">
<a href="<?php the_permalink(); ?>" class="bestseller-card__link">
    <div class="bestseller-card__image-wrapper">
    <img
        src="<?php echo esc_url( wp_get_attachment_image_url($product->get_image_id(), 'full') ); ?>"
        alt="<?php the_title(); ?>"
        class="bestseller-card__image"
    />
    <button
        class="bestseller-card__favorite to-favorite"
        aria-label="Добавить в избранное"
        data-id="<?php echo esc_attr( $product->get_id() ); ?>"
    >
        <img
        src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/bestsellers/favourite.svg' ); ?>"
        alt=""
        width="18"
        height="18"
        />
    </button>

    <?php
    if ($discount !== 0) {
        echo '<div class="catalog__card-discount">' . $discount . '%</div>';
    }
    ?>

    </div>
    <div class="bestseller-card__info">
    <p class="bestseller-card__sku">Код товара: <?php echo $product->get_sku(); ?></p>
    <h3 class="bestseller-card__title"><?php the_title(); ?></h3>
    <p class="bestseller-card__description">
        <?php echo get_the_content(); ?>
    </p>
    </div>
</a>
</article>