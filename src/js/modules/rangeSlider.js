import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

const slider = document.querySelector('#slider');
const priceFrom = document.querySelector('#priceFrom');
const priceTo = document.querySelector('#priceTo');

noUiSlider.create(slider, {
  start: [0, 100],
  connect: true,
  range: {
    min: 0,
    max: 100
  },
  format: {
    to: value => value.toFixed(0),
    from: value => Number(value)
  }
});

// обновляем инпуты при движении слайдера
slider.noUiSlider.on('update', values => {
  priceFrom.value = values[0];
  priceTo.value = values[1];
});

// обновляем слайдер при изменении инпутов
function setSliderHandle(index, value) {
  let values = [null, null];
  values[index] = value;
  slider.noUiSlider.set(values);
}

priceFrom.addEventListener('change', function () {
  setSliderHandle(0, this.value);
});

priceTo.addEventListener('change', function () {
  setSliderHandle(1, this.value);
});
