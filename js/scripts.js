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

function getState() {
    var center = map.getCenter();
    var res = {
        lat: center.lat.toFixed(5),
        lon: center.lng.toFixed(5),
        z: map.getZoom()
    };

    if (name) {
        res.n = name;
    }

    if (time) {
        res.t = time.toISOString().substring(0, 16);
    }

    return res;
}

function setState(state) {
    var pos = defaultPos;
    if (state.lat !== undefined && state.lon !== undefined) {
        pos = [parseFloat(state.lat), parseFloat(state.lon)];
    }
    var zoom = defaultZoom;
    if (state.z) {
        zoom = Math.max(Math.min(parseInt(state.z, 10), maxZoom), 0);
    }
    map.setView(pos, zoom);

    name = state.n || '';
    document.title = defaultName + (name ? ' - ' + name : '');

    time = state.t ? new Date(state.t.replace('T', ' ')) : null;
    osmb && osmb.setDate(time || defaultTime);
}

function restoreState() {
    setState(Fly.getUrlParam());
}

var stateTimer;
function saveState() {
    clearTimeout(stateTimer);
    stateTimer = setTimeout(function() {
        Fly.setUrlParam(getState());
    }, 1000);
}

function initMap(containerId) {

    map = new L.Map(containerId || 'map', { zoomControl: false });

    restoreState(); // sets some defaults thats why saveState() is called next
    saveState();

    new L.TileLayer(tilesURL, { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: maxZoom }).addTo(map);

    map.on('moveend', saveState);
    map.on('zoomend', saveState);

    osmb = new L.BuildingsLayer({ url: osmbURL }).addTo(map);
}
