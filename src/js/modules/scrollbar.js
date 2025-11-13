import 'overlayscrollbars/overlayscrollbars.css';
import { OverlayScrollbars } from 'overlayscrollbars';

const scrollbarOptions = {
  scrollbars: {
    visibility: 'auto',
    autoHide: 'leave',
    autoHideDelay: 500,
  },
};

// let cartScrollbar = null;
// const favoritesListEl = document.querySelector('#favorites-list');
// function initCartScrollbar() {
//     const cartListEl = document.querySelector('.widget_shopping_cart_content');
    
//     if (!cartListEl) return;
    
//     if (cartScrollbar && OverlayScrollbars.valid(cartScrollbar)) {
//         cartScrollbar.destroy();
//     }
    
//     cartScrollbar = OverlayScrollbars(cartListEl, scrollbarOptions);
// }

// document.addEventListener('DOMContentLoaded', initCartScrollbar);

// jQuery(document.body).on('wc_fragments_refreshed wc_fragments_loaded', function () {
//     initCartScrollbar();
// });

// const favoritesScrollbar = favoritesListEl ? OverlayScrollbars(favoritesListEl, scrollbarOptions) : null;
