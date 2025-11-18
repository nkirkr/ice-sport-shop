<div class="blog__filters-wrapper">
    <div class="blog-filters">
        <div class="blog-filters-wrapper acnav">
            <div class="acnav__main-list">
                <section class="blog-filters nav-wrap">

                    <!-- Категории -->
                    <div class="blog-filters__section">
                        <p class="blog-filters__title categories-title acnav__main-label">
                            Категории
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/dropdown.svg' ); ?>" alt="" width="18" height="18" class="blog-filters__arrow" />
                        </p>

                        <div class="blog-filters__categories acnav" role="navigation">
                            <div class="acnav__main-list">
                                <?php
                                $terms = get_terms([
                                    'taxonomy'   => 'topic',
                                    'hide_empty' => true,
                                ]);

                                if (!empty($terms) && !is_wp_error($terms)) : ?>
                                    <ul class="acnav__list acnav__list--level1">
                                        <?php foreach ($terms as $term) : ?>
                                            <li class="blog-filters__categories-item has-children">
                                                <a class="acnav__label" href="<?php echo esc_url(get_term_link($term)); ?>">
                                                    <?php echo esc_html($term->name); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Метки -->
                    <?php
                    $tag_terms = get_terms([
                        'taxonomy'   => 'tags',
                        'hide_empty' => true,
                    ]);

                    if (!empty($tag_terms) && !is_wp_error($tag_terms)) : ?>
                        <div class="blog-filters__section">
                            <p class="blog-filters__title categories-title acnav__main-label">
                                Метки
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/build/img/icons/dropdown.svg'); ?>" alt="" width="18" height="18" class="blog-filters__arrow" />
                            </p>

                            <div class="blog-filters__categories acnav" role="navigation">
                                <div class="acnav__main-list">
                                    <ul class="acnav__list acnav__list--level1">
                                        <?php foreach ($tag_terms as $term) : ?>
                                            <li class="blog-filters__categories-item has-children">
                                                <a class="acnav__label" href="<?php echo esc_url(get_term_link($term)); ?>">
                                                    <?php echo esc_html($term->name); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Лучшие статьи -->
                    <div class="blog-filters__section">
                        <p class="blog-filters__title categories-title acnav__main-label">
                            Лучшие статьи
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/build/img/icons/dropdown.svg'); ?>" alt="" width="18" height="18" class="blog-filters__arrow" />
                        </p>

                        <div class="blog-filters__categories acnav" role="navigation">
                            <div class="acnav__main-list">
                                <ul class="acnav__list acnav__list--level1">
                                    <?php
                                    $best_posts = new WP_Query([
                                        'post_type'      => 'blog',
                                        'posts_per_page' => 3,
                                        'meta_query'     => [
                                            [
                                                'key'     => 'is_best_article',
                                                'value'   => 'yes',
                                                'compare' => '=',
                                            ],
                                        ],
                                    ]);

                                    if ($best_posts->have_posts()) :
                                        while ($best_posts->have_posts()) : $best_posts->the_post(); ?>
                                            <li class="blog-filters__categories-item has-children">
                                                <a class="acnav__label" href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </li>
                                        <?php endwhile;
                                        wp_reset_postdata();
                                    endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
</div>
