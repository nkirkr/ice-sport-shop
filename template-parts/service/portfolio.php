<?php 

$portfolio_list = carbon_get_the_post_meta('portfolio_list');

if ( !empty( $portfolio_list ) ) : ?>

<section class="service-portfolio page-section">
  <div class="container">
    <h2 class="section-title"><?php echo esc_html( carbon_get_the_post_meta('portfolio_title') ); ?></h2>
    <div class="service-portfolio__grid">
      
      <?php foreach ( $portfolio_list as $portfolio_item) :
        $image_before = wp_get_attachment_url($portfolio_item['portfolio_before']);
        $image_after = wp_get_attachment_url($portfolio_item['portfolio_after']);
      ?>

      

        <div class="service-portfolio__item">
          <div class="before-after-container">
              <div
              class="before-after-image before"
              style="background-image: url('<?php echo esc_url( $image_before ); ?>')"
              >
              <span class="before-after-badge">До</span>
              </div>
              <div
              class="before-after-image after"
              style="background-image: url('<?php echo esc_url( $image_after ); ?>')"
              >
              <span class="before-after-badge">После</span>
              </div>
              <input
              type="range"
              class="before-after-slider"
              min="0"
              max="100"
              value="50"
              />
              <div class="before-after-button">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path
                  d="M11 9L4 16L11 23"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  />
                  <path
                  d="M21 9L28 16L21 23"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  />
              </svg>
              </div>
          </div>
          <p class="service-portfolio__title">Услуга</p>
        </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php endif; ?>
