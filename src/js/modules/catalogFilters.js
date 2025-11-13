// (function($) {

//   const MOBILE_BREAKPOINT = 768;
//   let isMobile = $(window).width() <= MOBILE_BREAKPOINT;

//   // === функция включения аккордеонов ===
//   function enableMobileAccordion() {
//     console.log("🎯 Вешаю обработчики аккордеонов (jQuery)");
    
//     $('.filters__main-label').each(function() {
//       const $mainLabel = $(this);
//       let $mainList = $mainLabel.next();

//       if (!$mainList.length) return;

//       if (!$mainList.hasClass('filters__main-list')) {
//         $mainList = $mainList.find('.filters__main-list').first();
//       }

//       if (!$mainList.length) return;

//       $mainLabel.off('click.accordion').on('click.accordion', function(e) {
//         // предотвращаем конфликт с другими кликами
//         if ($(e.target).closest('.acnav__label').length && !$(e.target).hasClass('filters__main-label')) {
//           return;
//         }

//         e.stopPropagation();

//         if ($mainList.hasClass('is-open')) {
//           $mainList.slideUp(200).removeClass('is-open');
//           $mainLabel.removeClass('is-open');
//         } else {
//           $mainList.slideDown(200).addClass('is-open');
//           $mainLabel.addClass('is-open');
//         }
//       });
//     });
//   }

//   // === функция выключения аккордеонов ===
//   function disableMobileAccordion() {
//     console.log("🔕 Убираю обработчики аккордеонов");
//     $('.filters__main-label').each(function() {
//       const $mainLabel = $(this);
//       let $mainList = $mainLabel.next();

//       if (!$mainList.length) return;

//       if (!$mainList.hasClass('filters__main-list')) {
//         $mainList = $mainList.find('.filters__main-list').first();
//       }

//       if (!$mainList.length) return;

//       $mainList.removeAttr('style').removeClass('is-open');
//       $mainLabel.removeClass('is-open').off('click.accordion');
//     });
//   }

//   // === первичная инициализация ===
//   if (isMobile) enableMobileAccordion();

//   // === при изменении ширины экрана ===
//   $(window).on('resize', function() {
//     const nowMobile = $(window).width() <= MOBILE_BREAKPOINT;
//     if (nowMobile && !isMobile) {
//       enableMobileAccordion();
//     } else if (!nowMobile && isMobile) {
//       disableMobileAccordion();
//     }
//     isMobile = nowMobile;
//   });

//   // === перевешивание после AJAX фильтрации ===
//   $(document).on('ready', function() {
//     console.log("♻️ AJAX фильтрация завершена — перевешиваю аккордеоны");
//     if (isMobile) {
//       disableMobileAccordion();
//       enableMobileAccordion();
//     }
//   });

// })(jQuery);

