const notification = document.querySelector('.notification');
const closeNotificationBtn = notification.querySelector('.notification__close');


const onShowNotification = () => {
    notification.classList.add('notification--visible');
    closeNotificationBtn.addEventListener('click', onCloseNotification);
}

const onCloseNotification = () => {
    notification.classList.remove('notification--visible');
}


export { onShowNotification };
