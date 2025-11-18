<section class="about container page-section">
  <div class="about__content user-text">
    <div class="about__column about__column--left">
    
      <?php echo wpautop( carbon_get_the_post_meta('home_seo_text_1') ); ?>

      <div class="about__image about__image--bottom">
      <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('home_seo_image_1') ) ); ?>" alt="" loading="lazy" />
      </div>
    </div>

    <div class="about__column about__column--right">
      <div class="about__image about__image--top">
        <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('home_seo_image_2') ) ); ?>" alt="" loading="lazy" />
      </div>

      <?php echo wpautop( carbon_get_the_post_meta('home_seo_text_2') ); ?>

    </div>
  </div>

  <?php
  $advantages = carbon_get_the_post_meta('home_seo_advantages');
  $count = 1;  
  if (!empty($advantages)) : ?>

  <div class="about__advantages">

    <?php foreach ($advantages as $advantage) : ?>

    <div class="about__advantage">
      <span class="about__advantage-number">0<?php echo $count; ?></span>
      <h3 class="about__advantage-title"><?php echo esc_html($advantage['advantages_title']); ?></h3>
      <p class="about__advantage-text">
        <?php echo esc_html($advantage['advantages_text']); ?>
      </p>
    </div>

  
    <?php 
    $count++;
    endforeach; ?>

  </div>

  <?php endif; ?>

</section>
