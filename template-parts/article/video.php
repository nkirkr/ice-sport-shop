<?php
$video = wp_get_attachment_url( carbon_get_the_post_meta('article_video') );
$poster = wp_get_attachment_url( carbon_get_the_post_meta('article_video_thumb') );
$descr = carbon_get_the_post_meta('article_video_descr');

if (!empty($video)) : ?>

<section class="video container page-section">
    <p class="section-title">Видео</p>
    <div class="video__wrapper">
        <video
        class="video__source"
        src="<?php echo esc_url($video); ?>" 
        poster="<?php echo esc_url($poster); ?>" 
        muted="" 
        loop="" 
        playsinline="" 
        preload="metadata">
        </video>
        <button class="video__play" aria-label="Запустить/остановить видео">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40 7.5C33.5721 7.5 27.2886 9.40609 21.944 12.9772C16.5994 16.5484 12.4338 21.6242 9.97393 27.5628C7.51408 33.5014 6.87047 40.0361 8.12449 46.3404C9.37851 52.6448 12.4738 58.4358 17.019 62.981C21.5643 67.5262 27.3552 70.6215 33.6596 71.8755C39.964 73.1295 46.4986 72.4859 52.4372 70.0261C58.3758 67.5662 63.4516 63.4006 67.0228 58.056C70.5939 52.7114 72.5 46.4279 72.5 40C72.4909 31.3833 69.0639 23.122 62.9709 17.0291C56.878 10.9361 48.6168 7.5091 40 7.5ZM52.6719 42.0563L36.4219 53.3063C36.0467 53.5657 35.6078 53.7175 35.1525 53.7453C34.6973 53.7731 34.2431 53.6759 33.8391 53.4641C33.4352 53.2523 33.0969 52.9341 32.8608 52.5438C32.6248 52.1535 32.5 51.7061 32.5 51.25V28.75C32.5 28.2939 32.6248 27.8465 32.8608 27.4562C33.0969 27.0659 33.4352 26.7477 33.8391 26.5359C34.2431 26.3241 34.6973 26.2269 35.1525 26.2547C35.6078 26.2825 36.0467 26.4343 36.4219 26.6937L52.6719 37.9437C53.0045 38.1737 53.2763 38.481 53.4641 38.8391C53.6519 39.1973 53.75 39.5956 53.75 40C53.75 40.4044 53.6519 40.8027 53.4641 41.1609C53.2763 41.519 53.0045 41.8263 52.6719 42.0563Z" fill="white" />
            </svg>
        </button>
    </div>
    <p class="video__caption paragraph"><?php esc_html($descr); ?></p>
</section>

<?php endif; ?>