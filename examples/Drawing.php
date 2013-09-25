<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Drawing")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<link rel="stylesheet" href="<?=ROOT?>/js/leaflet.draw/leaflet.draw.css">
<script src="<?=ROOT?>/js/leaflet.draw/leaflet.draw.js"></script>
<script>mapOptions.loadData = false</script>

<h1>Drawing</h1>

<p>Add some 3D to GeoJSON! Select a color below and start drawing a Polygon in the map.<br>
Once you're done, extrude it by using the height slider</p>

<p>
<div class="colorset">Color:
<button class="color" style="background:#FADC64;" onclick="setColor(this)"></button>
<button class="color" style="background:#6464FA;" onclick="setColor(this)"></button>
<button class="color" style="background:#FA6464;" onclick="setColor(this)"></button>
</div>

Height:
<input type="text" value="300" maxlength="3" size="3" onkeyup="setHeight(this)">
</p>

<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map);
</script>
")?></code>

<script>
// creating data object here for adding features
var geoJson = {
  type: 'FeatureCollection',
  features: []
};

function setColor(el) {
  var polygonHandler = drawControl.handlers.polygon;
  color = el.style.backgroundColor;
  // hack: LeafletDraw doesn't allow setting a color with immediate effect
  polygonHandler.options.shapeOptions.color = color;
  polygonHandler.enable.call(polygonHandler);
}

function setHeight(el) {
  height = parseInt(el.value) || 50;
}

var drawControl,
  color = '#ffcc00',
  height = 300;

document.addEventListener('DOMContentLoaded', function() {
  drawControl = new L.Control.Draw({
    polygon: { allowIntersection: false },
    polyline: false,
    circle: false,
    rectangle: false,
    marker: false
  });
  map.addControl(drawControl);

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
      properties: { color:color, height:height }
    };

    geoJson.features.push(feature);
    osmb.setData(geoJson);
  });

  map.removeControl(drawControl);

  hljs.highlightBlock(document.getElementsByTagName('CODE')[0]);
});
</script>

<?pageFooter()?>
