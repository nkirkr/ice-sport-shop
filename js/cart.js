jQuery(function($) {

  function updateCartButton($btn, state = 'default') {
    const states = {
      added:   () => $btn.removeClass('loading').addClass('btn-to-cart--added added').text('В корзине'),
      reset:   () => $btn.removeClass('loading btn-to-cart--added added').text('В корзину'),
    };

    $btn.prop('disabled', state !== 'reset');
    states[state]?.();
  }

  $(document.body).on('click', '.add_to_cart_button:not(.added):not(.btn-to-cart--added), .single_add_to_cart_button:not(.added):not(.btn-to-cart--added)', async function(e) {
    e.preventDefault();

    const $btn = $(this);
    const productId = $btn.data('product_id');

    const $wrapper = $btn.closest('.product, .catalog__card, .sidebar__item');
    const qtyInput = $wrapper.find('.quantity__input');
    const quantity = qtyInput.length ? parseInt(qtyInput.val(), 10) || 1 : ($btn.data('quantity') || 1);
    if (!productId) return;

    const wcAjaxUrl = (window.wc_add_to_cart_params?.wc_ajax_url) || '/?wc-ajax=';
    const addUrl    = wcAjaxUrl.replace('%%endpoint%%', 'add_to_cart');

    try {
      const res  = await fetch(addUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
        body: new URLSearchParams({ product_id: productId, quantity })
      });
      const data = await res.json();

      if (data?.fragments) {
        $.each(data.fragments, (key, value) => $(key).replaceWith(value));
        $(document.body).trigger('added_to_cart', [data.fragments, data.cart_hash, $btn]);
        updateCartButton($btn, 'added');
      } else {
        console.warn('Некорректный ответ WooCommerce:', data);
        updateCartButton($btn, 'reset');
      }
    } catch (err) {
      console.error('Ошибка добавления в корзину:', err);
      updateCartButton($btn, 'reset');
    }
  });

  let hideNotificationTimer;

  $(document.body).on('added_to_cart', (event, fragments, cart_hash, $button) => {
    if ($button?.length) updateCartButton($button, 'added');

    const btn = $button?.[0];
    if (!btn) return;

    const productEl  = btn.closest('.product, .catalog__card, .sidebar__item');
    const titleEl    = productEl?.querySelector('.catalog__card-title, .product_title, .sidebar__item-title');
    const productName = titleEl?.textContent.trim() || 'Товар';

    const notification = document.querySelector('.notification');
    if (!notification) return;

    notification.querySelector('.notification__title').textContent = productName;
    notification.classList.add('notification--visible');

    clearTimeout(hideNotificationTimer);
    hideNotificationTimer = setTimeout(() => {
      notification.classList.remove('notification--visible');
    }, 3000);


    const cartBtn  = document.querySelector('#cart-btn');
    const cartIcon = cartBtn?.querySelector('use');
    const cartCount = document.querySelector('#cart-count');
    if (cartCount && cartIcon) {
      cartBtn.classList.add('cart-btn--full');
      cartIcon.setAttribute('xlink:href', '#cart-full');
    }

    document.addEventListener('click', e => {
      if (e.target.closest('.notification__close')) {
        notification.classList.remove('notification--visible');
      }
    });
  });

  $('.single_add_to_cart_button.added, .single_add_to_cart_button.btn-to-cart--added')
    .each((_, el) => updateCartButton($(el), 'added'));
});


jQuery(function($) {

  $(document).on('click', '.sidebar__item-quantity .quantity__btn', function(e) {
    e.preventDefault();

    const $wrapper = $(this).closest('.sidebar__item-quantity');
    const $input = $wrapper.find('.quantity__input');
    const currentVal = parseInt($input.val(), 10);
    const cartItemKey = $wrapper.data('cart-item-key');
    let newVal = currentVal;

    if ($(this).hasClass('quantity__inc')) newVal = currentVal + 1;
    if ($(this).hasClass('quantity__dec')) newVal = Math.max(1, currentVal - 1);

    if (newVal === currentVal) return;

    $input.val(newVal);

    $.ajax({
      type: 'POST',
      url: wc_add_to_cart_params.wc_ajax_url.replace('%%endpoint%%', 'update_cart_item_quantity'),
      data: {
        cart_item_key: cartItemKey,
        quantity: newVal,
      },
      beforeSend() {
        $('.cart, #cart-list').addClass('is-loading');
      },
      success(response) {
        if (response && response.fragments) {
          $.each(response.fragments, (selector, html) => {
            $(selector).replaceWith(html);
          });

          $(document.body).trigger('wc_fragments_refreshed');
        }
      },
      complete() {
        $('.cart, #cart-list').removeClass('is-loading');
      },
      error(xhr) {
        console.error('Ошибка обновления количества:', xhr);
      }
    });
  });
});
