import { slideUp, slideDown } from "../utils/utils";

document.addEventListener("DOMContentLoaded", () => {
  const MOBILE_BREAKPOINT = 768;
  const openMenuBtn = document.querySelector(".header__nav-link--catalog");
  const menu = document.querySelector(".menu");
  const search = document.querySelector(".header__search");
  const menuOverlay = document.querySelector(".overlay");
  const catWrapper = document.querySelector(".menu__nav-wrap");
  const header = document.querySelector(".header");

  if (!menu || !header) return; 

  const style = document.createElement("style");
  style.textContent = `
    .acnav__list {
      overflow: hidden;
      box-sizing: border-box;
    }
  `;
  document.head.appendChild(style);

  let isMobile = window.innerWidth <= MOBILE_BREAKPOINT;
  let mobileHandlersBound = false;
  let desktopHandlersBound = false;

  // Функция updateIconState больше не нужна для новой структуры меню
  function updateIconState(wrapper, isActive) {
    // Не используется в новом дизайне
  }

  function initMobileMenu() {
    if (mobileHandlersBound) return;
    mobileHandlersBound = true;

    document.querySelectorAll(".acnav__label").forEach((label) => {
      // Пропускаем элементы внутри мобильного меню
      if (label.closest(".mob-menu")) {
        return;
      }
      const handler = () => {
        const parent = label.closest(".has-children");
        const list = parent?.querySelector(".acnav__list");
        if (!list) return;
        const isOpen = parent.classList.toggle("is-open");
        isOpen ? slideDown(list) : slideUp(list);
      };
      label._handler = handler;
      label.addEventListener("click", handler);
    });

    document.querySelectorAll(".acnav__main-label").forEach((mainLabel) => {
      // Пропускаем кнопку фильтров блога, кнопку каталога в header и элементы внутри мобильного меню
      if (
        mainLabel.classList.contains("blog-filters__open") || 
        mainLabel.id === "mobile-filters-toggle" ||
        mainLabel.classList.contains("header__nav-link--catalog") ||
        mainLabel.closest(".mob-menu")
      ) {
        return;
      }
      const sibling = mainLabel.nextElementSibling;
      const mainList = sibling?.querySelector(".acnav__main-list");
      if (!mainList) return;
      const handler = () => {
        const isOpen = mainList.classList.toggle("is-open");
        if (mainList.closest(".header__catalog")) {
          menuOverlay?.classList.toggle("overlay--visible", isOpen);
        }
        mainLabel.classList.toggle("is-open", isOpen);
        header.classList.toggle("header--no-shadow", isOpen);
        isOpen ? slideDown(mainList) : slideUp(mainList);
      };
      mainLabel._handler = handler;
      mainLabel.addEventListener("click", handler);
    });

    // Мобильная логика для показа/скрытия подкатегорий
    if (catWrapper) {
      catWrapper.querySelectorAll(".menu__item-wrapper").forEach((item) => {
        const handler = (evt) => {
          if (evt.target.closest(".menu__categories a")) return;
          evt.preventDefault();
          const categories = item.querySelector(".menu__categories");
          if (!categories) return;
          
          // Закрываем все другие категории
          catWrapper.querySelectorAll(".menu__item-wrapper").forEach((otherItem) => {
            if (otherItem !== item) {
              const otherCategories = otherItem.querySelector(".menu__categories");
              if (otherCategories) {
                otherCategories.style.display = "none";
              }
            }
          });
          
          // Переключаем текущую категорию
          const isVisible = categories.style.display === "block";
          categories.style.display = isVisible ? "none" : "block";
        };
        item._handler = handler;
        item.addEventListener("click", handler);
      });
    }
  }

  function destroyMobileMenu() {
    if (!mobileHandlersBound) return;
    mobileHandlersBound = false;
    document.querySelectorAll(".acnav__label, .acnav__main-label").forEach((el) => {
      if (el._handler) {
        el.removeEventListener("click", el._handler);
        delete el._handler;
      }
    });
    if (catWrapper) {
      catWrapper.querySelectorAll(".menu__item-wrapper").forEach((item) => {
        if (item._handler) {
          item.removeEventListener("click", item._handler);
          delete item._handler;
        }
      });
    }
  }

  // --- десктопное меню ---
  function initDesktopMenu() {
    if (desktopHandlersBound) return;
    desktopHandlersBound = true;

    // Проверяем наличие элементов
    if (!openMenuBtn || !menu || !menuOverlay) {
      return;
    }

    // Открытие меню при наведении
    openMenuBtn.addEventListener("mouseenter", () => {
      menu.classList.add("menu--visible");
      header.classList.add("header--menu-opened");
    });

    // Закрытие меню при уходе курсора
    const menuContainer = openMenuBtn.closest(".header__nav-item");
    if (menuContainer) {
      let closeTimeout;
      
      const handleMouseLeave = () => {
        closeTimeout = setTimeout(() => {
          menu.classList.remove("menu--visible");
          header.classList.remove("header--menu-opened");
        }, 100);
      };

      menuContainer.addEventListener("mouseleave", handleMouseLeave);
      menu.addEventListener("mouseenter", () => {
        clearTimeout(closeTimeout);
      });
      menu.addEventListener("mouseleave", handleMouseLeave);
    }

    // Клик на кнопку "Каталог" - переход на страницу каталога (если меню не открыто)
    openMenuBtn.addEventListener("click", (e) => {
      // Если меню открыто, не переходим
      if (menu.classList.contains("menu--visible")) {
        e.preventDefault();
        return;
      }
      // Разрешаем стандартный переход по ссылке
    });

    if (search) {
      search._safeHandler = (evt) => {
        if (header.classList.contains("header--menu-opened")) {
          evt.stopPropagation();
          evt.preventDefault();
          search.classList.add("is-disabled");
          setTimeout(() => search.classList.remove("is-disabled"), 200);
          return false;
        }
      };
      search.addEventListener("click", search._safeHandler, true);
    }

    // Обработчик hover на пункты меню для открытия подменю
    const menuItems = menu.querySelectorAll(".menu__item-wrapper");
    const allCategories = menu.querySelectorAll(".menu__categories");
    
    menuItems.forEach((itemWrapper) => {
      const itemLink = itemWrapper.querySelector(".menu__item-link");
      const category = itemWrapper.getAttribute("data-category");
      
      if (itemLink && category) {
        // Открытие подменю при наведении
        itemWrapper.addEventListener("mouseenter", () => {
          // Закрываем все другие открытые подменю
          menuItems.forEach((otherItem) => {
            if (otherItem !== itemWrapper) {
              otherItem.classList.remove("is-active");
            }
          });
          
          allCategories.forEach((cat) => {
            cat.style.display = "none";
          });
          
          // Показываем подменю для выбранного пункта
          const targetCategories = menu.querySelector(`.menu__categories[data-category="${category}"]`);
          if (targetCategories) {
            itemWrapper.classList.add("is-active");
            targetCategories.style.display = "block";
            
            // Показываем первый подраздел по умолчанию
            const firstSubsection = targetCategories.querySelector('.menu__categories-title[data-subsection="0"]');
            if (firstSubsection) {
              // Убираем активный класс у всех подразделов
              targetCategories.querySelectorAll(".menu__categories-column--subsections .menu__categories-title").forEach((t) => {
                t.classList.remove("is-active");
              });
              
              // Добавляем активный класс к первому подразделу
              firstSubsection.classList.add("is-active");
              
              // Скрываем все блоки подкатегорий
              targetCategories.querySelectorAll(".menu__categories-wrapper").forEach((wrapper) => {
                wrapper.style.display = "none";
              });
              
              // Показываем первый блок подкатегорий
              const firstWrapper = targetCategories.querySelector('.menu__categories-wrapper[data-subsection="0"]');
              if (firstWrapper) {
                firstWrapper.style.display = "flex";
              }
            }
          }
        });

        // Клик на пункт меню - переход по ссылке (если есть href)
        if (itemLink.tagName === 'A' && itemLink.href) {
          itemLink.addEventListener("click", (e) => {
            // Разрешаем стандартный переход по ссылке
            // Не предотвращаем событие
          });
        }
      }
    });
    
    // Обработчик наведения на подразделы для показа подкатегорий
    menu.querySelectorAll(".menu__categories-column--subsections .menu__categories-title").forEach((title) => {
      title.addEventListener("mouseenter", () => {
        // Находим родительскую категорию
        const parentCategory = title.closest(".menu__categories");
        if (!parentCategory) return;
        
        const subsection = title.getAttribute("data-subsection");
        if (subsection === null) return;
        
        // Убираем активный класс у всех подразделов в текущей категории
        parentCategory.querySelectorAll(".menu__categories-column--subsections .menu__categories-title").forEach((t) => {
          t.classList.remove("is-active");
        });
        
        // Добавляем активный класс к наведенному подразделу
        title.classList.add("is-active");
        
        // Скрываем все блоки подкатегорий в текущей категории
        parentCategory.querySelectorAll(".menu__categories-wrapper").forEach((wrapper) => {
          wrapper.style.display = "none";
        });
        
        // Показываем блок подкатегорий с соответствующим data-subsection
        const targetWrapper = parentCategory.querySelector(`.menu__categories-wrapper[data-subsection="${subsection}"]`);
        if (targetWrapper) {
          targetWrapper.style.display = "flex";
        }
      });
      
      // Обработчик клика на подразделы для перехода
      title.addEventListener("click", (e) => {
        // Если это ссылка, разрешаем стандартный переход
        if (title.tagName === 'A' && title.href) {
          // Убираем активный класс у всех подразделов во ВСЕХ категориях
          menu.querySelectorAll(".menu__categories-column--subsections .menu__categories-title").forEach((t) => {
            t.classList.remove("is-active");
          });
          
          // Добавляем активный класс к выбранному подразделу
          title.classList.add("is-active");
          
          // Обновляем отображение подкатегорий
          const parentCategory = title.closest(".menu__categories");
          if (parentCategory) {
            const subsection = title.getAttribute("data-subsection");
            if (subsection !== null) {
              parentCategory.querySelectorAll(".menu__categories-wrapper").forEach((wrapper) => {
                wrapper.style.display = "none";
              });
              
              const targetWrapper = parentCategory.querySelector(`.menu__categories-wrapper[data-subsection="${subsection}"]`);
              if (targetWrapper) {
                targetWrapper.style.display = "flex";
              }
            }
          }
          
          // Разрешаем стандартный переход по ссылке
          return;
        }
        
        // Если это не ссылка, предотвращаем стандартное поведение
        e.preventDefault();
        e.stopPropagation();
        
        // Убираем активный класс у всех подразделов во ВСЕХ категориях
        menu.querySelectorAll(".menu__categories-column--subsections .menu__categories-title").forEach((t) => {
          t.classList.remove("is-active");
        });
        
        // Добавляем активный класс к выбранному подразделу
        title.classList.add("is-active");
        
        // Обновляем отображение подкатегорий
        const parentCategory = title.closest(".menu__categories");
        if (parentCategory) {
          const subsection = title.getAttribute("data-subsection");
          if (subsection !== null) {
            parentCategory.querySelectorAll(".menu__categories-wrapper").forEach((wrapper) => {
              wrapper.style.display = "none";
            });
            
            const targetWrapper = parentCategory.querySelector(`.menu__categories-wrapper[data-subsection="${subsection}"]`);
            if (targetWrapper) {
              targetWrapper.style.display = "flex";
            }
          }
        }
      });
    });
  }

  function destroyDesktopMenu() {
    if (!desktopHandlersBound) return;
    desktopHandlersBound = false;
    if (openMenuBtn?._handler) {
      openMenuBtn.removeEventListener("click", openMenuBtn._handler);
      delete openMenuBtn._handler;
    }
    if (search?._safeHandler) {
      search.removeEventListener("click", search._safeHandler, true);
      delete search._safeHandler;
    }
    // Обработчики hover больше не используются
  }

  function checkMode() {
    const nowMobile = window.innerWidth <= MOBILE_BREAKPOINT;
    if (nowMobile && !isMobile) {
      destroyDesktopMenu();
      initMobileMenu();
    } else if (!nowMobile && isMobile) {
      destroyMobileMenu();
      initDesktopMenu();
    }
    isMobile = nowMobile;
  }

  isMobile ? initMobileMenu() : initDesktopMenu();

  let resizeTimer;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(checkMode, 200);
  });
});
