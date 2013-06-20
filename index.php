<?php
header("Content-Type: text/html; charset=utf-8");
require_once("config.php");
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="js/leaflet-<?php echo $config["osmb"]["leaflet_version"]?>/leaflet.css">
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

    .header ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: inline-block;
		    width: 450px;
    }

    .header li {
        display: inline;
        margin-left: 20px;
        padding: 0;
    }

    .header a:link, .header a:visited {
        color: #000000;
        font-size: 10pt;
        text-shadow: 0 1px 0 white;
        white-space: nowrap;
        text-decoration: none;
        cursor: pointer;
    }

    .header img {
        border: 0;
    }

    .logo {
        position: absolute;
        left: 15px;
        bottom: 15px;
        width: 100px;
        height: 47px;
        border: 0;
        opacity: 0.75;
        z-index: 100; /* just for IE */
    }

    .leaflet-container .leaflet-control-attribution {
        background-color: transparent;
        box-shadow: none;
        white-space: nowrap;
    }

    @media screen and (max-width: 479px) {
        .header {
            padding: 5px 10px;
        }
        .header ul {
            display: none;
        }
        #search {
            width: 100%;
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

    @media screen and (min-width: 480px) and (max-width: 767px) {
        .header ul {
            display: none;
        }
        #search {
            width: 100%;
        }
        .leaflet-container .leaflet-control-attribution {
            display: none;
        }
    }
    </style>
	<script src="js/leaflet-<?php echo $config["osmb"]["leaflet_version"]?>/leaflet.js"></script>
	<script src="js/L.BuildingsLayer.js"></script>
  <script src="js/GeoSearch.js"></script>
</head>

<body>
<div id="map"></div>

<div class="header">
	<form style="margin:0;padding:0;display:inline;">
		<input type="search" id="search" name="search" autocorrect="off">
	</form>
    <ul>
    <li><a href="examples/">Examples</a></li>
    <li><a href="download.php">Download</a></li>
    <li><a href="questions.php">Questions</a></li>
    <li><a href="https://twitter.com/intent/follow?original_referer=$config["site"]["url"]&screen_name=$config["twitter"]["screen_name"]"><img src="assets/twitter.png" style="margin-right:1px">Follow @<?=$config["twitter"]["screen_name"]?></a></li>
    </ul>
</div>

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
    lat:52.52111,
    lon:13.40988,
    z:17
};


document.addEventListener('DOMContentLoaded', function onReady() {
    map = new L.Map('map', { zoomControl:false });

    restoreMapState();

    new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png', {
        attribution:'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>',
        maxZoom:maxZoom
    }).addTo(map);

    new GeoSearch(map, document.getElementById('search'));

    map.on('moveend', saveMapState);
    map.on('zoomend', saveMapState);

    osmb = new L.BuildingsLayer().addTo(map).load();
});
</script>

<script src="js/piwik.js"></script>

</body>
</html>