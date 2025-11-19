document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll(".modal__form");
    let isSubmitting = false;
  
    forms.forEach((form) => {
      form.addEventListener("submit", async (e) => {
        e.preventDefault();
        if (isSubmitting) return;
        isSubmitting = true;
  
        const isCart = form.id === "cart-form";
  
        const formData = new FormData(form);
        formData.append("action", "submit_form");
  
        if (isCart) {
          const cartData = getCartData();
          formData.append("cart_total", cartData.total);
          formData.append("cart_items_count", cartData.itemsCount);
          formData.append("cart_items", JSON.stringify(cartData.items));
        }
  
        try {
          const response = await fetch(my_ajax_obj.ajaxurl, {
            method: "POST",
            body: formData,
            credentials: "same-origin",
          });
  
          const data = await response.json();
  
          if (data.status === "success") {
            alert(isCart ? "Заказ успешно оформлен!" : "Заявка успешно отправлена!");
  
            const modal = form.closest(".modal");
            modal.classList.remove("active");
            document.body.style.overflow = "";
  
            form.reset();
          } else {
            alert("Ошибка при отправке формы");
          }
  
        } catch (error) {
          console.error("AJAX ошибка:", error);
          alert("Ошибка отправки!");
        } finally {
          isSubmitting = false;
        }
      });
    });
  
  
  
    function getCartData() {
      const cartItems = [];
      let total = 0;
      let itemsCount = 0;
  
      try {
        const items = document.querySelectorAll(".woocommerce-mini-cart-item");
  
        items.forEach((item) => {
          const title = item.querySelector(".sidebar__item-title")?.textContent.trim() || "";
          const sku = item.querySelector(".sidebar__item-sku")?.textContent.replace("Код товара", "").trim() || "";
          const priceText = item.querySelector(".sidebar__item-price .woocommerce-Price-amount")?.textContent.trim() || "";
          const price = parsePrice(priceText);
          const quantity = item.querySelector(".quantity__input") ? parseInt(item.querySelector(".quantity__input").value) : 1;
  
          cartItems.push({
            title,
            sku,
            price,
            quantity,
            total: price * quantity,
          });
  
          itemsCount += quantity;
        });
  
        const totalElement = document.querySelector("#cart-summary .cart-total-final");
        total = totalElement ? parsePrice(totalElement.textContent) : 0;
  
      } catch (e) {
        console.error("Ошибка чтения корзины", e);
      }
  
      return { items: cartItems, total, itemsCount };
    }
  
  
    function parsePrice(str) {
      if (!str) return 0;
      return parseFloat(str.replace(/[^\d,.]/g, "").replace(",", ".")) || 0;
    }
});

