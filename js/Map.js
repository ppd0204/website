var Map = (function() {

  var DEFAULT_LAT = 52.52111,
    DEFAULT_LON = 13.40988,
    DEFAULT_ZOOM = 17,
    MAX_ZOOM = 18;

  var _engine;

  function _restoreState() {
    var state = State.load();
    var position = [DEFAULT_LAT, DEFAULT_LON];
    if (state.lat !== undefined && state.lon !== undefined) {
      position = [parseFloat(state.lat), parseFloat(state.lon)];
    }
    var zoom = DEFAULT_ZOOM;
    if (state.zoom) {
      zoom = Math.max(Math.min(parseInt(state.zoom, 10), MAX_ZOOM), 0);
    }

    _engine.setView(position, zoom);

//  if (customUrl = state.url) {
//    osmb.loadData(customUrl);
//  }
  }

  var me = {};

  me.setType = function(engineType, domNodeId) {
    // Leaflet
    _engine = new L.Map(domNodeId, { zoomControl:false });

    new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png', {
      attribution:'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>',
      maxZoom:MAX_ZOOM
    }).addTo(_engine);

    _engine.on('moveend zoomend', this.saveState, this);
    _engine.on('click movestart', this.onInteraction, this);

     var osmb = new OSMBuildings(_engine).loadData();

    _restoreState();

    return osmb;
  };

  me.saveState = function() {
    var center = _engine.getCenter();
    State.save({
      lat:center.lat.toFixed(5),
      lon:center.lng.toFixed(5),
      zoom:_engine.getZoom() //,
//    url:customUrl
    });
  };

  me.setState = function(state) {
    _engine.setView([state.lat, state.lon], state.zoom, false);
  };

  me.onInteraction = function() {};

  return me;

}());
