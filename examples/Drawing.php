<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Drawing")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<link rel="stylesheet" href="<?=ROOT?>/js/leaflet.draw-0.2.0/leaflet.draw.css">
<script src="<?=ROOT?>/js/leaflet.draw-0.2.0/leaflet.draw.js"></script>
<script>mapOptions.loadData = false</script>

<h1>Drawing</h1>

<p>Add some 3D to GeoJSON! Select a color below and start drawing a Polygon in the map.<br>
Once you're done, extrude it by using the height slider</p>

<p>
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
function setHeight(el) {
  height = parseInt(el.value) || 50;
}

var drawControl,
  color = '#ffcc00',
  height = 300;

document.addEventListener('DOMContentLoaded', function() {
  var drawnItems = new L.FeatureGroup();
  map.addLayer(drawnItems);

  drawControl = new L.Control.Draw({
    draw: {
      polygon: {
        allowIntersection: false,
        shapeOptions: { color:color }
      },
      polyline: true,
      rectangle: true,
      circle: true,
      marker: true
    },
    edit: {
      featureGroup: drawnItems
    }
  });
  map.addControl(drawControl);

  map.on('draw:created', function (e) {
    var feature = e.layer.toGeoJSON();
    feature.properties = {
      color: color,
      height: height
    };

    var geoJson = {
      type: 'FeatureCollection',
      features: [feature]
    };

    osmb.setData(geoJson);
  });

//  map.removeControl(drawControl);

  hljs.highlightBlock(document.getElementsByTagName('CODE')[0]);
});
</script>

<?pageFooter()?>
