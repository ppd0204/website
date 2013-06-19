<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Examples - OpenLayers integration");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/assets/default.css">
<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>
<script src="<?php echo ROOT?>/js/Example.js"></script>
<script src="js/OpenLayers-2.12/OpenLayers.js"></script>
<script src="<?php echo ROOT?>/js/OpenLayers.Layer.Buildings.js"></script>

<div id="map"></div>

<p>Integrating with OpenLayers layer switch.</p>

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
var osmb = new OpenLayers.Layer.Buildings();
map.addLayer(osmb);
osmb.load();
</script>

<script>
Fly.on('ready', function () {
    var src = Fly.wrap('#src');
    new Example('#code', src.innerText);
});
</script>

<?php pageFooter()?>