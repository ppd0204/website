function setUrlParam(param) {
  if (!history.replaceState) {
      return;
  }
  var k, v,
    res = [];

  for (k in param) {
    v = param[k];
    if (param.hasOwnProperty(k) && typeof v !== 'object' && typeof v !== 'function' && v !== undefined && v !== null && v !== '') {
      res.push(encodeURIComponent(k) + '=' + encodeURIComponent(v));
    }
  }
  history.replaceState(param, '', '?' + res.join('&'));
};

function getUrlParam() {
  var res = {},
    query = location.search.replace(/^\?+/, ''),
    param = query ? query.split('&') : [],
    pair;
  for (var i = 0, il = param.length; i < il; i++) {
    pair = param[i].split('=');
    res[ decodeURIComponent(pair[0]) ] = decodeURIComponent(pair[1]) || true;
  }
  if (res.z) {
    res.zoom = res.z;
    delete res.z;
  }
  return res;
}

var stateTimer;
function saveMapState() {
  clearTimeout(stateTimer);
  stateTimer = setTimeout(function() {
    var center = map.getCenter();
    setUrlParam({
      lat:center.lat.toFixed(5),
      lon:center.lng.toFixed(5),
      zoom:map.getZoom(),
      url:customUrl
    });
  }, 1000);
}

function restoreMapState() {
  var state = getUrlParam();
  var position = [defaultState.lat, defaultState.lon];
  if (state.lat !== undefined && state.lon !== undefined) {
    position = [parseFloat(state.lat), parseFloat(state.lon)];
  }
  var zoom = defaultState.zoom;
  if (state.zoom) {
    zoom = Math.max(Math.min(parseInt(state.zoom, 10), maxZoom), 0);
  }
  map.setView(position, zoom);

  if (customUrl = state.url) {
    osmb.loadData(customUrl);
  }
}

var map, osmb, customUrl, maxZoom = 18;

var defaultState = {
  lat:52.52111,
  lon:13.40988,
  zoom:17
};

document.addEventListener('DOMContentLoaded', function() {
  var navigationBar = document.getElementById('navigation'),
    optionsButton = document.getElementById('options'),
    searchField = document.getElementById('search');

  map = new L.Map('map', { zoomControl:false });

  optionsButton.addEventListener('mouseup', function() {
    navigationBar.style.display = navigationBar.style.display !== 'inline' ? 'inline' : '';
  });

  map.on('click movestart', function() {
    if (innerWidth <= 850 && navigationBar.style.display === 'inline') {
      navigationBar.style.display = '';
    }
  });

  searchField.addEventListener('focus', function() {
    if (innerWidth <= 850 && navigationBar.style.display === 'inline') {
      navigationBar.style.display = '';
    }
  });


  new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png', {
    attribution:'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>',
    maxZoom:maxZoom
  }).addTo(map);

  new GeoSearch(map, searchField);

  map.on('moveend', saveMapState);
  map.on('zoomend', saveMapState);

  osmb = new OSMBuildings(map).loadData();

  restoreMapState();
});
