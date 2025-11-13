<article class="service-card">
    <a href="<?php the_permalink(); ?>" class="service-card__link">
        <div class="service-card__image-wrapper">
        <img
            src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('service_preview') ) ); ?>"
            alt="<?php the_title(); ?>"
            class="service-card__image"
            loading="lazy"
        />
        </div>
        <div class="service-card__info">
        <h3 class="service-card__title"><?php the_title(); ?></h3>
        <p class="service-card__description">
            <?php echo get_the_excerpt(); ?>
        </p>
        </div>
    </a>
</article>