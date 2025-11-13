# Руководство по верстке и натяжке интернет-магазина на WordPress

- Дизайн сайта: https://www.figma.com/design/Z8X72nROj7VaNaIayGMPT6/%D0%BF%D0%BB%D0%B8%D0%BD%D1%82%D1%83%D1%81?node-id=0-1&p=f&t=yxseWYiwvnyjY3Ay-0

## Общие правила
- Используем **чистый и читаемый код**.
- Соблюдаем **семантику HTML5** (`header`, `main`, `section`, `footer` и т.д.).
- Верстка **адаптивная** (320px – 1920px+).
- Поддержка последних версий **Chrome, Firefox, Safari, Edge**.
- Оптимизируем скорость загрузки: минификация, WebP, lazyload.

---

## Верстка
### Сетка и стили
- Используем **Flex/Grid** без лишних вложенностей.
- Методология CSS — **БЭМ** (`block__element--modifier`).
- Изображения: SVG для иконок, растровые в 1x/2x.
- Анимации только оптимизированные (CSS/JS, ≤200ms).

### SCSS структура
```
scss/
├─ base/          # базовые стили (reset, типографика, variables, mixins)
├─ components/    # отдельные блоки (кнопки, карточки, формы)
├─ layout/        # общие сетки, header, footer, sidebar
├─ pages/         # стили конкретных страниц
├─ utils/         # вспомогательные стили (helpers, z-index map и т.д.)
└─ main.scss      # главный файл для сборки
```

### JS структура
```
js/
├─ modules/       # отдельные модули (slider.js, cart.js, filters.js)
├─ utils/         # вспомогательные функции (debounce.js, api.js)
├─ vendor/        # сторонние библиотеки
└─ main.js        # точка входа, подключает модули
```
- Структура модульная (ES6 import/export).
- Без inline-скриптов.
- Минимум сторонних зависимостей.
- Проверяем консоль на ошибки.

---

## WordPress
### Тема
- Делаем **чистую тему** без готовых конструкторов.
- Поддержка `child theme`.

### Структура темы
```
theme/
├─ assets/
│  ├─ css/
│  ├─ js/
│  ├─ images/
│  └─ fonts/
├─ template-parts/
├─ woocommerce/     # кастомизация WooCommerce
├─ functions.php
├─ style.css
└─ index.php
```

### WooCommerce
- Используем хуки и шаблоны, ядро не трогаем.
- Кастомная логика — через `functions.php` или отдельные файлы-инклюды.

### Настройки
- Для мета-полей и настроек — **Carbon Fields**.
- Все данные через API, не в `wp_options`.

### Меню и навигация
- `register_nav_menus()` для нескольких меню.
- Кастомный `Walker` при необходимости.

### Поиск и фильтрация
- Поиск учитывает категории, атрибуты и фильтры.
- REST API для AJAX-фильтров.

### Кастомные пост-типы
- Регистрируем через `register_post_type()`.
- Таксономии — через `register_taxonomy()`.

### Безопасность и производительность
- Не использовать `query_posts()`, только `WP_Query`.
- Использовать `esc_html`, `wp_nonce` и т.п.
- Кэширование через `transients` или object cache.

---

## Именование
### CSS классы
- Используем **БЭМ**:
  - `block__element--modifier`
  - Пример: `product-card__title--big`
- Классы пишем **только латиницей**, через `-` или `_` (никаких camelCase).

### JS
- Переменные и функции: `camelCase` (`filterProducts`, `initSlider`).
- Константы: `SCREAMING_SNAKE_CASE`.
- Файлы JS: по функционалу (`cart.js`, `filters.js`).

### PHP
- Функции и хуки: `snake_case` с префиксом проекта.
  - Пример: `shop_get_product_meta()`
- Классы: `PascalCase`.
  - Пример: `Product_Filter`
- Шаблоны и части темы: `snake-case.php`.
  - Пример: `content-product.php`.

### Git
- Ветки:  
  - `develop` — основная рабочая.  
  - `main` — продакшн.  
- Дополнительные ветки делаем от `develop`:  
  - `feature/short-description`  
  - `fix/cart-bug`  
  - `hotfix/header-menu`  
- Коммиты:  
  - `feat: добавил фильтр по цене`  
  - `fix: исправил верстку корзины`  
  - `refactor: вынес стили кнопки в отдельный компонент`  

---

### CEO
- Общие требования:  
  - https://docs.360.yandex.ru/docs/view?url=ya-disk-public%3A%2F%2F1SaRZAIli519DLQJVUMn5m0AhW7k8h6GPGtNvvNQ6KcY67Vlu0tQSLoUcRKlkkUXq%2FJ6bpmRyOJonT3VoXnDag%3D%3D%3A%2F%D0%A1%D1%82%D1%80%D1%83%D0%BA%D1%82%D1%83%D1%80%D0%B0%20%D0%BA%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3%D0%B0%2C%20%D1%80%D0%BE%D1%83%D1%82%D0%B8%D0%BD%D0%B3.docx&name=%D0%A1%D1%82%D1%80%D1%83%D0%BA%D1%82%D1%83%D1%80%D0%B0%20%D0%BA%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3%D0%B0%2C%20%D1%80%D0%BE%D1%83%D1%82%D0%B8%D0%BD%D0%B3.docx&nosw=1  
- Метатеги 
  - https://docs.360.yandex.ru/docs/view?url=ya-disk-public%3A%2F%2F1SaRZAIli519DLQJVUMn5m0AhW7k8h6GPGtNvvNQ6KcY67Vlu0tQSLoUcRKlkkUXq%2FJ6bpmRyOJonT3VoXnDag%3D%3D%3A%2F%D0%A0%D0%B0%D0%B1%D0%BE%D1%82%D0%B0%20%D0%BC%D0%B5%D1%82%D0%B0%D1%82%D0%B5%D0%B3%D0%BE%D0%B2%2C%20%D0%B7%D0%B0%D0%B3%D0%BE%D0%BB%D0%BE%D0%B2%D0%BA%D0%BE%D0%B2%20h1.docx&name=%D0%A0%D0%B0%D0%B1%D0%BE%D1%82%D0%B0%20%D0%BC%D0%B5%D1%82%D0%B0%D1%82%D0%B5%D0%B3%D0%BE%D0%B2%2C%20%D0%B7%D0%B0%D0%B3%D0%BE%D0%BB%D0%BE%D0%B2%D0%BA%D0%BE%D0%B2%20h1.docx 
- Фильтры
  - https://docs.360.yandex.ru/docs/view?url=ya-disk-public%3A%2F%2F1SaRZAIli519DLQJVUMn5m0AhW7k8h6GPGtNvvNQ6KcY67Vlu0tQSLoUcRKlkkUXq%2FJ6bpmRyOJonT3VoXnDag%3D%3D%3A%2F%D0%9F%D1%80%D0%BE%D0%B5%D0%BA%D1%82%20%D1%84%D0%B8%D0%BB%D1%8C%D1%82%D1%80%D0%BE%D0%B2.docx&name=%D0%9F%D1%80%D0%BE%D0%B5%D0%BA%D1%82%20%D1%84%D0%B8%D0%BB%D1%8C%D1%82%D1%80%D0%BE%D0%B2.docx 
- Доплнтельная информация по общей ссылке 
  - https://disk.360.yandex.ru/d/8rU7PSelFxyNiw

---

## Git Workflow
1. Вся работа ведется в `develop`.  
2. Завершённые задачи пушим в отдельные ветки и мержим в `develop` через Pull Request.  
3. После тестирования `develop` вливается в `main`.  
4. Прямые коммиты в `main` запрещены.  

---

## Чеклист перед сдачей
- [ ] Вёрстка адаптивная, валидная.
- [ ] Нет ошибок в консоли.
- [ ] Все стили и скрипты подключены правильно.
- [ ] Изображения оптимизированы.
- [ ] Проверено на кроссбраузерность.
- [ ] Нет правок ядра WP и WooCommerce.
- [ ] Именование классов и функций соответствует правилам.
- [ ] SCSS и JS разложены по структуре.

