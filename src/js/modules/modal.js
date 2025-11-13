// Модальные окна
export function initModals() {
  const modals = document.querySelectorAll(".modal");
  const openButtons = document.querySelectorAll("[data-modal-open]");
  const closeButtons = document.querySelectorAll("[data-modal-close]");

  // Открытие модалки
  openButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      const modalName = button.getAttribute("data-modal-open");
      const modal = document.querySelector(`[data-modal="${modalName}"]`);
      if (modal) {
        openModal(modal);
      }
    });
  });

  // Закрытие модалки
  closeButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      const modal = button.closest(".modal");
      if (modal) {
        closeModal(modal);
      }
    });
  });

  // Закрытие по Escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      const activeModal = document.querySelector(".modal.active");
      if (activeModal) {
        closeModal(activeModal);
      }
    }
  });

  // Обработка отправки формы
  const callbackForm = document.getElementById("callback-form");
  if (callbackForm) {
    callbackForm.addEventListener("submit", (e) => {
      e.preventDefault();

      const formData = new FormData(callbackForm);
      const name = formData.get("name");
      const phone = formData.get("phone");

      console.log("Форма отправлена:", { name, phone });

      // Здесь будет отправка на сервер
      // После успешной отправки:
      alert("Спасибо! Мы свяжемся с вами в ближайшее время.");

      const modal = callbackForm.closest(".modal");
      closeModal(modal);
      callbackForm.reset();
    });
  }
}

function openModal(modal) {
  modal.classList.add("active");
  document.body.style.overflow = "hidden";
}

function closeModal(modal) {
  modal.classList.remove("active");
  document.body.style.overflow = "";
}
