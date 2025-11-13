<?php
$price_list = carbon_get_the_post_meta('price_list');

if ( !empty( $price_list ) ) : ?>

<section class="service-price page-section">
  <div class="container">
    <h2 class="section-title">Прайс</h2>

    <div class="price-table">
      <div class="price-table__header">
        <div class="price-table__col price-table__col--name">Наименование</div>
        <div class="price-table__col price-table__col--desc">Описание</div>
        <div class="price-table__col price-table__col--price">Стоимость</div>
      </div>

      <?php foreach ($price_list as $price_item) : ?>

        <div class="price-table__row">
          <p class="price-table__name"><?php echo esc_html( $price_item['price_list_title']); ?></p>
          <p class="price-table__description"><?php echo esc_html( $price_item['price_list_descr']); ?></p>
          <p class="price-table__cost"><?php echo esc_html( $price_item['price_list_price']); ?></p>
        </div>

        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>

<?php endif; ?>
