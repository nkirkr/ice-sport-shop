<?php
$text = carbon_get_the_post_meta( 'seo_text' );
$image1 = carbon_get_the_post_meta('seo_photo_1');
$image2 = carbon_get_the_post_meta('seo_photo_2');

if (!empty($text) && !empty($image1) && !empty($image2)) : ?>
<section class="product-description page-section">
  <div class="product-description__content">
    <div class="product-description__text user-text">
        <?php echo wpautop( $text ); ?>
    </div>

    <div class="product-description__images">
      <div class="product-description__image product-description__image--first">
        <img src="<?php echo esc_url( wp_get_attachment_url( $image1 ) ); ?>" alt="" loading="lazy" />
      </div>
      <div class="product-description__image product-description__image--second">
        <img src="<?php echo esc_url( wp_get_attachment_url( $image2 ) ); ?>" alt="" loading="lazy" />
      </div>
    </div>
  </div>
</section>

<?php endif; ?>
