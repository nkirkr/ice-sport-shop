// Before-After Slider
export function initBeforeAfterSliders() {
  const sliders = document.querySelectorAll(".before-after-slider");

  console.log("Initializing sliders:", sliders.length);

  sliders.forEach((slider, index) => {
    const container = slider.closest(".before-after-container");

    if (!container) {
      console.error(`Slider ${index}: Container not found`);
      return;
    }

    const beforeImage = container.querySelector(".before-after-image.before");
    const button = container.querySelector(".before-after-button");

    if (!beforeImage || !button) {
      console.error(`Slider ${index}: Missing elements`);
      return;
    }

    console.log(`Slider ${index}: Ready`);

    // Обработчик изменения значения слайдера
    const updateSlider = () => {
      const value = slider.value;

      console.log(`Slider ${index}: value =`, value);

      // Обновляем ширину "До" изображения
      beforeImage.style.width = value + "%";

      // Обновляем позицию кнопки (20px = половина ширины кнопки 40px)
      button.style.left = `calc(${value}% - 20px)`;

      console.log(
        `Slider ${index}: beforeImage width =`,
        beforeImage.style.width
      );
      console.log(`Slider ${index}: button left =`, button.style.left);
    };

    // Слушаем события input и change
    slider.addEventListener("input", updateSlider);
    slider.addEventListener("change", updateSlider);

    console.log(`Slider ${index}: Event listeners attached`);
  });

  console.log("Before-After Sliders initialized");
}
