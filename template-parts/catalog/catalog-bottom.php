<section class="catalog-bottom page-section">
  <div class="catalog-bottom__container container">
    <!-- Разделительная линия -->
    <hr class="catalog-bottom__divider" />

    <?php get_template_part('template-parts/catalog/catalog-links'); ?>

    <!-- Контент с текстом и фото -->
    <div class="catalog-bottom__content">
      <div class="catalog-bottom__images">
        <div class="catalog-bottom__image catalog-bottom__image--first">
          <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_theme_option('catalog_image_1') ) ); ?>" alt="" loading="lazy" />
        </div>
        <div class="catalog-bottom__image catalog-bottom__image--second">
          <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_theme_option('catalog_image_2') ) ); ?>" alt="" loading="lazy" />
        </div>
      </div>

      <div class="catalog-bottom__text user-text">
        <?php echo wpautop( carbon_get_theme_option('catalog_text') ); ?>
      </div>
    </div>
  </div>
</section>
