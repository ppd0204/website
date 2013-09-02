var map,
    tilesURL = 'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    maxZoom = 18,
    osmb,
    osmbURL = '../server/?w={w}&n={n}&e={e}&s={s}&z={z}',
    defaultPos = [52.50440, 13.33522],
    defaultZoom = 17,
    name, defaultName = document.title,
    time, defaultTime = new Date();

defaultTime.setHours(10);
defaultTime.setMinutes(30);

function initMap(containerId, isCustom) {

    map = new L.Map(containerId || 'map', { zoomControl: false });

    restoreState(); // sets some defaults thats why saveState() is called next
    saveState();

    new L.TileLayer(tilesURL, { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: maxZoom }).addTo(map);

    map.on('moveend', saveState);
    map.on('zoomend', saveState);

    if (isCustom) {
	    osmb = new L.BuildingsLayer({ url: osmbURL }).addTo(map);
    } else {
	    osmb = new L.BuildingsLayer().addTo(map).load();
    }
}
