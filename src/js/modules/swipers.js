import Swiper from "swiper";
import { Navigation, Pagination, Autoplay, Mousewheel } from "swiper/modules";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

function lazyInitSwiper(selector, modules, options) {
  const el = document.querySelector(selector);
  if (!el) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          new Swiper(el, { modules, ...options });
          observer.unobserve(el);
        }
      });
    },
    {
      root: null,
      rootMargin: "200px 0px 200px 0px",
      threshold: 0.01,
    }
  );

  observer.observe(el);
}

const isMobile = window.innerWidth <= 768;

lazyInitSwiper("#hero-swiper", [Navigation, Pagination, Autoplay], {
  direction: "horizontal",
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: isMobile
    ? false
    : {
        delay: 3000,
        disableOnInteraction: false,
      },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoHeight: true,
  speed: 400,
});

lazyInitSwiper("#gallery-swiper", [Navigation, Pagination, Autoplay], {
  direction: "horizontal",
  loop: true,
  slidesPerView: "auto",
  autoplay: isMobile
    ? false
    : {
        delay: 3000,
        disableOnInteraction: false,
      },
  navigation: {
    nextEl: "#gallery-next",
    prevEl: "#gallery-prev",
  },
  pagination: {
    el: "#gallery-pagination",
    clickable: true,
    renderBullet(index, className) {
      return `
        <span class="${className}">
          <span class="bullet-progress"></span>
        </span>`;
    },
  },
  on: {
    autoplayTimeLeft(swiper, time, progress) {
      if (isMobile) return;

      document.querySelectorAll(".bullet-progress").forEach((el) => {
        el.style.transform = "scaleX(0)";
      });

      const activeBullet = document.querySelector(
        "#gallery-pagination .swiper-pagination-bullet-active .bullet-progress"
      );
      if (activeBullet) {
        activeBullet.style.transform = `scaleX(${1 - progress})`;
      }
    },
  },
});

lazyInitSwiper("#reviews-swiper", [Navigation, Mousewheel], {
  direction: "horizontal",
  loop: false,
  slidesPerView: "auto",
  mousewheel: true,
  navigation: {
    nextEl: "#reviews-next",
    prevEl: "#reviews-prev",
  },
});

// Running reviews marquee
lazyInitSwiper(".reviews__swiper", [Autoplay], {
  slidesPerView: "auto",
  spaceBetween: 30,
  loop: true,
  speed: 5000,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: false,
  },
  allowTouchMove: true,
  freeMode: true,
  freeModeMomentum: false,
  cssMode: false,
});
