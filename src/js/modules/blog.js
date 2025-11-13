const blogMenuBtn = document.querySelector(".blog__open-menu");
const blogMenu = document.querySelector(".blog__sidebar");
const blogSectionTitles = document.querySelectorAll(".blog__sidebar-title");
const blogSectionLists = document.querySelectorAll(".blog__sidebar-list");
const onToggleBlogMenu = () => {
  if (blogMenu.classList.contains("sidebar-visible")) {
    blogMenu.style.maxHeight = blogMenu.scrollHeight + "px";
    requestAnimationFrame(() => {
      blogMenu.style.maxHeight = "0px";
    });
    blogMenu.classList.remove("sidebar-visible");
  } else {
    blogMenu.style.maxHeight = blogMenu.scrollHeight + "px";
    blogMenu.classList.add("sidebar-visible");
  }
};

if (blogMenuBtn) {
  blogMenuBtn.addEventListener("click", onToggleBlogMenu);
}

// Инициализация фильтров блога
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("mobile-filters-toggle");
  const wrapper = document.querySelector(".blog-filters-wrapper.acnav");
  const mainList = wrapper?.querySelector(".acnav__main-list");

  if (!btn || !wrapper) return;

  btn.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();
    wrapper.classList.toggle("active");
    // Также добавляем класс is-open для .acnav__main-list
    if (mainList) {
      mainList.classList.toggle("is-open");
    }
  });
});

// Аккордеоны для секций фильтров блога
document.addEventListener("DOMContentLoaded", () => {
  // Аккордеоны общие
  const accordions = document.querySelectorAll(".accordion");

  accordions.forEach((el) => {
    el.addEventListener("click", (e) => {
      const self = e.currentTarget;
      const control = self.querySelector(".accordion__control");
      const content = self.querySelector(".accordion__content");

      self.classList.toggle("open");

      // если открыт аккордеон
      if (self.classList.contains("open")) {
        control.setAttribute("aria-expanded", true);
        content.setAttribute("aria-hidden", false);
        content.style.maxHeight = content.scrollHeight + "px";
      } else {
        control.setAttribute("aria-expanded", false);
        content.setAttribute("aria-hidden", true);
        content.style.maxHeight = null;
      }
    });
  });

  // Аккордеоны для секций фильтров блога (Категории, Метки, Лучшие статьи)
  const filterSections = document.querySelectorAll(".blog-filters__section");
  
  filterSections.forEach((section) => {
    const title = section.querySelector(".blog-filters__title");
    
    if (!title) return;

    title.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      section.classList.toggle("is-open");
    });
  });
});
