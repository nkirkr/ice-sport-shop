import "./modules/scrollbar";
import "./modules/sidebar";
import "./modules/search";
import "./modules/mob-menu";
import "./modules/catalog-menu";
import initForms from "./modules/forms";
import { initModals } from "./modules/modal";

document.addEventListener('DOMContentLoaded', () => {
    initModals();
    initForms();
})