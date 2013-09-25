<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Examples")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>
<script src="<?=ROOT?>/js/OpenLayers-2.12/OpenLayers.js"></script>
<script src="<?=ROOT?>/js/OSMBuildings-OpenLayers.js"></script>
<script>mapType = 'OpenLayers'</script>

<h1>OpenLayers integration</h1>

<p>Adding OSM Buildings to OpenLayers as an extra layer. Also using layer switch and dynamic attribution.</p>

<code><?=htmlentities("<script src=\"OSMBuildings-OpenLayers.js\"></script>
<script>
var map = new OpenLayers.Map('map');
map.addControl(new OpenLayers.Control.LayerSwitcher());
map.addLayer(new OpenLayers.Layer.OSM());
map.setCenter(
  new OpenLayers.LonLat(13.33522, 52.50440)
    .transform(
      new OpenLayers.Projection('EPSG:4326'),
      map.getProjectionObject()
    ),
  17
);
var osmb = new OSMBuildings-OpenLayers(map).load();
</script>
")?></code>

<script>
document.addEventListener('DOMContentLoaded', function() {
  hljs.highlightBlock(document.getElementsByTagName('CODE')[0]);
});
</script>

<?pageFooter()?>