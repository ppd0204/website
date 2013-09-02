<!DOCTYPE html>
<html>
<head>
    <title>OSM Buildings - NYC</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <style type="text/css">
    html, body {
        border: 0;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    #map {
        height: 100%;
    }
    </style>
    <link rel="stylesheet" href="../../js/-leaflet-0.5.1/leaflet.css">
    <script src="../../js/-leaflet-0.5.1/leaflet.js"></script>
	<script src="../../js/L.BuildingsLayer.js"></script>
</head>

<body>
    <div id="map"></div>
    <script>
    var map = new L.Map('map').setView([40.75168, -73.98434], 17);
    new L.TileLayer('http://otile1.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.jpg', { maxZoom:18 }).addTo(map);
    var osmb = new L.BuildingsLayer().addTo(map).load('http://newsbeastlabs.cartodb.com/api/v2/sql?q=' + ('SELECT cartodb_id AS id, height/3 AS height, ST_AsText(ST_MakePolygon(ST_ExteriorRing(ST_GeometryN(the_geom, 1)))) AS the_geom, color FROM building_footprints_simp WHERE the_geom %26%26 ST_SetSRID(ST_MakeBox2D(ST_Point({w}, {s}), ST_Point({e}, {n})), 4326)') + '&format=geojson');
    L.control.layers({}, { Buildings:osmb }).addTo(map);
    </script>
    </script>
</body>