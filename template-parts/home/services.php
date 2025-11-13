<?php
$services = carbon_get_the_post_meta('services_list');
$services_ids = wp_list_pluck($services, 'id');
?>

<?php 
$query_args = [
    'post_type' => 'services',
    'post__in' => $services_ids,
    'orderby' => 'post__in',
];

$query = new WP_Query( $query_args );

if ($query->have_posts()) : ?>

<section class="services page-section">
  <div class="container">
    <div class="services__header">
      <div class="services__text">
        <h2 class="services__title"><?php echo esc_html( carbon_get_the_post_meta('services_title') ); ?></h2>
        <p class="services__subtitle"><?php echo esc_html( carbon_get_the_post_meta('services_subtitle') ); ?></p>
      </div>
      <a href="/services.html" class="services__link">Все услуги</a>
    </div>
    <div class="services__grid">
      
    <?php while( $query->have_posts() ) : $query->the_post(); ?>

      <?php get_template_part( 'template-parts/components/service-card' ); ?>

    <?php endwhile; wp_reset_postdata(); ?>
     
    </div>
    <a href="/services.html" class="services__catalog-link">Все услуги</a>
  </div>
</section>

<?php endif; ?>