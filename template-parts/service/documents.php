<?php
$documents_list = carbon_get_the_post_meta('documents_list');

if (!empty($documents_list)) : ?>

<section class="service-promo page-section">
  <div class="container">
    <h2 class="service-promo__title">Документы</h2>
    <div class="service-promo__wrapper">
      <div class="service-promo__grid swiper" id="service-promo-swiper">
        <div class="swiper-wrapper">

        <?php foreach ($documents_list as $document) : ?>

        <div class="swiper-slide">
          <article class="promo-card">
            <a class="promo-card__link">
              <div class="promo-card__image-wrapper">
                <img
                  src="<?php echo esc_url( wp_get_attachment_url($document['documents_image']) ); ?>"
                  alt="Акция"
                  class="promo-card__image"
                  loading="lazy"
                />
              </div>
              <p class="promo-card__title"><?php echo esc_html($document['documents_caption']); ?></p>
            </a>
          </article>
        </div>

        <?php endforeach; ?>
      </div>
      <button
        class="service-promo__control service-promo__prev"
        aria-label="Предыдущий"
      >
        <img src="./img/icons/arrow.svg" alt="" width="13" height="13" />
      </button>
      <button
        class="service-promo__control service-promo__next"
        aria-label="Следующий"
      >
        <img src="./img/icons/arrow.svg" alt="" width="13" height="13" />
      </button>
    </div>
  </div>
</section>

<?php endif; ?>
