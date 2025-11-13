document.addEventListener('DOMContentLoaded', () => {
  // Desktop search
  const searchForm = document.querySelector('.header__search');
  const openSearchBtn = document.querySelector('#search-btn');
  const searchWrapper = document.querySelector('.header__search-wrapper');

  if (searchForm && openSearchBtn && searchWrapper) {
    let isSearchOpen = false;

    // Desktop: open search on button click
    openSearchBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      isSearchOpen = !isSearchOpen;
      
      if (isSearchOpen) {
        searchWrapper.classList.add('search-opened');
        searchForm.classList.add('header__search--opened');
        setTimeout(() => {
          const input = searchForm.querySelector('input');
          if (input) input.focus();
        }, 100);
      } else {
        searchWrapper.classList.remove('search-opened');
        searchForm.classList.remove('header__search--opened');
      }
    });

    // Close search when clicking outside
    document.addEventListener('click', (e) => {
      if (isSearchOpen && !searchWrapper.contains(e.target)) {
        searchWrapper.classList.remove('search-opened');
        searchForm.classList.remove('header__search--opened');
        isSearchOpen = false;
      }
    });

    // Prevent closing when clicking inside search form
    searchForm.addEventListener('click', (e) => {
      e.stopPropagation();
    });

    // Close on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && isSearchOpen) {
        searchWrapper.classList.remove('search-opened');
        searchForm.classList.remove('header__search--opened');
        isSearchOpen = false;
      }
    });
  }

});
