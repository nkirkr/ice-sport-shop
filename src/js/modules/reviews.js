// import Swiper from 'swiper';
// import Swiper, { Navigation, Mousewheel } from 'swiper';
// import 'swiper/css';
// import 'swiper/css/navigation';

// console.log('тянем только Navigation, Mousewheel')

const reviewsSwiper = new Swiper('#reviews-swiper', {
    modules: [Navigation, Mousewheel],
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    mousewheel: true,
    navigation: {
        nextEl: '#reviews-next',
        prevEl: '#reviews-prev',
    },
});