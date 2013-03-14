<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Examples - OpenLayers integration");
?>

<link rel="stylesheet" href="../assets/default.css">
<script src="../js/example.js"></script>
<script src="js/OpenLayers-2.12/OpenLayers.js"></script>
<script src="../js/OpenLayers.Layer.Buildings.js"></script>

<div id="map"></div>

<p>Integrating with OpenLayers layer switch. Your server needs to be running for this example.</p>

<pre id="code" class="code"></pre>

<script id="src">
var map = new OpenLayers.Map('map');
map.addControl(new OpenLayers.Control.LayerSwitcher());

var osm = new OpenLayers.Layer.OSM();
map.addLayer(osm);

map.setCenter(
    new OpenLayers.LonLat(13.33522, 52.50440)
        .transform(
            new OpenLayers.Projection('EPSG:4326'),
            map.getProjectionObject()
        ),
    17
);
var osmb = new OpenLayers.Layer.Buildings({ url: '../server/?w={w}&n={n}&e={e}&s={s}&z={z}' });
map.addLayer(osmb);
</script>

<?php pageFooter()?>