const cart = document.querySelector('.cart.sidebar');
const favorites = document.querySelector('.favorites');
const closeCartBtn = document.querySelector('#cart-close');
const closeFavoritesBtn = document.querySelector('#favorites-close');
const overlay = document.querySelector('.overlay');

const openModal = (modalElement, closeButton) => {
  document.body.style.overflow = 'hidden';
  document.documentElement.style.overflow = 'hidden';
  overlay.classList.add('overlay--active');
  modalElement.classList.add(`${modalElement.classList[0]}--opened`);

  const closeModal = () => {
    document.body.style.overflow = '';
    document.documentElement.style.overflow = '';
    overlay.classList.remove('overlay--active');
    modalElement.classList.remove(`${modalElement.classList[0]}--opened`);
    closeButton.removeEventListener('click', closeModal);
  };

  closeButton.addEventListener('click', closeModal);
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) closeModal();
  });
};

document.addEventListener('click', (e) => {
  // Desktop cart button
  if (e.target.closest('#cart-btn') || e.target.closest('#mobile-cart-btn')) {
    e.preventDefault();
    if (cart && closeCartBtn) openModal(cart, closeCartBtn);
  }

  // Desktop & mobile favorites button
  if (e.target.closest('#favorites-btn') || e.target.closest('#mobile-favorites-btn')) {
    e.preventDefault();
    if (favorites && closeFavoritesBtn) openModal(favorites, closeFavoritesBtn);
  }
});
