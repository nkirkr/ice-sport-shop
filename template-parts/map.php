<section class="map-section page-section">
  <div class="map-section__wrapper">
    <div class="map-section__map">
      <!-- Яндекс Карта -->
      <div class="map-section__map-container" id="yandex-map-container">
        <script
          type="text/javascript"
          charset="utf-8"
          async
          src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A403abb81011a0cd3fe05b3340e5a14cc05eb9214560165d9de930f146f06a100&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"
        ></script>
      </div>
    </div>
    <div class="map-section__contacts">
      <div class="container">
        <div class="map-section__contacts-wrapper">
          <?php if ( !empty($GLOBALS['contacts']['phone']) ) : ?>
          <div class="map-section__contact-item">
            <h3 class="map-section__contact-title">Адрес</h3>
            <p class="map-section__contact-text">
              <?php echo esc_html($GLOBALS['contacts']['address']); ?>
            </p>
          </div>
          <?php endif; ?>
          <?php if ( !empty($GLOBALS['contacts']['phone']) ) : ?>
          <div class="map-section__contact-item">
            <h3 class="map-section__contact-title">Телефон</h3>
            <p class="map-section__contact-text"><?php echo esc_html($GLOBALS['contacts']['phone']); ?></p>
          </div>
          <?php endif; ?>
          <?php if ( !empty($GLOBALS['contacts']['phone']) ) : ?>
          <div class="map-section__contact-item">
            <h3 class="map-section__contact-title">Telegram</h3>
            <p class="map-section__contact-text"><?php echo esc_html($GLOBALS['contacts']['telegram']); ?></p>
          </div>
          <?php endif; ?>
          <?php if ( !empty($GLOBALS['contacts']['phone']) ) : ?>
          <div class="map-section__contact-item">
            <h3 class="map-section__contact-title">Whatsapp</h3>
            <p class="map-section__contact-text"><?php echo esc_html($GLOBALS['contacts']['whatsapp']); ?></p>
          </div>
          <?php endif; ?>
          <?php if ( !empty($GLOBALS['contacts']['phone']) ) : ?>
          <div class="map-section__contact-item">
            <h3 class="map-section__contact-title">Instagram</h3>
            <p class="map-section__contact-text"><?php echo esc_html($GLOBALS['contacts']['instagram']); ?></p>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
