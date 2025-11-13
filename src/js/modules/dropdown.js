const dropdowns = document.querySelectorAll('.custom-dropdown');

dropdowns.forEach(dropdown => {
  const selectedSpan = dropdown.querySelector('.dropdown-selected span');
  const options = dropdown.querySelectorAll('.dropdown-option');

  dropdown.addEventListener('click', function(e) {
    e.stopPropagation();

    // закрыть все остальные
    dropdowns.forEach(d => {
      if (d !== dropdown) d.classList.remove('active');
    });

    dropdown.classList.toggle('active');
  });

  options.forEach(option => {
    option.addEventListener('click', function(e) {
      e.stopPropagation();

      const value = this.dataset.value ?? this.getAttribute('data-value');
      if (selectedSpan) selectedSpan.textContent = value;

      options.forEach(opt => opt.classList.remove('active'));
      this.classList.add('active');

      dropdown.classList.remove('active');


      dropdown.dispatchEvent(new CustomEvent('dropdown:change', {
        detail: { value },
        bubbles: true
      }));
    });
  });
});

document.addEventListener('click', function() {
  dropdowns.forEach(d => d.classList.remove('active'));
});
