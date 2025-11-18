<?php get_header(); ?>

<main class="main">
    <section class="promo-single-header">
        <?php custom_breadcrumbs(); ?>
        <div class="container">
            <h1 class="promo-single-header__title"><?php the_title(); ?></h1>
            <p class="promo-single-header__date">
            <?php echo esc_html( carbon_get_the_post_meta('promo_head_1') ); ?>
            </p>
            <div class="promo-single-header__actions">
            <p class="promo-single-header__price"><?php echo esc_html( carbon_get_the_post_meta('promo_head_2') ); ?></p>
            <a
                href="#!"
                class="promo-single-header__button btn-double btn-double--black"
            >
                <span class="btn-double__text"><?php echo esc_html( carbon_get_the_post_meta('promo_btn') ); ?></span>
            </a>
        </div>
    </div>
    </section>

    <section class="promo-single page-section">
    <div class="container">
        <div class="promo-single__image-wrapper">
        <img
            class="promo-single__image"
            src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('promo_preview') ) ); ?>"
            alt="<?php the_title_attribute(); ?>"
            loading="lazy"
        />
        </div>
        <div class="promo-single__terms user-text">
            <?php echo wpautop( carbon_get_the_post_meta('promo_main_text') ); ?>
        </div>
    </div>
    </section>
</main>

<?php get_footer(); ?>