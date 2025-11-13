<?php
$text = carbon_get_the_post_meta('service_hero_text'); 
?>

<section class="service-hero page-section">
  <div class="container">
    <div class="service-hero__top">
      <div class="service-hero__content">
        <h1 class="service-hero__title"><?php the_title(); ?></h1>
        <p class="service-hero__subtitle">
          <?php echo esc_html( carbon_get_the_post_meta( 'service_subtitle' ) ); ?>
        </p>
      </div>
      <div class="service-hero__benefits service-hero__benefits--mobile">
        <?php echo wpautop( $text ); ?>
      </div>
      <div class="service-hero__cta">
        <p class="service-hero__price"><?php echo esc_html( carbon_get_the_post_meta( 'service_price' ) ); ?></p>
        <button
          class="service-hero__button btn-simple"
          data-modal-open="callback"
        >
          Записаться
        </button>
      </div>
    </div>

    <div class="service-hero__image">
      <img
        src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('service_preview') ) ); ?>"
        alt="Заточка коньков в Москве"
        loading="eager"
      />
    </div>

    <div class="service-hero__benefits service-hero__benefits--desktop">
      <?php echo wpautop( $text ); ?>
    </div>
  </div>
</section>
