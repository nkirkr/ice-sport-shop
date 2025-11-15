<section class="contact page-section" id="contact-section">
  <div class="contact__wrapper">
    <div class="contact__content">
      <h2 class="contact__title"><?php echo esc_html( carbon_get_theme_option('contact_title') ); ?></h2>
      <p class="contact__subtitle">
        <?php echo esc_html( carbon_get_theme_option('contact_title') ); ?>
      </p>
      <button class="contact__button" data-modal-open="callback">
        Перезвоните мне
      </button>
    </div>
    <div class="contact__image">
      <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_theme_option('contact_image') ) ); ?>" alt="">
    </div>
  </div>
</section>

<!-- Модалка обратной связи -->
<div class="modal" id="callback-modal" data-modal="callback">
  <div class="modal__overlay" data-modal-close></div>
  <div class="modal__container">
    <button class="modal__close" data-modal-close aria-label="Закрыть">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path
          d="M18 6L6 18M6 6L18 18"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
        />
      </svg>
    </button>
    <div class="modal__content">
      <h3 class="modal__title">Перезвоните мне</h3>
      <p class="modal__description">
        Оставьте свои данные и мы свяжемся с вами в ближайшее время
      </p>
      <form class="modal__form" id="callback-form">
        <label class="modal__form-label">
          <span class="modal__form-label-text">Ваше имя</span>
          <input
            class="modal__form-input"
            type="text"
            name="name"
            placeholder="Введите имя"
            required
          />
        </label>
        <label class="modal__form-label">
          <span class="modal__form-label-text">Номер телефона</span>
          <input
            class="modal__form-input"
            type="tel"
            name="phone"
            placeholder="+7 (___) ___-__-__"
            required
          />
        </label>
        <button class="modal__form-submit" type="submit">Отправить</button>
      </form>
    </div>
  </div>
</div>
