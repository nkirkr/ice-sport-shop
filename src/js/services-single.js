import "./modules/scrollbar";
import "./modules/sidebar";
import "./modules/search";
import "./modules/mob-menu";
import "./modules/catalog-menu";
import { initModals } from "./modules/modal";
import { initBeforeAfterSliders } from "./modules/before-after-slider";
import "./modules/swipers";
import "./modules/faq";
import Swiper from "swiper";
import { Navigation } from "swiper/modules";

// Инициализация модалок
initModals();

// Инициализация before-after слайдеров

// Инициализация свайпера для документов
document.addEventListener("DOMContentLoaded", () => {
  initBeforeAfterSliders();
  const documentsContainer = document.querySelector("#documents-swiper");

  if (documentsContainer) {
    const updateSwiperParams = () => {
      const isMobile = window.innerWidth <= 768;
      return {
        slidesPerView: isMobile ? 1 : 4,
        spaceBetween: isMobile ? 0 : 13,
      };
    };

    const documentsSwiper = new Swiper("#documents-swiper", {
      modules: [Navigation],
      direction: "horizontal",
      loop: false,
      ...updateSwiperParams(),
      navigation: {
        nextEl: ".documents-next",
        prevEl: ".documents-prev",
      },
      autoHeight: true,
      speed: 400,
    });

    let resizeTimer;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        if (documentsSwiper) {
          const params = updateSwiperParams();
          documentsSwiper.params.slidesPerView = params.slidesPerView;
          documentsSwiper.params.spaceBetween = params.spaceBetween;
          documentsSwiper.update();
        }
      }, 250);
    });
  }

  // Инициализация свайпера для акций (service-promo__grid)
  const promoGrid = document.querySelector("#service-promo-swiper");

  if (promoGrid) {
    let promoSwiper = null;

    const initPromoSwiper = () => {
      const isMobile = window.innerWidth <= 768;
      
      if (isMobile && !promoSwiper) {
        // Инициализируем свайпер только на мобильной версии
        promoSwiper = new Swiper("#service-promo-swiper", {
          modules: [Navigation],
          direction: "horizontal",
          loop: false,
          slidesPerView: 1,
          spaceBetween: 20,
          autoHeight: true,
          speed: 400,
          navigation: {
            nextEl: ".service-promo__next",
            prevEl: ".service-promo__prev",
          },
        });
      } else if (!isMobile && promoSwiper) {
        // Уничтожаем свайпер на десктопе
        promoSwiper.destroy(true, true);
        promoSwiper = null;
      }
    };

    // Инициализация при загрузке
    initPromoSwiper();

    // Обработка изменения размера экрана
    let promoResizeTimer;
    window.addEventListener("resize", () => {
      clearTimeout(promoResizeTimer);
      promoResizeTimer = setTimeout(() => {
        initPromoSwiper();
      }, 250);
    });
  }
});
