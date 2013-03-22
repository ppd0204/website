var map,
    tilesURL = 'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    maxZoom = 18,
    osmb,
    osmbURL = '../server/?w={w}&n={n}&e={e}&s={s}&z={z}',
    defaultState = { lat:52.50440, lon:13.33522, z:17 };

function getMapState() {
    var center = map.getCenter();
    return {
        lat: center.lat.toFixed(5),
        lon: center.lng.toFixed(5),
        z: map.getZoom()
    };
}

function setMapState(state) {
    var zoom = defaultState.z;
    if (state.lat === undefined || state.lon === undefined) {
        state = defaultState;
    }
    if (state.z !== undefined) {
        zoom = Math.max(Math.min(parseInt(state.z, 10), maxZoom), 0);
    }
    map.setView([parseFloat(state.lat), parseFloat(state.lon)], zoom);
}

function initMap(containerId) {
    map = new L.Map(containerId || 'map', { zoomControl: false });

    setMapState(Fly.getUrlParam());
    Fly.setUrlParam(getMapState());

    new L.TileLayer(tilesURL, { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: maxZoom }).addTo(map);

    map.on('moveend', function() {
        Fly.setUrlParam(getMapState());
    });

    map.on('zoomend', function() {
        Fly.setUrlParam(getMapState());
    });

    osmb = new L.BuildingsLayer({ url: osmbURL }).addTo(map);
}
