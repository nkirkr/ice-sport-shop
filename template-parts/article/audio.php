<?php
$audio = wp_get_attachment_url( carbon_get_the_post_meta('article_audio') );

if (!empty($audio)) : ?>

<section class="audio container page-section">
  <p class="audio__title section-title">Аудио файл</p>
  <div class="audio__wrapper">
    <audio id="player" src="<?php echo esc_url($audio); ?>"></audio>
    <button class="audio__play" aria-label="Запустить/остановить аудио">
      <svg
        class="audio__play-icon"
        width="10"
        height="14"
        viewBox="0 0 10 14"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path d="M1 1L9 7L1 13V1Z" fill="#F8F8F8" />
      </svg>
      <span class="audio__pause-bars">
        <span class="audio__pause-bar"></span>
        <span class="audio__pause-bar"></span>
      </span>
    </button>
    <div class="audio__progress-wrapper">
      <div class="audio__progress-bar">
        <div class="audio__progress-fill"></div>
      </div>
    </div>
    <div class="audio__time">
      <span class="audio__time-current">00:00</span>
      <span class="audio__time-separator"> | </span>
      <span class="audio__time-duration">01:12</span>
    </div>
  </div>
</section>


<?php endif; ?>