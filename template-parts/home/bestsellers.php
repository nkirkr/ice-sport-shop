<?php
$bestsellers = carbon_get_the_post_meta('bestsellers_list');
$bestsellers_ids = wp_list_pluck($bestsellers, 'id');
?>


<?php 
$query_args = [
    'post_type' => 'product',
    'post__in' => $bestsellers_ids,
    'orderby' => 'post__in',
];

$query = new WP_Query( $query_args );

if ($query->have_posts()) : ?>
<section class="bestsellers page-section">
  <div class="container">
    <div class="bestsellers__header">
      <div class="bestsellers__text">
        <h2 class="bestsellers__title"><?php echo esc_html( carbon_get_the_post_meta( 'bestsellers_title' ) ); ?></h2>
        <p class="bestsellers__subtitle">
          <?php echo esc_html( carbon_get_the_post_meta( 'bestsellers_subtitle' ) ); ?>
        </p>
      </div>
      <a href="/catalog.html" class="bestsellers__link">Весь каталог</a>
    </div>


    <div class="bestsellers__grid">

    <?php while( $query->have_posts() ) : $query->the_post(); ?>

      <?php get_template_part( 'template-parts/components/bestseller-card' ); ?>

    <?php endwhile; wp_reset_postdata(); ?>
      

    </div>
    <a href="/catalog.html" class="bestsellers__catalog-link">Весь каталог</a>
  </div>
</section>

<?php endif; ?>