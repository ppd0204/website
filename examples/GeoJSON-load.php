<?php
$root = "..";
require_once("$root/base.php");

pageHeader("GeoJSON load", "examples");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/scripts.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>

<div id="map"></div>

<pre><code id="code"></code></pre>

<script id="src">
var map = new L.Map('map').setView([39.37133, -76.77786], 17);

new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>, sample data <a href="http://www.geosprocket.com/">geosprocket.com</a>', maxZoom: 17 }
).addTo(map);

new L.BuildingsLayer()
    .addTo(map)
    .setStyle({ roofColor: 'rgb(240, 100, 100)' })
    .geoJSON('http://geosprocket.cartodb.com/api/v2/sql?q=SELECT%20*%20FROM%20rt_bld2%20&format=geojson&callback={callback}');
</script>

<script>
Fly.on('ready', function() {
    var src = Fly.wrap('#src');
    setCode('#code', src.innerText);
});
</script>

<?php pageFooter()?>