import "./modules/swipers.js";
// import './modules/map.js';
import "./modules/inputmask.js";
import "./modules/quantity.js";
import "./modules/scrollbar.js";
import "./modules/sidebar.js";
import "./modules/search.js";
import "./modules/catalog-menu.js";
import "./modules/mob-menu.js";
import { initModals } from "./modules/modal.js";

// Инициализация модальных окон
initModals();

// Плавная прокрутка к секции контактов при клике на кнопку "Перезвоните мне"
document.addEventListener("DOMContentLoaded", () => {
  const heroCTABtn = document.querySelector(".hero__cta-btn");
  const contactSection = document.getElementById("contact-section");

  if (heroCTABtn && contactSection) {
    heroCTABtn.addEventListener("click", (e) => {
      e.preventDefault();
      contactSection.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    });
  }
});
