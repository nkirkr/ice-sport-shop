import "./modules/scrollbar.js";
import "./modules/sidebar.js";
import "./modules/search.js";
import "./modules/catalog-menu.js";
import "./modules/mob-menu.js";
import Swiper from "swiper";
import { Navigation, FreeMode } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/free-mode";

// Product Gallery
const initProductGallery = () => {
  const mainImage = document.querySelector(".product-gallery__main-image");
  const thumbnails = document.querySelectorAll(".product-gallery__thumb");

  if (!mainImage || thumbnails.length === 0) return;

  thumbnails.forEach((thumb) => {
    thumb.addEventListener("click", () => {
      const imgSrc = thumb.querySelector("img").src;
      mainImage.src = imgSrc;

      // Remove active class from all thumbnails
      thumbnails.forEach((t) =>
        t.classList.remove("product-gallery__thumb--active")
      );
      // Add active class to clicked thumbnail
      thumb.classList.add("product-gallery__thumb--active");
    });
  });
};

// Size Selection
const initSizeSelection = () => {
  const sizeButtons = document.querySelectorAll(".product__size-btn");

  sizeButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      sizeButtons.forEach((b) =>
        b.classList.remove("product__size-btn--active")
      );
      btn.classList.add("product__size-btn--active");
    });
  });
};

// Color Selection
const initColorSelection = () => {
  const colorButtons = document.querySelectorAll(".product__color");
  const mainImage = document.querySelector(".product-gallery__main-image");

  if (!mainImage || colorButtons.length === 0) return;

  colorButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const bgImage = window.getComputedStyle(btn).backgroundImage;

      // Extract URL from url("...")
      let imageUrl = bgImage.match(/url\(["']?(.+?)["']?\)/)?.[1];

      // Remove quotes if present
      if (imageUrl) {
        imageUrl = imageUrl.replace(/['"]/g, "");

        // Convert relative path to absolute if needed
        if (!imageUrl.startsWith("http") && !imageUrl.startsWith("/")) {
          imageUrl = imageUrl.replace(/^\.\//, "");
          const currentPath = window.location.pathname.substring(
            0,
            window.location.pathname.lastIndexOf("/") + 1
          );
          imageUrl = currentPath + imageUrl;
        }

        mainImage.src = imageUrl;
      }

      colorButtons.forEach((b) => b.classList.remove("product__color--active"));
      btn.classList.add("product__color--active");
    });
  });
};

// Quantity Controls
const initQuantityControls = () => {
  const quantityWrappers = document.querySelectorAll(".quantity");

  quantityWrappers.forEach((wrapper) => {
    const input = wrapper.querySelector(".quantity__input");
    const buttons = wrapper.querySelectorAll(".quantity__btn");

    if (!input || buttons.length < 2) return;

    // First button is decrement, second is increment
    const [decButton, incButton] = buttons;

    decButton.addEventListener("click", () => {
      let value = parseInt(input.value);
      if (value > 1) {
        input.value = value - 1;
      }
    });

    incButton.addEventListener("click", () => {
      let value = parseInt(input.value);
      input.value = value + 1;
    });
  });
};

// Similar Products Swiper
const initSimilarProductsSwiper = () => {
  const similarProductsSlider = document.querySelector(
    ".similar-products__slider"
  );

  if (similarProductsSlider) {
    new Swiper(".similar-products__slider", {
      modules: [Navigation],
      slidesPerView: 4,
      spaceBetween: 14,
      navigation: {
        nextEl: ".similar-products__next",
        prevEl: ".similar-products__prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 12,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 14,
        },
      },
    });
  }
};

// Initialize all
document.addEventListener("DOMContentLoaded", () => {
  initProductGallery();
  initSizeSelection();
  initColorSelection();
  initQuantityControls();
  initSimilarProductsSwiper();
});
