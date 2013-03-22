<?php
$root = "..";
require_once("$root/base.php");

pageHeader("OpenLayers integration", "examples");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/scripts.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>
<script src="js/OpenLayers-2.12/OpenLayers.js"></script>
<script src="<?php echo ROOT?>/js/OpenLayers.Layer.Buildings.js"></script>

<div id="map"></div>

<pre><code id="code"></code></pre>

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
var osmb = new OpenLayers.Layer.Buildings({ url: '<?php echo ROOT?>/server/?w={w}&n={n}&e={e}&s={s}&z={z}' });
map.addLayer(osmb);
</script>

<script>
Fly.on('ready', function() {
    var src = Fly.wrap('#src');
    setCode('#code', src.innerText);
});
</script>

<?php pageFooter()?>