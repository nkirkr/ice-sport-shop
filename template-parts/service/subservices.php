<?php 
$subservices = carbon_get_the_post_meta('subservices_list');
$subservices_ids = wp_list_pluck($subservices, 'id');
$subservices_query_args = [
    'post_type' => 'services',
    'post__in' => $subservices_ids,
    'orderby' => 'post__in',
];

$subservices_query = new WP_Query( $subservices_query_args );
if (!empty($subservices_ids)) 

if ($subservices_query->have_posts()) : ?>

<section class="subservices page-section">
  <div class="container">
    <h2 class="subservices__title">Подуслуги</h2>
    <div class="subservices__grid">

      <?php while( $subservices_query->have_posts() ) : $subservices_query->the_post(); ?>

        <?php get_template_part( 'template-parts/components/service-card' ); ?>

      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<?php endif; ?>