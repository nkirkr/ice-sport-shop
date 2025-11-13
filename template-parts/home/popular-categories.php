<?php
$popular_categories = carbon_get_the_post_meta('popular_list');
$popular_categories_ids = wp_list_pluck($popular_categories, 'id');
?>

<?php if (!empty($popular_categories_ids)) : ?>

<section class="popular-categories page-section">
  <div class="container">
    <div class="popular-categories__header">
      <div class="popular-categories__text">
        <h2 class="popular-categories__title"><?php echo esc_html( carbon_get_the_post_meta('popular_title') ); ?></h2>
        <p class="popular-categories__subtitle">
          <?php echo esc_html( carbon_get_the_post_meta('popular_subtitle') ); ?>
        </p>
      </div>
      <a href="/catalog.html" class="popular-categories__link">Весь каталог</a>
    </div>
    <div class="popular-categories__grid">

      <?php foreach ($popular_categories_ids as $term_id) : ?>
          <?php
          $term = get_term($term_id, 'product_cat');
          if (!$term || is_wp_error($term)) continue;

          $thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);
          $image_url =  wp_get_attachment_image_url($thumbnail_id, 'full')
      ?>

      <article class="category-card">
        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="category-card__link">
          <div class="category-card__image-wrapper">
            <img
              src="<?php echo esc_url($image_url); ?>"
              alt="<?php echo esc_attr($term->name); ?>"
              class="category-card__image"
            />
          </div>
          <h3 class="category-card__title">Название категории</h3>
        </a>
      </article>

      <?php endforeach; ?>

    </div>
    <a href="/catalog.html" class="popular-categories__mobile-link"
      >Весь каталог</a
    >
  </div>
</section>

<?php endif; ?>