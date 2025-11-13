function loadYandexMaps() {
  return new Promise((resolve, reject) => {
    if (window.ymaps3) return resolve(); 

    const script = document.createElement("script");
    script.src = "https://api-maps.yandex.ru/v3/?apikey=cd441c3f-1482-4604-8ca7-6ef974f3a531&lang=ru_RU";
    script.async = true;
    script.onload = resolve;
    script.onerror = reject;
    document.body.appendChild(script);
  });
}

async function initMap() {
  await loadYandexMaps();
  await ymaps3.ready;

  const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer } = ymaps3;

  const { YMapDefaultMarker } = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');

  const map = new YMap(document.getElementById("app"), {
    location: {
      center: [37.588144, 55.733842],
      zoom: 10,
    },
  });

  map.addChild(new YMapDefaultSchemeLayer());
  map.addChild(new YMapDefaultFeaturesLayer());

  map.addChild(new YMapDefaultMarker({
    coordinates: [37.6218291887115, 55.78690195984523],
  }));
}

document.addEventListener("DOMContentLoaded", () => {
  const mapContainer = document.getElementById("app");
  if (!mapContainer) return;

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        console.log('karta vidna')
        initMap();
        observer.disconnect(); 
      }
    });
  });

  observer.observe(mapContainer);
});
