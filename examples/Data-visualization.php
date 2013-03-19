<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Data visualization", "examples");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/assets/example.css">
<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>
<script src="<?php echo ROOT?>/js/Example.js"></script>
<script src="js/censusData.js"></script>

<div id="map"></div>

<pre><code id="code"></code></pre>

<script id="src">
var map = new L.Map('map').setView([37.80000, -96.0000], 4);
new L.TileLayer(
    'http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png',
    {
        attribution: 'Imagery &copy; 2011 CloudMade, Population data &copy; <a href="http://census.gov/">US Census Bureau</a>',
        key: 'BC9A493B41014CAABB98F0471D759707', styleId: 22677, minZoom: 3
    }
).addTo(map);

// get color depending on population density value
function getColor(d) {
    return d > 1000 ? '#800026a0' :
           d > 500  ? '#BD0026a0' :
           d > 200  ? '#E31A1Ca0' :
           d > 100  ? '#FC4E2Aa0' :
           d > 50   ? '#FD8D3Ca0' :
           d > 20   ? '#FEB24Ca0' :
           d > 10   ? '#FED976a0' :
           '#FFEDA0a0';
}

var feature;
for (var i = 0, il = censusData.features.length; i < il; i++) {
    feature = censusData.features[i];
    feature.properties.color = getColor(feature.properties.density);
    feature.properties.height = feature.properties.density * 7000; // scale height a bit to make it more visible
}

new L.BuildingsLayer().addTo(map).geoJSON(censusData);
</script>

<script>
Fly.on('ready', function () {
    var src = Fly.wrap('#src');
    setCode('#code', src.innerText);
});
</script>

<?php pageFooter()?>