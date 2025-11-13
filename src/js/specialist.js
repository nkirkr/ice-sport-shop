import Swiper from 'swiper';
import { Navigation, Pagination, Mousewheel } from 'swiper/modules';
import './modules/scrollbar.js'
import './modules/sidebar.js';
import './modules/search.js';
import './modules/catalog-menu.js';
import './modules/mob-menu.js';
import './modules/otherPublications';
import { resizableSwiper } from './utils/utils';

document.addEventListener('DOMContentLoaded', function() {
    const isMobile = window.innerWidth <= 768;

    const articleGallery = new Swiper('#documents-swiper', {
        modules: [Navigation],
        direction: 'horizontal',
        loop: false,
        slidesPerView: !isMobile ? 4 : 1,
        spaceBetween: 13,
        navigation: {
            nextEl: '.specialist-documents-next',
            prevEl: '.specialist-documents-prev',
        },
        autoHeight: true,
        speed: 400,
    });

    const reviewsSwiper = new Swiper('#reviews-swiper', {
        modules: [Navigation, Pagination, Mousewheel],
        direction: 'horizontal',
        loop: false,
        slidesPerView: 'auto',
        mousewheel: true,
        navigation: {
            nextEl: '#reviews-next',
            prevEl: '#reviews-prev',
        },
    });

    resizableSwiper(
        Swiper,
        '(max-width: 768px)',
        '#specialist-works',
        {
            modules: [Navigation, Pagination],
            loop: false,
            spaceBetween: 0,
            slidesPerView: 1,
            navigation: {
                nextEl: '.specialist-works-next',
                prevEl: '.specialist-works-prev',
            },
        },
    )

    window.addEventListener('resize', () => {
        articleGallery.update();
    });
});