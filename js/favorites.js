const toFavoriteBtns = document.querySelectorAll('.to-favorite');
const fromFavoriteBtns = document.querySelectorAll('.from-favorite');
const notification = document.querySelector('.notification');
const closeNotification = document.querySelector('.notification__close');
const notificationTitle = document.querySelector('.notification__title');
const notificationStatus = document.querySelector('.notification__status');
const favoritesList = document.querySelector('#favorites-list-ui');


const setNotificationTitle = (title) => {
    notification.querySelector('.notification__title').textContent = title;
}

const removeNotificationTitle = () => {
    notification.querySelector('.notification__title').textContent = '';
}

const updateFavoritesCount = (favoritesListString) => {
    const countElement = document.querySelector('#favorites-btn .header__links-count');
    const iconUse = document.querySelector('.favorites-icon use');

    if (!countElement) return;

    const favoritesArray = favoritesListString
        ? favoritesListString.split(',').filter(Boolean)
        : [];

    countElement.textContent = favoritesArray.length;

    if (iconUse) {
        const sprite = `${revealed_favorites_object.sprite}#${favoritesArray.length > 0 ? 'favorites-full' : 'favorites-empty'}`;
        iconUse.setAttribute('xlink:href', sprite);
    }
};


const createFavoritesItem = (data) => {
    const li = document.createElement('li');
    li.classList.add('sidebar__item');
    li.dataset.item = data.product_id; 
    const infoDiv = document.createElement('div');
    infoDiv.classList.add('sidebar__item-info');
    const imageDiv = document.createElement('div');
    imageDiv.classList.add('sidebar__item-image');
    const img = document.createElement('img');
    img.classList.add('sidebar__item-img');
    img.src = data.product_image;
    img.alt = data.product_name || '';
    imageDiv.appendChild(img);
    infoDiv.appendChild(imageDiv);
    const textDiv = document.createElement('div');
    textDiv.classList.add('sidebar__item-text');
    const titleP = document.createElement('p');
    titleP.classList.add('sidebar__item-title');
    titleP.textContent = data.product_name || '';
    const skuP = document.createElement('p');
    skuP.classList.add('sidebar__item-sku');
    skuP.textContent = data.product_sku || '';
    const priceSpan = document.createElement('span');
    priceSpan.classList.add('sidebar__item-price');
    priceSpan.innerHTML = `
    ${data.product_price}
    `
    textDiv.appendChild(titleP);
    textDiv.appendChild(skuP);
    textDiv.appendChild(priceSpan);
    infoDiv.appendChild(textDiv);
    li.appendChild(infoDiv);
    const controlsDiv = document.createElement('div');
    controlsDiv.classList.add('sidebar__item-controls');
    const favBtn = document.createElement('button');
    favBtn.classList.add('to-cart', 'centered');
    favBtn.dataset.id = data.product_id;
    favBtn.setAttribute('aria-label', 'Добавить в корзину');
    favBtn.innerHTML = `
    <svg class="to-cart__icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.1875 4.5H12.375C12.375 3.60489 12.0194 2.74645 11.3865 2.11351C10.7536 1.48058 9.89511 1.125 9 1.125C8.10489 1.125 7.24645 1.48058 6.61351 2.11351C5.98058 2.74645 5.625 3.60489 5.625 4.5H2.8125C2.51413 4.5 2.22798 4.61853 2.017 4.8295C1.80603 5.04048 1.6875 5.32663 1.6875 5.625V14.0625C1.6875 14.3609 1.80603 14.647 2.017 14.858C2.22798 15.069 2.51413 15.1875 2.8125 15.1875H15.1875C15.4859 15.1875 15.772 15.069 15.983 14.858C16.194 14.647 16.3125 14.3609 16.3125 14.0625V5.625C16.3125 5.32663 16.194 5.04048 15.983 4.8295C15.772 4.61853 15.4859 4.5 15.1875 4.5ZM9 2.25C9.59674 2.25 10.169 2.48705 10.591 2.90901C11.0129 3.33097 11.25 3.90326 11.25 4.5H6.75C6.75 3.90326 6.98705 3.33097 7.40901 2.90901C7.83097 2.48705 8.40326 2.25 9 2.25ZM15.1875 14.0625H2.8125V5.625H5.625V6.75C5.625 6.89918 5.68426 7.04226 5.78975 7.14775C5.89524 7.25324 6.03832 7.3125 6.1875 7.3125C6.33668 7.3125 6.47976 7.25324 6.58525 7.14775C6.69074 7.04226 6.75 6.89918 6.75 6.75V5.625H11.25V6.75C11.25 6.89918 11.3093 7.04226 11.4148 7.14775C11.5202 7.25324 11.6633 7.3125 11.8125 7.3125C11.9617 7.3125 12.1048 7.25324 12.2102 7.14775C12.3157 7.04226 12.375 6.89918 12.375 6.75V5.625H15.1875V14.0625Z" fill="#3936FF" />
    </svg>
    `
    const delBtn = document.createElement('button');
    delBtn.classList.add('sidebar__item-delete', 'from-favorite');
    delBtn.dataset.id = data.product_id;
    delBtn.setAttribute('aria-label', 'Удалить');
    delBtn.innerHTML = `
    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.1875 4.8125L4.8125 17.1875" stroke="#343330" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M17.1875 17.1875L4.8125 4.8125" stroke="#343330" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    `;
    delBtn.addEventListener('click', onHandleFromFavoriteBtnClick);
    controlsDiv.appendChild(favBtn);
    controlsDiv.appendChild(delBtn);
    li.appendChild(controlsDiv);

    favoritesList.appendChild(li);
}

const addToFavorites = (productId, btn) => {

    fetch(revealed_favorites_object.url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            action: 'revealed_favorites_action',
            nonce: revealed_favorites_object.nonce,
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(res => {
        
        if (!res.success) return;
        
        const isFavorite = res.data.is_favorite;
        const item = res.data.product_name;
        const favoritesList = res.data.favorites_list;
        
        btn.classList.toggle('to-favorite--checked', isFavorite);

        const use = btn.querySelector('use');
        if (use) {
            const iconId = isFavorite ? 'to-favorite-checked' : 'to-favorite';
            use.setAttribute('xlink:href', `${revealed_favorites_object.sprite}#${iconId}`);
        }

        updateFavoritesCount(favoritesList);

// 🔥 Определяем, что реально произошло
if (isFavorite) {
    updateFavoritesUi('add', res.data);
} else {
    updateFavoritesUi('remove', res.data);
}

notification.classList.remove('notification--visible');
showNotification(item, isFavorite);
    })


    // .catch(() => {
    //     alert('Error add to wishlist');
    // });
};

const updateFavoritesUi = (action, data) => {
    switch (action) {
        case 'remove':
         
            const id = data.product_id;
           
            favoritesList.querySelector(`[data-item='${id}']`).remove();
        
            const catalogBtn = document.querySelector(`.to-favorite[data-id="${id}"]`);
        
            catalogBtn.classList.remove('to-favorite--checked');
            catalogBtn.querySelector('use').setAttribute('xlink:href', `${revealed_favorites_object.sprite}#to-favorite`);
            break;

        case 'add': 
    
            createFavoritesItem(data);
            break;
    }
}

const removeFromFavorites = (productId, btn) => {
    fetch(revealed_favorites_object.url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            action: 'remove_favorites_action',
            nonce: revealed_favorites_object.nonce,
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(res => {
      
        if (!res.success) return;
        
        const isFavorite = res.data.is_favorite;
        const item = res.data.product_name;
        const favoritesList = res.data.favorites_list;
        const id = res.data.product_id;
        
        btn.classList.toggle('to-favorite--checked', isFavorite);

        const use = btn.querySelector('use');
        if (use) {
            const iconId = isFavorite ? 'to-favorite-checked' : 'to-favorite';
            use.setAttribute('xlink:href', `${revealed_favorites_object.sprite}#${iconId}`);
        }

        updateFavoritesCount(favoritesList)
       
        updateFavoritesUi('remove', res.data)

        notification.classList.remove('notification--visible');
        showNotification(item, isFavorite);
    })
}


const onHandleFavoriteBtnClick = (evt) => {
    const btn = evt.currentTarget
    const id = btn.dataset.id
    addToFavorites(id, btn);
}

const onHandleFromFavoriteBtnClick = (evt) => {
    const btn = evt.currentTarget
    const id = btn.dataset.id
  
    removeFromFavorites(id, btn);
}


const showNotification = (item, status) => {
    notification.classList.add('notification--visible');
    closeNotification.addEventListener('click', hideNotification);
    notificationTitle.textContent = item;
    if (status) {
        notificationStatus.textContent = 'Добавлен в избранное';
    } else {
        notificationStatus.textContent = 'Удален из избранного';
    }
    
}

const hideNotification = () => {
    notification.classList.remove('notification--visible');
    closeNotification.removeEventListener('click', hideNotification);
}



toFavoriteBtns.forEach(btn => btn.addEventListener('click', onHandleFavoriteBtnClick));
fromFavoriteBtns.forEach(btn => btn.addEventListener('click', onHandleFromFavoriteBtnClick));



document.addEventListener('click', async (e) => {
  const btn = e.target.closest('.to-cart');
  if (!btn) return;

  e.preventDefault();
  const productId = btn.dataset.productId;
  if (!productId) return;

  const wcAjaxUrl =
    (window.wc_add_to_cart_params && wc_add_to_cart_params.wc_ajax_url) ||
    '/?wc-ajax=';

  const inCart = btn.classList.contains('to-cart--checked');
  const notification = document.querySelector('.notification');

  const showNotification = (productName, statusText) => {
    if (!notification) return;

    const titleEl = notification.querySelector('.notification__title');
    const statusEl = notification.querySelector('.notification__status');

    if (titleEl) titleEl.textContent = productName;
    if (statusEl) statusEl.textContent = statusText;

    notification.classList.add('notification--visible');
  };

  if (!inCart) {
    const addUrl = wcAjaxUrl.replace('%%endpoint%%', 'add_to_cart');
    const res = await fetch(addUrl, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
      body: new URLSearchParams({ product_id: productId })
    });
    const data = await res.json();

    if (data?.fragments) {
      jQuery.each(data.fragments, (k, v) => jQuery(k).replaceWith(v));
      jQuery(document.body).trigger('added_to_cart', [data.fragments]);
      btn.classList.add('to-cart--checked');

      const productEl = btn.closest('.sidebar__item');
      const titleEl = productEl?.querySelector('.sidebar__item-title');
      const productName = titleEl ? titleEl.textContent.trim() : 'Товар';

      showNotification(productName, 'добавлен в корзину');
    }
  } else {
    const refreshUrl = wcAjaxUrl.replace('%%endpoint%%', 'get_refreshed_fragments');
    const refreshRes = await fetch(refreshUrl);
    const refreshData = await refreshRes.json();

    const html = refreshData?.fragments?.['div.widget_shopping_cart_content'];
    if (!html) return;

    const temp = document.createElement('div');
    temp.innerHTML = html;

    const li = [...temp.querySelectorAll('.sidebar__item')].find((el) =>
      el.querySelector(`.to-favorite[data-id="${productId}"]`)
    );

    const cartItemKey = li?.querySelector('.quantity')?.dataset.cartItemKey;
    if (!cartItemKey) {
      console.warn('cart_item_key не найден для product_id:', productId);
      return;
    }

    const removeUrl = wcAjaxUrl.replace('%%endpoint%%', 'remove_from_cart');
    const remRes = await fetch(removeUrl, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
      body: new URLSearchParams({ cart_item_key: cartItemKey })
    });
    const remData = await remRes.json();

    if (remData?.fragments) {
      jQuery.each(remData.fragments, (k, v) => jQuery(k).replaceWith(v));
      jQuery(document.body).trigger('removed_from_cart', [remData.fragments]);
      btn.classList.remove('to-cart--checked');

      const productEl = btn.closest('.sidebar__item');
      const titleEl = productEl?.querySelector('.sidebar__item-title');
      const productName = titleEl ? titleEl.textContent.trim() : 'Товар';

      showNotification(productName, 'удалён из корзины');
    } else {
      console.warn('Не удалось удалить товар:', remData);
    }
  }
});

document.addEventListener('click', (e) => {
  if (e.target.closest('.notification__close')) {
    document.querySelector('.notification')?.classList.remove('notification--visible');
  }
});


function reinitFavoriteHandlers() {
  const toFavoriteBtns = document.querySelectorAll('.to-favorite');
  const fromFavoriteBtns = document.querySelectorAll('.from-favorite');

  toFavoriteBtns.forEach(btn => {
    btn.removeEventListener('click', onHandleFavoriteBtnClick);
    btn.addEventListener('click', onHandleFavoriteBtnClick);
  });

  fromFavoriteBtns.forEach(btn => {
    btn.removeEventListener('click', onHandleFromFavoriteBtnClick);
    btn.addEventListener('click', onHandleFromFavoriteBtnClick);
  });
}

document.addEventListener('DOMContentLoaded', reinitFavoriteHandlers);

document.addEventListener('custom_products_replaced', reinitFavoriteHandlers);

if (window.jQuery) {
  (function($){
    $(document).on('wpc_ajax_complete wpc_ajax_success wpcf_update_done', function(){
      reinitFavoriteHandlers();
    });
  })(jQuery);
}

const catalogList = document.querySelector('.catalog__list');
if (catalogList && 'MutationObserver' in window) {
  const mo = new MutationObserver(() => reinitFavoriteHandlers());
  mo.observe(catalogList, { childList: true, subtree: true });
}

jQuery(document.body)
  .on('added_to_cart removed_from_cart wc_fragments_refreshed wc_fragments_loaded', function () {
    if (typeof reinitFavoriteHandlers === 'function') reinitFavoriteHandlers();
  });


  function onHandleProductBadgeFavoriteClick(evt) {
  const btn = evt.currentTarget;
  const id = btn.dataset.id;

  fetch(revealed_favorites_object.url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams({
      action: 'revealed_favorites_action',
      nonce: revealed_favorites_object.nonce,
      product_id: id
    })
  })
    .then(response => response.json())
    .then(res => {
      if (!res.success) return;

      const isFavorite = res.data.is_favorite;
      const itemName = res.data.product_name;
      const favoritesList = res.data.favorites_list;

      btn.classList.toggle('product__badges-to-favorites--checked', isFavorite);

      const label = btn.querySelector('.paragraph');
      if (label) {
        label.textContent = isFavorite ? 'В избранном' : 'Добавить в избранное';
      }

      const iconWrapper = btn.querySelector('svg');
      if (iconWrapper) {
        const filledIcon = `
          <svg class="default-icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.875 7.17188C16.875 12.0938 9.57726 16.0777 9.26648 16.2422C9.18457 16.2863 9.09301 16.3093 9 16.3093C8.90699 16.3093 8.81543 16.2863 8.73352 16.2422C8.42273 16.0777 1.125 12.0938 1.125 7.17188C1.1263 6.0161 1.58601 4.90803 2.40327 4.09077C3.22053 3.27351 4.3286 2.8138 5.48438 2.8125C6.93633 2.8125 8.20758 3.43687 9 4.49227C9.79242 3.43687 11.0637 2.8125 12.5156 2.8125C13.6714 2.8138 14.7795 3.27351 15.5967 4.09077C16.414 4.90803 16.8737 6.0161 16.875 7.17188Z" fill="#3936FF" />
          </svg>`;
        const emptyIcon = `
          <svg class="default-icon"width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.5156 2.95312C11.0391 2.95312 9.75516 3.61898 9 4.73484C8.24484 3.61898 6.96094 2.95312 5.48438 2.95312C4.36589 2.95443 3.29359 3.39932 2.50271 4.19021C1.71182 4.98109 1.26693 6.05339 1.26562 7.17188C1.26562 9.225 2.54531 11.3618 5.06953 13.5218C6.22621 14.5074 7.47564 15.3787 8.80031 16.1234C8.8617 16.1563 8.93031 16.1736 9 16.1736C9.06969 16.1736 9.1383 16.1563 9.19969 16.1234C10.5244 15.3787 11.7738 14.5074 12.9305 13.5218C15.4547 11.3618 16.7344 9.225 16.7344 7.17188C16.7331 6.05339 16.2882 4.98109 15.4973 4.19021C14.7064 3.39932 13.6341 2.95443 12.5156 2.95312ZM9 15.2655C7.84617 14.5997 2.10938 11.0897 2.10938 7.17188C2.11031 6.27706 2.46618 5.41915 3.09892 4.78642C3.73165 4.15368 4.58956 3.79781 5.48438 3.79688C6.91031 3.79688 8.10773 4.55836 8.60977 5.78461C8.64155 5.86199 8.69562 5.92817 8.7651 5.97474C8.83459 6.02132 8.91635 6.04619 9 6.04619C9.08365 6.04619 9.16541 6.02132 9.2349 5.97474C9.30438 5.92817 9.35845 5.86199 9.39023 5.78461C9.89227 4.55836 11.0897 3.79688 12.5156 3.79688C13.4104 3.79781 14.2683 4.15368 14.9011 4.78642C15.5338 5.41915 15.8897 6.27706 15.8906 7.17188C15.8906 11.0897 10.1538 14.5997 9 15.2655Z" fill="#3936FF" />
          </svg>`;
        iconWrapper.outerHTML = isFavorite ? filledIcon : emptyIcon;
      }

      updateFavoritesCount(favoritesList);

      showNotification(itemName, isFavorite);
    })
    .catch(() => {
      alert('Ошибка при добавлении в избранное');
    });
}

function reinitProductBadgeFavorites() {
  const badgeBtns = document.querySelectorAll('.product__badges-to-favorites');
  badgeBtns.forEach(btn => {
    btn.removeEventListener('click', onHandleProductBadgeFavoriteClick);
    btn.addEventListener('click', onHandleProductBadgeFavoriteClick);
  });
}

document.addEventListener('DOMContentLoaded', reinitProductBadgeFavorites);
