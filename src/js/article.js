import "./modules/scrollbar.js";
import "./modules/sidebar.js";
import "./modules/search.js";
import "./modules/catalog-menu.js";
import "./modules/mob-menu.js";
import "./modules/audio";
import "./modules/video";
import { initModals } from "./modules/modal";
import Swiper from "swiper";
import { Navigation } from "swiper/modules";

import "swiper/css";
import "swiper/css/navigation";

const galleryEl = document.querySelector("#article-gallery");

if (galleryEl) {
  const articleGallery = new Swiper(galleryEl, {
    modules: [Navigation],
    direction: "horizontal",
    loop: false,
    slidesPerView: 4,
    spaceBetween: 14,
    navigation: {
      nextEl: ".article-gallery__next",
      prevEl: ".article-gallery__prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 14,
      },
    },
  });

  window.addEventListener("resize", () => {
    articleGallery.update();
  });
}

// Инициализация модалок
initModals();
