<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Examples - GeoJSON load");
?>

<link rel="stylesheet" href="../assets/default.css">
<script src="../js/example.js"></script>

<div id="map"></div>

<pre id="code" class="code"></pre>

<script id="src">
var map = new L.Map('map').setView([39.37133, -76.77786], 17);

new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>, sample data <a href="http://www.geosprocket.com/">geosprocket.com</a>', maxZoom: 17 }
).addTo(map);

new L.BuildingsLayer()
    .addTo(map)
    .setStyle({ roofColor: 'rgb(240, 100, 100)' })
    .geoJSON('http://geosprocket.cartodb.com/api/v2/sql?q=SELECT%20*%20FROM%20rt_bld2%20&format=geojson&callback={callback}')
;
</script>

<?php pageFooter()?>