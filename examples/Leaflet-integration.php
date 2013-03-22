<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Leaflet integration", "examples");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/scripts.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>

<div id="map"></div>

<p>Integrating with LeafletJS. Also using dynamic attribution and layer switch.</p>

<pre><code id="code"></code></pre>

<script id="src">
var map = new L.Map('map').setView([52.50440, 13.33522], 17);

new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: 17 }
).addTo(map);

var osmb = new L.BuildingsLayer({ url: '<?php echo ROOT?>/server/?w={w}&n={n}&e={e}&s={s}&z={z}' }).addTo(map);
L.control.layers({}, { Buildings: osmb }).addTo(map);
</script>

<script>
Fly.on('ready', function() {
    var src = Fly.wrap('#src');
    setCode('#code', src.innerText);
});
</script>

<?php pageFooter()?>