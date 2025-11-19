<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/components/blog-card' ); ?>
    <?php endwhile; ?>

    <?php
    $big = 999999999; 

    $pagination_links = paginate_links([
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => 'page/%#%/',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => 'Предыдущая',
        'next_text' => 'Далее',
        'type'      => 'array', 
    ]);

    if (!empty($pagination_links)) :
    ?>
    <nav class="pagination" aria-label="Пагинация">
        <ul class="pagination__list">
            <?php foreach ($pagination_links as $link) : ?>
                <li class="pagination__item"><?php echo str_replace('page-numbers', 'pagination__link', $link); ?></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php endif; ?>
<?php else : ?>
    <p>Записей не найдено.</p>
<?php endif; ?>
<!-- <nav class="pagination" aria-label="Пагинация">
    <ul class="pagination__list">
    <li class="pagination__item">
        <button
        class="pagination__arrow pagination__arrow--disabled"
        disabled
        aria-label="Предыдущая страница"
        >
        Предыдущая
        </button>
    </li>
    <li class="pagination__item">
        <a class="pagination__link pagination__link--active" href="#"
        >1</a
        >
    </li>
    <li class="pagination__item">
        <a class="pagination__link" href="#">2</a>
    </li>
    <li class="pagination__item">
        <a class="pagination__link" href="#">3</a>
    </li>
    <li class="pagination__item pagination__item--dots">
        <span>...</span>
    </li>
    <li class="pagination__item">
        <a class="pagination__link" href="#">10</a>
    </li>
    <li class="pagination__item">
        <button
        class="pagination__arrow"
        aria-label="Следующая страница"
        >
        Далее
        </button>
    </li>
    </ul>
</nav> -->