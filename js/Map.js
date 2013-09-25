var Map = {
  DEFAULT_LAT: 52.52111,
  DEFAULT_LON: 13.40988,
  DEFAULT_ZOOM: 17,
  MAX_ZOOM: 18
};

Map.Leaflet = function(id) {
  this.map = new L.Map(id, { zoomControl:false });

  new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png', {
    attribution:'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>',
    maxZoom:Map.MAX_ZOOM
  }).addTo(this.map);

  this.map.on('moveend zoomend', this.saveState, this);
  this.map.on('click movestart', navigation.hideMenu);

  this.osmb = new OSMBuildings(this.map).loadData();

  this.restoreState();
};

var proto = Map.Leaflet.prototype;

proto.saveState = function() {
  clearTimeout(this.stateTimer);
  var map = this.map;
  this.stateTimer = setTimeout(function() {
    var center = map.getCenter();
    State.save({
      lat:center.lat.toFixed(5),
      lon:center.lng.toFixed(5),
      zoom:map.getZoom() //,
//      url:this.customUrl
    });
  }, 500);
};

proto.restoreState = function() {
  var state = State.load();
  var position = [Map.DEFAULT_LAT, Map.DEFAULT_LON];
  if (state.lat !== undefined && state.lon !== undefined) {
    position = [parseFloat(state.lat), parseFloat(state.lon)];
  }
  var zoom = Map.DEFAULT_ZOOM;
  if (state.zoom) {
    zoom = Math.max(Math.min(parseInt(state.zoom, 10), Map.MAX_ZOOM), 0);
  }

  this.map.setView(position, zoom);

//  if (customUrl = state.url) {
//    osmb.loadData(customUrl);
//  }
};
