import Inputmask from "inputmask";

const im = new Inputmask("+7 (999) 999-99-99", {
  clearIncomplete: true, 
});

const phoneInputs = document.querySelectorAll('input[name="phone"]');

phoneInputs.forEach((input) => {
  im.mask(input);
});
