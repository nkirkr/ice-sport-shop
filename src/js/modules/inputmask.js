import Inputmask from "inputmask";

const im = new Inputmask("+7 (999) 999-99-99", {
  clearIncomplete: true,
});

const phoneInputs = document.querySelectorAll(
  'input[name="callback_phone"], input[name="cart_phone"]'
);

phoneInputs.forEach((input) => im.mask(input));
