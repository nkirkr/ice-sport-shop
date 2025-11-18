<?php foreach ($sections as $section) : ?>

<div class="menu__item-wrapper" data-category="<?php echo esc_attr($section->slug); ?>">
    <div class="menu__item">
        <a href="<?php echo esc_url(get_term_link($section)); ?>" class="menu__item-link">
            <span class="menu__link"><?php echo esc_html($section->name); ?></span>
        </a>
    </div>
</div>

<?php
$subsections = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'parent'     => $section->term_id
]);
?>

<div class="menu__categories" role="navigation" data-category="<?php echo esc_attr($section->slug); ?>">
    <div class="menu__categories-content">

        <!-- Левая колонка: подразделы -->
        <div class="menu__categories-column menu__categories-column--subsections">
            <?php foreach ($subsections as $i => $sub): ?>
                <a href="<?php echo esc_url(get_term_link($sub)); ?>"
                   class="menu__categories-title <?php echo $i === 0 ? 'is-active' : ''; ?>"
                   data-subsection="<?php echo $i; ?>">
                    <?php echo esc_html($sub->name); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Правая колонка: подкатегории -->
        <div class="menu__categories-column menu__categories-column--categories">

            <?php foreach ($subsections as $i => $sub): ?>

                <?php
                $children = get_terms([
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,
                    'parent'     => $sub->term_id
                ]);
                ?>

                <div class="menu__categories-wrapper"
                     data-subsection="<?php echo $i; ?>"
                     style="<?php echo $i === 0 ? '' : 'display:none;'; ?>">

                    <?php 
                    // разбиваем список дочерних категорий на 2 колонки
                    $chunks = array_chunk($children, ceil(count($children) / 2)); 
                    ?>

                    <?php foreach ($chunks as $chunk): ?>
                        <ul class="menu__list">
                            <?php foreach ($chunk as $child): ?>
                                <li>
                                    <a href="<?php echo esc_url(get_term_link($child)); ?>" class="menu__category-link">
                                        <?php echo esc_html($child->name); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>

<?php endforeach; ?>
