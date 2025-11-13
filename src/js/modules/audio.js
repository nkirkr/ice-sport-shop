import { formatAudioDuration } from "../utils/utils";

// Ищем элементы
const audio = document.querySelector("audio");
const playBtn = document.querySelector(".audio__play");
const progressFill = document.querySelector(".audio__progress-fill");
const progressBar = document.querySelector(".audio__progress-bar");
const audioCurrent = document.querySelector(".audio__time-current");
const audioDuration = document.querySelector(".audio__time-duration");

if (audio && playBtn) {
  playBtn.addEventListener("click", () => {
    if (audio.paused) {
      audio.play();
      playBtn.classList.add("playing");
    } else {
      audio.pause();
      playBtn.classList.remove("playing");
    }
  });

  audio.addEventListener("loadedmetadata", () => {
    if (audioDuration)
      audioDuration.textContent = formatAudioDuration(audio.duration);
  });

  audio.addEventListener("timeupdate", () => {
    if (audioCurrent)
      audioCurrent.textContent = formatAudioDuration(audio.currentTime);

    if (progressFill && audio.duration) {
      const progress = (audio.currentTime / audio.duration) * 100;
      progressFill.style.width = progress + "%";
    }
  });

  // Клик по прогресс-бару для перемотки
  if (progressBar) {
    progressBar.addEventListener("click", (e) => {
      const rect = progressBar.getBoundingClientRect();
      const clickX = e.clientX - rect.left;
      const width = rect.width;
      const progress = clickX / width;
      audio.currentTime = progress * audio.duration;
    });
  }
}
