<?php
$current_cat = get_queried_object();

$top_level = get_top_level_category($current_cat);

$level2 = get_terms([
    'taxonomy' => 'product_cat',
    'parent'   => $top_level->term_id,
    'hide_empty' => true,
]);

$level3 = [];

foreach ($level2 as $cat2) {
    $children = get_terms([
        'taxonomy' => 'product_cat',
        'parent'   => $cat2->term_id,
        'hide_empty' => true,
    ]);
    $level3 = array_merge($level3, $children);
}

?>

<div class="catalog-bottom__categories">
    
    <?php if (!empty($level2)) : ?>

    <div class="catalog-bottom__category-group">
        <h2 class="catalog-bottom__category-title">Категории</h2>

        <div class="catalog-bottom__category-links">
            <?php foreach ($level2 as $cat2): ?>
                <a 
                    href="<?php echo esc_url(get_term_link($cat2)); ?>"
                    class="catalog-bottom__category-link"
                >
                    <?php echo esc_html($cat2->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <?php endif; ?>

    <?php if (!empty($level3)) : ?>

    <div class="catalog-bottom__category-group">
        <h2 class="catalog-bottom__category-title">Подкатегории</h2>

        <div class="catalog-bottom__category-links">
            <?php foreach ($level3 as $cat3): ?>
                <a 
                    href="<?php echo esc_url(get_term_link($cat3)); ?>"
                    class="catalog-bottom__category-link"
                >
                    <?php echo esc_html($cat3->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <?php endif; ?>

</div>
