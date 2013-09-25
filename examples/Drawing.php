<?php
$root = "..";
require_once("$root/_base.php");

pageHeader("Drawing");
?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<link rel="stylesheet" href="js/leaflet.draw/leaflet.draw.css">
<script src="js/leaflet.draw/leaflet.draw.js"></script>

<h1>Drawing</h1>

<p>Add a bit of 3D to GeoJSON! Select a color below and start drawing a Polygon in the map.<br>
    Once you're done, it gets extruded.</p>

<p>
Color:
<button class="color" style="background:#FADC64;" onclick="setColor(this)"></button>
<button class="color" style="background:#6464FA;" onclick="setColor(this)"></button>
<button class="color" style="background:#FA6464;" onclick="setColor(this)"></button>

Height:
<input type="text" value="300" maxlength="3" size="3" onkeyup="setHeight(this)">
</p>

<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map).loadData();
</script>
")?></code>


<script id="src">
var drawControl = new L.Control.Draw({
    polygon: { allowIntersection: false },
    polyline: false,
    circle: false,
    rectangle: false,
    marker: false
});

map.addControl(drawControl);

// creating data object here as we want to keep adding objects
var geoJSONData = {
    type: 'FeatureCollection',
    features: []
};
var height = 300;
var color = '#ffcc00';

// we're not adding any osmbuildings upfront
var osmb = new L.BuildingsLayer().addTo(map);

map.on('draw:poly-created', function (e) {
    // hack: get coordinates from event object
    var polygon = e.poly._latlngs;

    // create proper GeoJSON object and add it
    var coordinates = [];
    for (var i = 0, il = polygon.length; i < il; i++) {
        coordinates.push([polygon[i].lng, polygon[i].lat]);
    }
    coordinates.push([polygon[0].lng, polygon[0].lat]);

    var feature = {
        type: 'Feature',
        geometry: {
            type: 'Polygon',
            coordinates: [coordinates]
        },
        properties: { color: color, height: height }
    };

    geoJSONData.features.push(feature);
    osmb.geoJSON(geoJSONData);
});
</script>

<script>
map.removeControl(drawControl);

function setColor(el) {
    // hack: LeafletDraw doesn't allow setting a color with immediate effect
    drawControl.handlers.polygon.options.shapeOptions.color = el.style.backgroundColor;
    color = el.style.backgroundColor;
    drawControl.handlers.polygon.enable.call(drawControl.handlers.polygon);
}

function setHeight(el) {
    height = parseInt(el.value) || 50;
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  hljs.highlightBlock(document.getElementsByTagName('CODE')[0]);
});
</script>

<?pageFooter()?>
