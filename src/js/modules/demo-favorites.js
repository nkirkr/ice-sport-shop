const favoritesBtns = document.querySelectorAll('.to-favorite');

const onToggleFavoriteBtn = (evt) => {
    const btn = evt.currentTarget.closest('.to-favorite');
    const icon = btn.querySelector('use');
    if (icon.getAttribute('xlink:href') === '#to-favorite') {
        icon.setAttribute('xlink:href', '#to-favorite-checked');
        btn.classList.add('to-favorite--checked');
    } else {
        icon.setAttribute('xlink:href', '#to-favorite');
        btn.classList.remove('to-favorite--checked');
    }
}

favoritesBtns.forEach((btn) => {
    btn.addEventListener('click', (evt) => {
        onToggleFavoriteBtn(evt);
    });
});