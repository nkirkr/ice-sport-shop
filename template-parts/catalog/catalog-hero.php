<?php
$current_cat = get_queried_object();
$thumbnail_id = get_term_meta( $current_cat->term_id, 'thumbnail_id', true );
$image_url = wp_get_attachment_url( $thumbnail_id );
?>

<?php if ($image_url): ?>
<div class="catalog-hero">
    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($current_cat->name); ?>" class="catalog-hero__image" loading="eager">
</div>
<?php endif; ?>

