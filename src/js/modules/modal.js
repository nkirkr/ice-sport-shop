export function initModals() {
  const modals = document.querySelectorAll(".modal");
  const openButtons = document.querySelectorAll("[data-modal-open]");
  const closeButtons = document.querySelectorAll("[data-modal-close]");

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

  closeButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      const modal = button.closest(".modal");
      if (modal) {
        closeModal(modal);
      }
    });
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      const activeModal = document.querySelector(".modal.active");
      if (activeModal) {
        closeModal(activeModal);
      }
    }
  });

  const modalForms = document.querySelectorAll(".modal__form");

  modalForms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());

      console.log("Форма отправлена:", data);

      alert("Спасибо! Мы свяжемся с вами в ближайшее время.");

      const modal = form.closest(".modal");
      closeModal(modal);
      form.reset();
    });
  });

}

function openModal(modal) {
  modal.classList.add("active");
  document.body.style.overflow = "hidden";
}

function closeModal(modal) {
  modal.classList.remove("active");
  document.body.style.overflow = "";
}
