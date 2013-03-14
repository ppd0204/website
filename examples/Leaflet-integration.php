<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Examples - Leaflet integration");
?>

<link rel="stylesheet" href="../assets/default.css">
<script src="../js/example.js"></script>

<div id="map"></div>

<p>Integrating with Leaflet layer switch. Also using dynamic attribution.<br>
    Your server needs to be running for this example.</p>

<pre id="code" class="code"></pre>

<script id="src">
var map = new L.Map('map').setView([52.50440, 13.33522], 17);

new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: 17 }
).addTo(map);

var osmb = new L.BuildingsLayer({ url: '../server/?w={w}&n={n}&e={e}&s={s}&z={z}' }).addTo(map);
L.control.layers({}, { Buildings: osmb }).addTo(map);
</script>

<?php pageFooter()?>