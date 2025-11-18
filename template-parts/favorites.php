<aside class="favorites sidebar">
    <div class="sidebar__content">
        <div class="sidebar__header">
            <p class="sidebar__title">Ваше избранное</p>
            <button class="sidebar__close" aria-label="Закрыть корзину" id="favorites-close">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/icons/sidebar-close.svg' ); ?>" alt="">
            </button>
        </div>
        <div class="sidebar__list-wrapper" id="favorites-list">
            <ul class="sidebar__list" id='favorites-list-ui'>
                <?php 
                    $favorite_list = [];
                    if (isset($_COOKIE['revealed_favorites_list'])) {
                        $favorite_list = explode(',', $_COOKIE['revealed_favorites_list']);
                    }

                    if (!empty($favorite_list)) : ?>

                    <?php foreach ($favorite_list as $id) : ?>

                    <?php
                    $product_id = intval($id);

                    $product = wc_get_product($product_id);
                    $image = wp_get_attachment_image_url($product->get_image_id(), 'thumbnail');
                    ?>

                <li class="sidebar__item" data-item='<?php echo $product_id; ?>'>
                    <div class="sidebar__item-info">
                        <div class="sidebar__item-image">
                            <img class="sidebar__item-img" src="<?php echo esc_url($image); ?>" alt="">
                        </div>
                        <div class="sidebar__item-text">
                            <p class="sidebar__item-title"><?php echo $product->get_name(); ?></p>
                            <p class="sidebar__item-sku">Код товара <?php echo $product->get_sku(); ?></p>
                            <span class="sidebar__item-price"><?php echo $product->get_price_html(); ?></span>
                        </div>
                    </div>
                    <div class="sidebar__item-controls">
                        <?php
                        $in_cart = WC()->cart && WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product_id ) );
                        ?>

                        <!-- <button class="to-cart centered <?php echo $in_cart ? 'to-cart--checked' : ''; ?>" data-product-id="<?php echo esc_attr($product_id); ?>">
                            <svg class="to-cart__icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.1875 4.5H12.375C12.375 3.60489 12.0194 2.74645 11.3865 2.11351C10.7536 1.48058 9.89511 1.125 9 1.125C8.10489 1.125 7.24645 1.48058 6.61351 2.11351C5.98058 2.74645 5.625 3.60489 5.625 4.5H2.8125C2.51413 4.5 2.22798 4.61853 2.017 4.8295C1.80603 5.04048 1.6875 5.32663 1.6875 5.625V14.0625C1.6875 14.3609 1.80603 14.647 2.017 14.858C2.22798 15.069 2.51413 15.1875 2.8125 15.1875H15.1875C15.4859 15.1875 15.772 15.069 15.983 14.858C16.194 14.647 16.3125 14.3609 16.3125 14.0625V5.625C16.3125 5.32663 16.194 5.04048 15.983 4.8295C15.772 4.61853 15.4859 4.5 15.1875 4.5ZM9 2.25C9.59674 2.25 10.169 2.48705 10.591 2.90901C11.0129 3.33097 11.25 3.90326 11.25 4.5H6.75C6.75 3.90326 6.98705 3.33097 7.40901 2.90901C7.83097 2.48705 8.40326 2.25 9 2.25ZM15.1875 14.0625H2.8125V5.625H5.625V6.75C5.625 6.89918 5.68426 7.04226 5.78975 7.14775C5.89524 7.25324 6.03832 7.3125 6.1875 7.3125C6.33668 7.3125 6.47976 7.25324 6.58525 7.14775C6.69074 7.04226 6.75 6.89918 6.75 6.75V5.625H11.25V6.75C11.25 6.89918 11.3093 7.04226 11.4148 7.14775C11.5202 7.25324 11.6633 7.3125 11.8125 7.3125C11.9617 7.3125 12.1048 7.25324 12.2102 7.14775C12.3157 7.04226 12.375 6.89918 12.375 6.75V5.625H15.1875V14.0625Z" fill="#3936FF" />
                            </svg>
                            </svg>
                        </button> -->
                        <button class="sidebar__item-delete from-favorite" aria-label="Удалить" data-id='<?php echo $product_id; ?>'>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.1875 4.8125L4.8125 17.1875" stroke="#343330" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.1875 17.1875L4.8125 4.8125" stroke="#343330" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </li>

                <?php endforeach; ?>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</aside>