export const formatAudioDuration = (seconds) => {
    const minutes = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60);
    return `${minutes}:${secs < 10 ? "0" : ""}${secs}`;
}
export const resizableSwiper = (Swiper, breakpoint, swiperClass, swiperSettings, callback) => {
  let swiper;

  breakpoint = window.matchMedia(breakpoint);

  const enableSwiper = function(className, settings) {
    swiper = new Swiper(className, settings);

    if (callback) {
      callback(swiper);
    }
  }

  const checker = function() {
    if (breakpoint.matches) {
      return enableSwiper(swiperClass, swiperSettings);
    } else {
      if (swiper !== undefined) swiper.destroy(true, true);
      return;
    }
  };

  breakpoint.addEventListener('change', checker);
  checker();
}


export function slideUp(element) {
  if (element._slideTimeout) clearTimeout(element._slideTimeout);

  element.style.transition = 'height 0.3s ease, opacity 0.3s ease';
  element.style.overflow = 'hidden';
  element.style.height = element.scrollHeight + 'px';

  requestAnimationFrame(() => {
    element.style.height = '0px';
    element.style.opacity = '0';
  });

  element._slideTimeout = setTimeout(() => {
    element.style.display = 'none';
    element.style.height = '';
    element.style.opacity = '';
    element.style.transition = '';
    element._slideTimeout = null;
  }, 300);
}

export function slideDown(element) {
  if (element._slideTimeout) clearTimeout(element._slideTimeout);

  element.style.display = 'block';
  element.style.overflow = 'hidden';
  element.style.height = '0px';
  element.style.opacity = '0';
  element.style.transition = 'height 0.3s ease, opacity 0.3s ease';

  requestAnimationFrame(() => {
    element.style.height = element.scrollHeight + 'px';
    element.style.opacity = '1';
  });

  element._slideTimeout = setTimeout(() => {
    element.style.height = '';
    element.style.overflow = '';
    element.style.transition = '';
    element._slideTimeout = null;
  }, 300);
}
