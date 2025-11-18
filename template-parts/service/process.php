<section class="service-process page-section">
  <div class="container">
    <div class="service-process__content">
      <!-- Левая колонка -->
      <div class="service-process__left user-text">
          <?php echo wpautop( carbon_get_the_post_meta('process_text') ); ?>
      </div>

      <!-- Изображение справа -->
      <div class="service-process__image">
        <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('process_image') ) ); ?>" alt="" loading="lazy" />
      </div>
    </div>
  </div>
</section>
