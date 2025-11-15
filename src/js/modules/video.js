document.addEventListener('DOMContentLoaded', () => {
  const videoSection = document.querySelector('.video');
  if (!videoSection) return; 

  const video = videoSection.querySelector('.video__source');
  const playButton = videoSection.querySelector('.video__play');

  if (!video || !playButton) return;

  playButton.addEventListener('click', () => {
    if (video.paused) {
      video.play();
      playButton.classList.add('is-playing');
    }
  });

  video.addEventListener('click', () => {
    if (!video.paused) {
      video.pause();
      playButton.classList.remove('is-playing');
    }
  });

  video.addEventListener('ended', () => {
    playButton.classList.remove('is-playing');
  });
});


// document.addEventListener("DOMContentLoaded", function() {
//   Fancybox.bind('[data-fancybox="article-gallery"]', {
//     groupAll: true, 
//     Thumbs: {
//       autoStart: true,
//     },
//   });
// });