<section class="reviews page-section">
  <div class="swiper reviews__swiper">
    <div class="swiper-wrapper">

      <?php
      $reviews = new WP_Query([
        'post_type'      => 'reviews',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC'
      ]);

      if ( $reviews->have_posts() ) :
        while ( $reviews->have_posts() ) :
          $reviews->the_post();

          $review_author  = carbon_get_the_post_meta('review_author');
          $review_date  = carbon_get_the_post_meta('review_date'); 
          $review_image = carbon_get_the_post_meta('review_image'); 
      ?>

        <div class="swiper-slide">
          <article class="review-card">
            <p class="review-card__text"><?php echo get_the_content(); ?></p>

            <div class="review-card__author">
              <div class="review-card__avatar">
                <?php if ($review_image) : ?>
                  <?php echo wp_get_attachment_image( $review_image, 'thumbnail', false, ['alt' => esc_attr($review_author)] ); ?>
                <?php endif; ?>
              </div>

              <div class="review-card__info">
                <p class="review-card__name"><?php echo esc_html($review_author); ?></p>
                <p class="review-card__date"><?php echo esc_html($review_date); ?> </p>
              </div>
            </div>
          </article>
        </div>

      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

    </div>
  </div>
</section>
