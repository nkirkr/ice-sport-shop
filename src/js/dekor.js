import Swiper from 'swiper';
import { Navigation, Mousewheel } from 'swiper/modules';
import 'swiper/css';
import './modules/faq';
import './modules/inputmask.js';
import './modules/mob-menu.js';
import './modules/catalog-menu.js';
import './modules/sidebar.js';
import './modules/scrollbar.js';
import './modules/search.js';

const isMobile = window.innerWidth <= 768;

function initSwiper(selector, options) {
  const container = document.querySelector(selector);
  if (!container) {
    return null;
  }

  try {
    return new Swiper(container, options);
  } catch (error) {
    return null;
  }
}

const reviewsSwiper = initSwiper('#reviews-swiper', {
  modules: [Navigation, Mousewheel],
  direction: 'horizontal',
  loop: false,
  slidesPerView: 'auto',
  mousewheel: true,
  navigation: {
    nextEl: '#reviews-next',
    prevEl: '#reviews-prev',
  },
});

const documentsSwiper = initSwiper('#documents-swiper', {
  modules: [Navigation],
  direction: 'horizontal',
  loop: false,
  slidesPerView: !isMobile ? 4 : 1,
  spaceBetween: 13,
  navigation: {
    nextEl: '.documents-next',
    prevEl: '.documents-prev',
  },
  autoHeight: true,
  speed: 400,
});

window.addEventListener('resize', () => {
  try {
    if (documentsSwiper && typeof documentsSwiper.update === 'function') {
      documentsSwiper.update();
    }
  } catch (error) {
  }
});
