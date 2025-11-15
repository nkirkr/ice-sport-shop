<?php
$faq_list_1 = carbon_get_the_post_meta('faq_list_1');
$faq_list_2 = carbon_get_the_post_meta('faq_list_2');

$faq_ids_1 = wp_list_pluck($faq_list_1, 'id');
$faq_ids_2 = wp_list_pluck($faq_list_2, 'id');

$faq_1_query_args = [
    'post_type' => 'faq',
    'post__in' => $faq_ids_1,
    'orderby' => 'post__in'
];

$faq_2_query_args = [
    'post_type' => 'faq',
    'post__in' => $faq_ids_2,
    'orderby' => 'post__in'
];

$faq_1_query = new WP_Query( $faq_1_query_args );
$faq_2_query = new WP_Query( $faq_2_query_args );

if ( !empty($faq_ids_1) && !empty($faq_ids_2) ) : ?>

<section class="service-faq page-section">
  <div class="container">
    <h2 class="service-faq__title">Частые вопросы</h2>
    <div class="faq__content">
      <ul class="faq__list">

        <?php while( $faq_1_query->have_posts() ) : $faq_1_query->the_post(); ?>
          
          <?php get_template_part('template-parts/components/faq-item'); ?>

        <?php endwhile; wp_reset_postdata(); ?>

      </ul>
      <ul class="faq__list">
        
        <?php while( $faq_2_query->have_posts() ) : $faq_2_query->the_post(); ?>
          
          <?php get_template_part('template-parts/components/faq-item'); ?>

        <?php endwhile; wp_reset_postdata(); ?>

      </ul>
    </div>
  </div>
</section>

<?php endif; ?>