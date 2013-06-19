<?php
$config = array(
    "osmb" => array(
        "size_minified" => 13.1,
        "size_gzipped" =>  5.7,
        "version" => "0.1.8a",
        "leaflet_version" => "0.5.1"
    ),
    "site" => array(
        "title" => "OSM Buildings",
        "description" => "OSM Buildings - A JavaScript library for visualizing 3D building geometry on interactive maps",
        "url" => "http://osmbuildings.org/"
    )
);
$configSiteKeywords = "
OSM Building
OSM Buildings
OSMBuilding
OSMBuildings
OSM-Building
OSM-Buildings
3D Buildings
3D Building
Extruded Building
Extruded Buildings
Elevated Building
Elevated Buildings
OSM-3D
3D
Building
Buildings
Leaflet
LeafletJS
Leaflet.js
OpenLayers
Jan Marsch
Berlin
Map
Maps
MapBox
Perspective
Polygon
Polygons
Anaglyph
OSM
OpenStreetMap
OpenStreetMaps
JS
JavaScript
Library
WebGL
Example
Examples
Indoor
fly.js
FlyJS
Layer
BuildingLayer
BuildingsLayer
Footprint
Coordinates
Geometry
JSON
GeoJSON
Height
Extract
node
nodeJS
node.js
PostGIS
Geo
GPS
GIS
Visualization
Latitude
Longitude
Mercator
Projection
Panning
Zooming
API";

$config["site"]["keywords"] = implode(", ", array_unique(explode("\n", trim($configSiteKeywords))));
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $config["site"]["title"]?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta property="title" content="<?php echo $config["site"]["title"]?>">
	<meta property="description" content="<?php echo $config["site"]["description"]?>">
    <meta property="keywords" content="<?php echo $config["site"]["keywords"]?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="js/leaflet-<?php echo $config["osmb"]["leaflet_version"]?>/leaflet.css">
    <style>
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

    #map {
        height: 100%;
    }

    .navigation {
        background-color: rgba(255,255,255,0.75);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    .navigation ul {
        list-style-type: none;
        padding: 0;
        display: inline-block;
        margin: 5px;
    }

    .navigation li {
        display: inline;
        margin: 0 10px 0 10px;
        padding: 0;
    }

    .navigation a:link, .navigation a:visited {
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
        border: 0;
        opacity: 0.75;
    }

    .leaflet-container .leaflet-control-attribution {
        background-color: transparent;
        box-shadow: none;
        white-space: nowrap;
    }

    @media screen and (max-width: 480px) {
        .navigation {
            display: none;
        }
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

    @media screen and (min-width: 481px) and (max-width: 800px) {
        .navigation {
            display: none;
        }
        .leaflet-container .leaflet-control-attribution {
            display: none;
        }
    }
    </style>
	<script src="js/leaflet-<?php echo $config["osmb"]["leaflet_version"]?>/leaflet.js"></script>
	<script src="js/L.BuildingsLayer.js"></script>
</head>

<body>
<div id="map"></div>

<div class="navigation"><ul>
    <li><a href="examples/">Examples</a></li>
    <li><a href="download.php">Download</a></li>
    <li><a href="questions.php">Questions</a></li>
</ul></div>

<a href="<?php echo $config["site"]["url"]?>"><img src="logo.png" alt="Home" title="<?php echo $config["site"]["title"]?>" class="logo"></a>

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
            z:map.getZoom()
        });
    }, 1000);
}

function restoreMapState() {
    var state = getUrlParam();
    var position = [defaultState.lat, defaultState.lon];
    if (state.lat !== undefined && state.lon !== undefined) {
        position = [parseFloat(state.lat), parseFloat(state.lon)];
    }
    var zoom = defaultState.z;
    if (state.z) {
        zoom = Math.max(Math.min(parseInt(state.z, 10), maxZoom), 0);
    }
    map.setView(position, zoom);
}

var map, osmb, maxZoom = 18;
var defaultState = {
    lat:52.50440,
    lon:13.33522,
    z:17
};

 // lat:52.52111, lon:13.40988

document.addEventListener('DOMContentLoaded', function onReady() {
    map = new L.Map('map', { zoomControl:false });

    restoreMapState();

    new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png', {
        attribution:'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>',
        maxZoom:maxZoom
    }).addTo(map);

    map.on('moveend', saveMapState);
    map.on('zoomend', saveMapState);

    osmb = new L.BuildingsLayer().addTo(map).load();
});
</script>

<script src="js/piwik.js"></script>

</body>
</html>