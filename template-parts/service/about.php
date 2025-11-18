<section class="service-about page-section">
  <div class="container">
    <div class="service-about__content">
      <!-- Левая колонка -->
      <div class="service-about__left user-text">
        <?php echo wpautop( carbon_get_the_post_meta('service_seo_text_1') ); ?>
      </div>

      <!-- Изображение сверху справа -->
      <div class="service-about__image service-about__image--top">
        <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('service_seo_image_1') ) ); ?>" alt="" loading="lazy" />
      </div>

      <!-- Изображение снизу слева -->
      <div class="service-about__image service-about__image--bottom">
        <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('service_seo_image_2') ) ); ?>" alt="" loading="lazy" />
      </div>

      <!-- Правая колонка -->
      <div class="service-about__right user-text">
        <?php echo wpautop( carbon_get_the_post_meta('service_seo_text_2') ); ?>
      </div>
    </div>
  </div>
</section>
