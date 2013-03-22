<!DOCTYPE html>
<html>
<head>
    <title>OSM Buildings - Sketch style</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="../favicon.png">
	<link rel="stylesheet" href="../assets/fullscreen.css">
    <link rel="stylesheet" href="../js/leaflet-0.5.1/leaflet.css">
    <script src="../js/leaflet-0.5.1/leaflet.js"></script>
    <script src="L.BuildingsLayer-sketch.js"></script>
</head>

<body>
    <div id="map"></div>
    <a href="http://osmbuildings.org/"><img src="../logo.png" class="logo"></a>

    <script>
    var map = new L.Map('map').setView([52.50440, 13.33522], 17);

    new L.TileLayer(
        'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
        { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: 17 }
    ).addTo(map);

    var osmb = new L.BuildingsLayer({ url: '../server/?w={w}&n={n}&e={e}&s={s}&z={z}' }).addTo(map);
    L.control.layers({}, { Buildings: osmb }).addTo(map);
    </script>

	<script src="../js/piwik.js"></script>
</body>
</html>