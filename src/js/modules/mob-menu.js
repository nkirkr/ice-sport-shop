import { slideUp, slideDown } from "../utils/utils";

document.addEventListener('DOMContentLoaded', () => {
  const openMobMenuBtn = document.querySelector('.header__burger');
  const mobMenu = document.querySelector('.mob-menu');
  const searchBtn = document.querySelector('.header__mobile-btn--search');
  const mobMenuNav = document.querySelector('.mob-menu__nav');
  const mobMenuHeader = document.querySelector('.mob-menu__header');

  if (!mobMenu) return;

  // Логика для бургер-меню
  if (openMobMenuBtn) {
    const onToggleMenu = () => {
      const isOpening = !mobMenu.classList.contains('mob-menu--visible');
      
      mobMenu.classList.toggle('mob-menu--visible');
      openMobMenuBtn.classList.toggle('is-opened');

      // Сбрасываем режим поиска при открытии/закрытии бургер-меню
      if (mobMenuNav) {
        mobMenuNav.style.display = '';
      }
      if (mobMenuHeader) {
        mobMenuHeader.style.backgroundColor = '';
      }
      if (searchBtn) {
        searchBtn.classList.remove('is-active');
      }

      // Toggle body scroll
      if (mobMenu.classList.contains('mob-menu--visible')) {
        document.body.style.overflow = 'hidden';
        document.documentElement.style.overflow = 'hidden';
      } else {
        document.body.style.overflow = '';
        document.documentElement.style.overflow = '';
      }
    };

    openMobMenuBtn.addEventListener('click', onToggleMenu);
  }

  // Логика для кнопки поиска
  if (searchBtn && mobMenuNav && mobMenuHeader) {
    const onToggleSearch = () => {
      const isOpening = !mobMenu.classList.contains('mob-menu--visible') || !searchBtn.classList.contains('is-active');
      
      if (isOpening) {
        // Если бургер-меню открыто, сначала закрываем его
        if (openMobMenuBtn && openMobMenuBtn.classList.contains('is-opened')) {
          openMobMenuBtn.classList.remove('is-opened');
        }
        
        // Сразу убираем фон у mob-menu
        mobMenu.style.backgroundColor = 'transparent';
        
        // Открываем mob-menu
        mobMenu.classList.add('mob-menu--visible');
        searchBtn.classList.add('is-active');
        
        // Скрываем навигацию
        mobMenuNav.style.display = 'none';
        
        // Устанавливаем фон для header
        mobMenuHeader.style.backgroundColor = 'var(--white-light)';
        
        // Блокируем скролл
        document.body.style.overflow = 'hidden';
        document.documentElement.style.overflow = 'hidden';
        
        // Фокус на поле поиска
        setTimeout(() => {
          const searchField = mobMenuHeader.querySelector('.mob-menu__search-field');
          if (searchField) searchField.focus();
        }, 100);
      } else {
        // Сначала мгновенно скрываем навигацию и ее фон через opacity
        if (mobMenuNav) {
          mobMenuNav.style.opacity = '0';
          mobMenuNav.style.visibility = 'hidden';
        }
        
        // Восстанавливаем фон header
        if (mobMenuHeader) {
          mobMenuHeader.style.backgroundColor = '';
        }
        
        // Затем закрываем mob-menu
        mobMenu.classList.remove('mob-menu--visible');
        searchBtn.classList.remove('is-active');
        
        // Закрываем бургер-меню если оно было открыто
        if (openMobMenuBtn && openMobMenuBtn.classList.contains('is-opened')) {
          openMobMenuBtn.classList.remove('is-opened');
        }
        
        // Разблокируем скролл
        document.body.style.overflow = '';
        document.documentElement.style.overflow = '';
        
        // Восстанавливаем фон mob-menu и навигацию после завершения анимации закрытия
        setTimeout(() => {
          mobMenu.style.backgroundColor = '';
          if (mobMenuNav) {
            mobMenuNav.style.opacity = '';
            mobMenuNav.style.visibility = '';
          }
        }, 300);
      }
    };

    searchBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      onToggleSearch();
    });

    // Закрытие по Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobMenu.classList.contains('mob-menu--visible') && searchBtn.classList.contains('is-active')) {
        onToggleSearch();
      }
    });
  }

  // Используем делегирование событий для обработки кликов на аккордеоны
  mobMenu.addEventListener('click', (e) => {

    // Обработка кликов на .acnav__label
    const label = e.target.closest('.acnav__label');
    if (label && mobMenu.contains(label)) {
      e.preventDefault();
      e.stopPropagation();
      const parent = label.closest('.has-children');
      const list = parent?.querySelector('.acnav__list');
      if (!list) return;
      const isOpen = parent.classList.toggle('is-open');
      isOpen ? slideDown(list) : slideUp(list);
      return;
    }

    // Обработка кликов на .acnav__main-label
    const mainLabel = e.target.closest('.acnav__main-label');
    if (mainLabel && mobMenu.contains(mainLabel)) {
      e.preventDefault();
      e.stopPropagation();
      const acnav = mainLabel.closest('.acnav');
      if (!acnav) return;
      const mainList = acnav.querySelector('.acnav__main-list');
      if (!mainList) return;
      const isOpen = mainList.classList.toggle('is-open');
      mainLabel.classList.toggle('is-open', isOpen);
      isOpen ? slideDown(mainList) : slideUp(mainList);
      return;
    }
  });
});
