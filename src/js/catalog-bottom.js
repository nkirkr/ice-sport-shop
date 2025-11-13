import './modules/mob-menu.js';

// Переключение активных категорий
document.addEventListener('DOMContentLoaded', () => {
  const categoryGroups = document.querySelectorAll('.catalog-bottom__category-group');
  
  categoryGroups.forEach(group => {
    const links = group.querySelectorAll('.catalog-bottom__category-link');
    
    links.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        
        // Убираем активный класс у всех кнопок в этой группе
        links.forEach(l => l.classList.remove('catalog-bottom__category-link--active'));
        
        // Добавляем активный класс к нажатой кнопке
        link.classList.add('catalog-bottom__category-link--active');
      });
    });
  });
});

