document.querySelectorAll('.quantity').forEach((quantity) => {
  const incBtn = quantity.querySelector('.quantity__inc');
  const decBtn = quantity.querySelector('.quantity__dec');
  const input = quantity.querySelector('.quantity__input');

  const onIncrementValue = () => {
    let current = parseInt(input.value, 10) || 0;
    input.value = current + 1;
  };

  const onDecrementValue = () => {
    let current = parseInt(input.value, 10) || 0;
    if (current > 1) {
      input.value = current - 1;
    }
  };

  incBtn.addEventListener('click', onIncrementValue);
  decBtn.addEventListener('click', onDecrementValue);
});
