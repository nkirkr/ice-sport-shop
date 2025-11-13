import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Инициализация слайдера только на десктопе
const initOtherPublications = () => {
  const swiperEl = document.querySelector('#swiper-other');
  if (!swiperEl) return;

  const isMobile = window.matchMedia('(max-width: 768px)').matches;
  
  // На мобилке не инициализируем слайдер
  if (isMobile) {
    return;
  }

  // На десктопе инициализируем слайдер
  new Swiper('#swiper-other', {
    modules: [Navigation, Pagination],
    loop: false,
    spaceBetween: 13,
    slidesPerView: 4,
    navigation: {
      nextEl: '#reviews-next',
      prevEl: '#reviews-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
};

document.addEventListener('DOMContentLoaded', initOtherPublications);
window.addEventListener('resize', () => {
  // Переинициализация при изменении размера окна
  const swiperEl = document.querySelector('#swiper-other');
  if (swiperEl && swiperEl.swiper) {
    swiperEl.swiper.destroy(true, true);
  }
  initOtherPublications();
});
