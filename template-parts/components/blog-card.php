<?php
$image = wp_get_attachment_url( carbon_get_the_post_meta('main_image_desktop'), 'full' ); 
$id = get_the_ID();
$likes_count = carbon_get_post_meta( $id, 'likes');
$views_count = carbon_get_post_meta( $id, 'views');
$excerpt = carbon_get_post_meta( $id, 'article_excerpt'); 
$read_time = sf_get_read_time($id);
?>

<article class="blog__card">
    <img
        class="blog__card-img"
        src="<?php echo esc_url($image); ?>"
        alt=""
        loading="lazy"
    />
    <ul class="blog__card-meta-list">
    <li class="blog__card-meta-item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/blog/like.svg' ); ?>" alt="" />
        <p>317</p>
    </li>
    <li class="blog__card-meta-item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/blog/views.svg' ); ?>" alt="" />
        <p>1550</p>
    </li>
    <li class="blog__card-meta-item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/blog/time.svg' ); ?>" alt="" />
        <p><?php echo esc_html($read_time); ?></p>
    </li>
    <li class="blog__card-meta-item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/blog/authorr.svg' ); ?>" alt="" />
        <p>Имя Фамилия</p>
    </li>
    <li class="blog__card-meta-item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/blog/calendar.svg' ); ?>" alt="" />
        <p><?php echo get_the_date('d.m.Y'); ?></p>
    </li>
    </ul>
    <h2 class="blog__card-title"><?php the_title(); ?></h2>
    <p class="blog__card-excerpt paragraph">
    <?php echo esc_html( carbon_get_the_post_meta('article_excerpt') ); ?>
    </p>
    <div class="blog__card-footer">
    <a
        href="<?php the_permalink(); ?>"
        class="blog__card-link btn-double btn-double--black"
    >
        <span class="btn-double__text">Читать всё</span>
    </a>
    <div class="blog__card-time">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/blog/time.svg' ); ?>" alt="" />
        <p>11 минут</p>
    </div>
    </div>
</article>