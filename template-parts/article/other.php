<?php
$author_terms = wp_get_post_terms(get_the_ID(), 'author');

if (empty($author_terms) || is_wp_error($author_terms)) {
    return; 
}

$author_id = $author_terms[0]->term_id;

$other_posts = new WP_Query([
    'post_type'      => 'blog',
    'posts_per_page' => 4,
    'post__not_in'   => [ get_the_ID() ],
    'tax_query' => [
        [
            'taxonomy' => 'author',
            'field'    => 'term_id',
            'terms'    => $author_id,
        ]
    ]
]);

?>

<?php if ($other_posts->have_posts()) : ?>

<section class="other container page-section">
    <p class="section-title">Другие публикации автора</p>

    <div class="other__list">

        <?php while ($other_posts->have_posts()) : $other_posts->the_post(); ?>

            <figure class="other__item">
                <a href="<?php the_permalink(); ?>">
                    <img class="other__image" src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('main_image_desktop') ) ); ?>" alt="<?php the_title_attribute(); ?>">
                </a>

                <figcaption class="other__caption">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </figcaption>
            </figure>

        <?php endwhile; wp_reset_postdata(); ?>

    </div>
</section>

<?php endif; ?>