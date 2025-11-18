<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$gallery = $product->get_gallery_image_ids();
$regular_price = (float) $product->get_regular_price();
$sale_price    = (float) $product->get_sale_price();
$discount = 0;
if ( $sale_price && $regular_price && $sale_price < $regular_price ) {
	$discount = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
}

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );


?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product', $product ); ?>>
	<div class="product__top">
		<div class="product-gallery">
			<div class="product-gallery__main">
				<?php 
					$first_image_id  = $gallery[0];
					$first_image_url = wp_get_attachment_image_url($first_image_id, 'full');
				?>
				<img
				src="<?php echo esc_url($first_image_url); ?>"
				alt="Наименование"
				class="product-gallery__main-image"
				/>

				<?php if ($discount !== 0) : ?>

				<div class="product-gallery__badge discount-badge">-<?php echo esc_html($discount); ?>%</div>

				<?php endif; ?>
			</div>
			<div class="product-gallery__thumbnails">

				<?php if (!empty($gallery)) : ?>
					<?php foreach ($gallery as $index => $image_id) : ?>
						<?php $thumb_url = wp_get_attachment_image_url($image_id, 'full'); ?>

						<button class="product-gallery__thumb <?php echo $index === 0 ? 'product-gallery__thumb--active' : ''; ?>">
							<img src="<?php echo esc_url($thumb_url); ?>" alt="" />
						</button>
					<?php endforeach; ?>
				<?php endif; ?>

			</div>
		</div>
		
		<div class="product__info">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>


	<?php do_action('product_specs'); ?>

	<?php get_template_part('template-parts/product/sizes'); ?>
	<?php get_template_part('template-parts/product/seo-block'); ?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>