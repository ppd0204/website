<?php
header("Content-Type: text/html; charset=utf-8");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title><?=$config["site"]["title"]?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="title" content="<?=$config["site"]["title"]?>">
<meta property="description" content="<?=$config["site"]["description"]?>">
<meta property="keywords" content="<?=$config["site"]["keywords"]?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" type="image/png" href="favicon.png">
<link rel="stylesheet" href="js/leaflet-<?=$config["osmb"]["leaflet_version"]?>/leaflet.css">
<style>
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

html, body {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
}

body {
  background-color: #ffffff;
  font-family: Arial, Helvetica, sans-serif;
  line-height: 140%;
  font-size: 11pt;
  width: 100%;
}

img {
  border: 0;
}

#map {
  height: 100%;
}

.header {
  background-color: rgba(255,255,255,0.75);
  position: absolute;
  left: 0;
  top: 0;
  padding: 5px 15px;
  width: 100%;
  z-index: 100; /* just for IE */
}

#search {
  width: 250px;
  border: 1px solid #cccccc;
  padding: 5px;
}

form {
  margin:0;
  padding:0;
  display:inline;
}

#options {
  display: none;
  position: absolute;
  right: 10px;
  top: 15px;
  cursor: pointer;
}

#navigation {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: inline-block;
}

#navigation li {
  display: inline;
  margin-left: 20px;
  padding: 0;
}

#navigation a:link, #navigation a:visited {
  color: #000000;
  font-size: 10pt;
  text-shadow: 0 1px 0 white;
  white-space: nowrap;
  text-decoration: none;
  cursor: pointer;
}

.logo {
  position: absolute;
  left: 15px;
  bottom: 15px;
  width: 100px;
  height: 47px;
  opacity: 0.75;
  z-index: 100; /* just for IE */
}

.leaflet-container .leaflet-control-attribution {
  background-color: transparent;
  box-shadow: none;
  white-space: nowrap;
}

@media screen and (max-width: 750px) {
  .header {
    padding: 5px 35px 5px 10px;
  }
  #navigation {
    display: none;
    margin-top: 10px;
  }
  #navigation li {
    display: block;
    margin: 10px 0;
  }
  #options {
    display: inline;
  }
  #search {
    width: 100%;
  }
}

@media screen and (max-width: 500px) {
  .logo {
    width: 75px;
    height: 35px;
    left: 10px;
    bottom: 10px;
  }
  .leaflet-container .leaflet-control-attribution {
    display: none;
  }
}
</style>
<script src="js/leaflet-<?=$config["osmb"]["leaflet_version"]?>/leaflet.js"></script>
<script src="js/OSMBuildings-Leaflet.js"></script>
<script src="js/GeoSearch.js"></script>
</head>

<body>
<div id="map"></div>

<div class="header">
	<form><input type="search" id="search" name="search" autocorrect="off"></form>

  <img src="assets/options.png" id="options" alt="Options">

  <ul id="navigation">
  <li><a href="examples/">Examples</a></li>
  <li><a href="download.php">Download</a></li>
  <li><a href="questions.php">Questions</a></li>
  <li title="Follow @<?=$config["twitter"]["screen_name"]?> on Twitter"><a href="https://twitter.com/intent/follow?original_referer=<?=$config["site"]["url"]?>&screen_name=<?=$config["twitter"]["screen_name"]?>">Follow <img src="assets/twitter.png"></a></li>
  <li><a href="mailto:<?=$config["site"]["email"]?>">Email</a></li>
  <li title="Send donations via PayPal"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RNF2QFZN96JA8">Donate!</a></li>
  </ul>
</div>

<a href="<?=$config["site"]["url"]?>"><img src="logo.png" alt="Home" title="<?=$config["site"]["title"]?>" class="logo"></a>

<script>
function setUrlParam(param) {
  if (!history.replaceState) {
      return;
  }
  var k, v,
    res = [];

  for (k in param) {
    v = param[k];
    if (param.hasOwnProperty(k) && typeof v !== 'object' && typeof v !== 'function') {
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

  if (state.url) {
    customUrl = state.url;
    osmb.loadData(customUrl);
  }
}

var map, osmb, customUrl, maxZoom = 20;

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
</script>
<script src="js/piwik.js"></script>
</body>
</html>