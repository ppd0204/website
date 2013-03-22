<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Draw", "examples");
?>

<link rel="stylesheet" href="js/leaflet.draw/leaflet.draw.css">
<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/scripts.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>
<script src="js/leaflet.draw/leaflet.draw.js"></script>

<style>
.color {
    cursor: pointer;
    border: 1px solid #666666;
    width: 50px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    border-radius: 5px;
}
</style>

<div id="map"></div>

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

<pre><code id="code"></code></pre>

<script id="src">
var map = new L.Map('map').setView([52.49480, 13.42857], 17);

new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: 17 }
).addTo(map);

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

map.on('draw:poly-created', function(e) {
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

Fly.on('ready', function() {
    var src = Fly.wrap('#src');
    setCode('#code', src.innerText);
});
</script>

<?php pageFooter()?>
