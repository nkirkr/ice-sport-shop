<?php
$text = carbon_get_the_post_meta('conversion_text');
$image = wp_get_attachment_url( carbon_get_the_post_meta( 'conversion_image' ) );

if (!empty($text) && !empty($image)) : ?>

<section class="conversion container page-section">
  <div class="conversion__content">
      <div class="conversion__picture">
        <img class="conversion__image" src="<?php echo esc_url( $image ); ?>" alt="" />
      </div>
    <div class="conversion__text">
      <?php echo wpautop( $text ) ; ?>
      <button
        class="conversion__button"
        data-modal-open="callback"
        aria-label="Перезвоните мне"
      >
        Перезвоните мне
      </button>
    </div>
  </div>
</section>

<?php endif ?>

