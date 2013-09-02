<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Examples")?>

<script src="js/OpenLayers-2.12/OpenLayers.js"></script>
<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github.css">
<script src="<?=ROOT?>/js/OSMBuildings-OpenLayers.js"></script>
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<h1>OpenLayers integration</h1>

<p>Adding OSM Buildings to OpenLayers as an extra layer. Also using layer switch and dynamic attribution.</p>

<code>
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
</code>

<script>
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


var code = document.getElementsByTagName('CODE')[0];
code.innerText = hljs.highlightBlock(code.innerText);
</script>

<?pageFooter()?>