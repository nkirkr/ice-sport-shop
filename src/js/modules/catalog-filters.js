export function initCatalogFilters() {
  // Mobile filters toggle (новая структура как в блоге)
  const mobileFiltersBtn = document.getElementById("mobile-filters-btn");
  const closeFiltersBtn = document.getElementById("close-filters-btn");
  const filtersPanel = document.getElementById("catalog-filters-mobile");
  const filtersWrapper = document.querySelector(".catalog__filters-wrapper");
  const catalogFiltersWrapper = document.querySelector(".catalog-filters-wrapper.acnav");
  const catalogMainList = catalogFiltersWrapper?.querySelector(".acnav__main-list");

  // Обработчик для открытия/закрытия фильтров (как в блоге)
  if (mobileFiltersBtn && catalogFiltersWrapper) {
    mobileFiltersBtn.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      catalogFiltersWrapper.classList.toggle("active");
      // Также добавляем класс is-open для .acnav__main-list
      if (catalogMainList) {
        catalogMainList.classList.toggle("is-open");
      }
    });
  }

  // Старый обработчик для десктопных фильтров
  if (mobileFiltersBtn && filtersPanel && !catalogFiltersWrapper) {
    mobileFiltersBtn.addEventListener("click", () => {
      filtersPanel.classList.add("is-open");
      document.body.style.overflow = "hidden";
    });
  }

  if (closeFiltersBtn && filtersPanel) {
    closeFiltersBtn.addEventListener("click", () => {
      filtersPanel.classList.remove("is-open");
      document.body.style.overflow = "";
    });
  }

  const dropdowns = document.querySelectorAll(".filter-dropdown");

  dropdowns.forEach((dropdown) => {
    const button = dropdown.querySelector(".filter-dropdown__button");
    const menu = dropdown.querySelector(".filter-dropdown__menu");

    if (!button || !menu) return;

    button.addEventListener("click", (e) => {
      e.stopPropagation();

      // Close other dropdowns
      dropdowns.forEach((other) => {
        if (other !== dropdown) {
          other.classList.remove("is-open");
        }
      });

      // Toggle current dropdown
      dropdown.classList.toggle("is-open");
    });
  });

  // Close dropdowns when clicking outside
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".filter-dropdown")) {
      dropdowns.forEach((dropdown) => {
        dropdown.classList.remove("is-open");
      });
    }
  });

  // Handle reset button
  const resetBtn = document.querySelector(".catalog-filters-new__reset");
  if (resetBtn) {
    resetBtn.addEventListener("click", () => {
      // Reset all checkboxes
      const checkboxes = document.querySelectorAll(
        '.filter-dropdown input[type="checkbox"]'
      );
      checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
      });

      // Reset price inputs
      const priceInputs = document.querySelectorAll(
        ".filter-price-range input"
      );
      priceInputs.forEach((input) => {
        input.value = "";
      });
    });
  }

  // Handle apply button
  const applyBtn = document.querySelector(".catalog-filters-new__apply");
  if (applyBtn) {
    applyBtn.addEventListener("click", () => {
      // Close all dropdowns
      dropdowns.forEach((dropdown) => {
        dropdown.classList.remove("is-open");
      });

      // Close mobile filters panel
      if (filtersPanel) {
        filtersPanel.classList.remove("is-open");
        document.body.style.overflow = "";
      }

      // Here you can add logic to apply filters
      console.log("Filters applied");
    });
  }

  // Аккордеоны для секций фильтров каталога (как в блоге)
  const filterSections = document.querySelectorAll(".catalog-filters__section");
  
  filterSections.forEach((section) => {
    const title = section.querySelector(".catalog-filters__title");
    const content = section.querySelector(".catalog-filters__content");
    const categories = section.querySelector(".catalog-filters__categories");
    
    if (!title) return;

    title.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      
      const isOpening = !section.classList.contains("is-open");
      section.classList.toggle("is-open");
      
      // Плавная анимация для контента
      if (content) {
        if (isOpening) {
          content.style.maxHeight = content.scrollHeight + 'px';
          content.style.opacity = '1';
        } else {
          content.style.maxHeight = '0px';
          content.style.opacity = '0';
        }
      }
      
      // Плавная анимация для категорий
      if (categories) {
        if (isOpening) {
          categories.style.maxHeight = categories.scrollHeight + 'px';
          categories.style.opacity = '1';
        } else {
          categories.style.maxHeight = '0px';
          categories.style.opacity = '0';
        }
      }
    });
  });
}
