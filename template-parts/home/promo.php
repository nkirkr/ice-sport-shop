<?php
$promo = carbon_get_the_post_meta('promo_list');
$promo_ids = wp_list_pluck($promo, 'id');
?>

<?php 
$query_args = [
    'post_type' => 'promo',
    'post__in' => $promo_ids,
    'orderby' => 'post__in',
];

$query = new WP_Query( $query_args );

if ($query->have_posts()) : ?>

<section class="promo page-section">
  <div class="container">
    <div class="promo__header">
      <div class="promo__text">
        <h2 class="promo__title"><?php echo esc_html( carbon_get_the_post_meta('promo_title') ); ?></h2>
        <p class="promo__subtitle"><?php echo esc_html( carbon_get_the_post_meta('promo_subtitle') ); ?></p>
      </div>
      <a href="<?php echo get_post_type_archive_link( 'promo' ); ?>" class="promo__link">Все акции</a>
    </div>
    <div class="promo__grid">

      <?php while( $query->have_posts() ) : $query->the_post(); ?>

      <?php get_template_part( 'template-parts/components/promo-card' ); ?>

    <?php endwhile; wp_reset_postdata(); ?>

    </div>
    <a href="<?php echo get_post_type_archive_link( 'promo' ); ?>" class="promo__catalog-link">Все акции</a>
  </div>
</section>


<?php endif; ?>