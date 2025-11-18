<section class="promo-policy-section page-section container">
    <div class="promo-policy-section__wrapper">
        <section class="promo-policy user-text">
            <?php echo wpautop( carbon_get_theme_option('policy_text') ); ?>
        </section>
        <div class="promo-policy-section__image">
            <img src="<?php echo esc_url( wp_get_attachment_url( carbon_get_theme_option('policy_image') ) ); ?>" alt="" loading="lazy" />
        </div>
    </div>
</section>