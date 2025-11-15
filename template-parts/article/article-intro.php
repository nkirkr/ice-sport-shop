<?php
$image = wp_get_attachment_url( carbon_get_the_post_meta('main_image_desktop'), 'full' ); 


$terms = get_the_terms(get_the_ID(), 'tags');
$hashtags_html = '';

if ($terms && !is_wp_error($terms)) {
    $links = [];
    foreach ($terms as $term) {
        $url = get_term_link($term);
        $links[] = '<a href="' . esc_url($url) . '">#' . esc_html($term->name) . '</a>';
    }
    $hashtags_html = implode(', ', $links);
}
?>


<section class="article-intro container">
    <div class="article-intro__header">
        <h1 class="article-intro__title section-title"><?php the_title(); ?></h1>
    </div>
    <img class="article-intro__image" src="<?php echo esc_url($image); ?>" alt="">
    <p class="article-intro__hashtags"><?php echo $hashtags_html; ?></p>
</section>