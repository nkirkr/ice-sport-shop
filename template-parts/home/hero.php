<section class="hero page-section">
  <div class="container hero__container">
    <div class="hero__wrapper">
      <div class="hero__content">
        <div class="hero__image">
          <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta( 'hero_image' ) ) ); ?>" alt="" />

        </div>
        <div class="hero__text-block">
          <h1 class="hero__title"><?php echo esc_html( carbon_get_the_post_meta('hero_title') ); ?></h1>
          <p class="hero__description">
            <?php echo esc_html( carbon_get_the_post_meta('hero_subtitle') ); ?>
          </p>
        </div>
        <div class="hero__action">
          <span class="hero__action-label"><?php echo esc_html( carbon_get_the_post_meta('hero_call') ); ?></span>
          <button
            class="btn-double btn-double--white hero__cta-btn"
            aria-label="Перезвоните мне"
          >
            <span class="btn-double__text"><?php echo esc_html( carbon_get_the_post_meta('hero_button') ); ?></span>
            <span class="btn-double__icon">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/hero/arrow-up-right.svg' ); ?>" alt="" />
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
