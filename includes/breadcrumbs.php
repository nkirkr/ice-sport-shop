<?php

function custom_breadcrumbs() {
    $separator = ''; 
    echo '<nav class="breadcrumbs container">';
    echo '<ul class="breadcrumbs__list">';
    
    echo '<li><a class="breadcrumbs__link" href="' . home_url() . '">Главная</a></li>';

    if (is_front_page()) {
        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">Главная</li>';
        echo '</ul></nav>';
        return;
    }

    if (is_singular()) {
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);

        if ($post_type != 'post' && $post_type_obj && $post_type_obj->has_archive) {
            echo '<li class="breadcrumbs__separator"></li>';
            echo '<li><a class="breadcrumbs__link" href="' . get_post_type_archive_link($post_type) . '">' . $post_type_obj->labels->breadcrumbs_label . '</a></li>';
        } elseif ($post_type == 'post') {
            $categories = get_the_category();
            if ($categories) {
                $category = array_shift($categories);
                echo '<li class="breadcrumbs__separator"></li>';
                echo '<li><a class="breadcrumbs__link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
        }


        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">' . get_the_title() . '</li>';

    } elseif (is_post_type_archive()) {
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);
        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">' . ($post_type_obj ? $post_type_obj->labels->breadcrumbs_label : ucfirst($post_type)) . '</li>';

    } elseif (is_tax()) {
        $term = get_queried_object();
        $taxonomy = $term->taxonomy;

        // Если таксономия относится к блогу
        if (in_array($taxonomy, ['tags', 'topic', 'author'])) {
            // Ссылка на архив блога
            echo '<li class="breadcrumbs__separator"></li>';
            echo '<li><a class="breadcrumbs__link" href="' . get_post_type_archive_link('blog') . '">Блог</a></li>';

            // Текущий термин (например: "Вдохновение и идеи")
            echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
            echo '<li class="breadcrumbs__current">' . esc_html($term->name) . '</li>';
        } else {
            // Для любых других таксономий — поведение по умолчанию
            echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
            echo '<li class="breadcrumbs__current">' . esc_html($term->name) . '</li>';
        }

    } elseif (is_category()) {
        $cat = get_queried_object();
        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">' . $cat->name . '</li>';

    } elseif (is_page()) {
        global $post;
        if ($post->post_parent) {
            $parents = get_post_ancestors($post->ID);
            $parents = array_reverse($parents);
            foreach ($parents as $parent_id) {
                echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
                echo '<li><a class="breadcrumbs__link" href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) . '</a></li>';
            }
        }
        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">' . get_the_title() . '</li>';

    } elseif (is_tag()) {
        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">' . single_tag_title('', false) . '</li>';

    } elseif (is_author()) {
        $author = get_queried_object();
        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">Автор: ' . $author->display_name . '</li>';

    } elseif (is_404()) {
        echo '<li class="breadcrumbs__separator breadcrumbs__separator--current"></li>';
        echo '<li class="breadcrumbs__current">Ошибка 404</li>';
    }

    echo '</ul></nav>';
}

