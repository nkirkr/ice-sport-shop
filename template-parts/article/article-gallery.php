<?php
$gallery = carbon_get_the_post_meta('article_gallery');

if (!empty($gallery)) : ?>

<section class="article-gallery container page-section">
  <div class="article-gallery__header">
    <p class="article-gallery__title section-title">Галлерея изображений</p>
  </div>
  <div class="article-gallery__wrapper">
  <div class="swiper article-gallery__slider" id="article-gallery">
    <div class="swiper-wrapper">
      
        <?php foreach ($gallery as $gallery_item) : ?>

            <?php
                $image = wp_get_attachment_url($gallery_item['article_gallery_img']);
                $descr = $gallery_item['article_gallery_text'];
            ?>

            <div class="swiper-slide">
                <figure>
                    <a 
                        href="<?php echo esc_url($image); ?>" 
                        data-fancybox="article-gallery" 
                        data-caption="<?php echo esc_attr($descr); ?>"
                    >
                        <img 
                            class="article-gallery__image" 
                            src="<?php echo esc_url($image); ?>" 
                            alt="<?php echo esc_attr($descr); ?>" 
                            loading="lazy"
                        >
                    </a>
                    <?php if (!empty($descr)) : ?>
                        <figcaption class="article-gallery__caption">
                            <?php echo esc_html($descr); ?>
                        </figcaption>
                    <?php endif; ?>
                </figure>
            </div>

        <?php endforeach; ?>

    </div>
    <button
      class="article-gallery__control article-gallery__prev"
      aria-label="Предыдущий слайд"
    >
      <img src="/img/icons/arrow.svg" alt="" width="13" height="13" />
    </button>
    <button
      class="article-gallery__control article-gallery__next"
      aria-label="Следующий слайд"
    >
      <img src="/img/icons/arrow.svg" alt="" width="13" height="13" />
    </button>
  </div>
</section>

<?php endif; ?>