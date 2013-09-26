<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Examples")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<link rel="stylesheet" href="<?=ROOT?>/js/leaflet.draw-0.2.0/leaflet.draw.css">
<script src="<?=ROOT?>/js/leaflet.draw-0.2.0/leaflet.draw.js"></script>
<script>mapOptions.loadData = false</script>

<h1>Drawing</h1>

<p>Draw GeoJSON and add some 3D to it. Use the toolbar above to draw a polygon or a rectangle on the map.<br>
Enter a height value to change object's extrusion at any time.</p>

<p>
Height: <input type="text" value="300" maxlength="3" size="3" onkeyup="setHeight(this)">
</p>

<legend>Example</legend>
<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map);
var drawControl = new L.Control.Draw({
  draw: { polyline:false, circle:false, marker:false }
});
map.addControl(drawControl);
map.on('draw:created', function (e) {
  var feature = e.layer.toGeoJSON();
  feature.properties = { color:'#ffcc00', height:{height} };
  var geoJson = { type:'FeatureCollection', features:[feature] };
  osmb.setData(geoJson);
});
</script>
")?></code>

<script>
var color = '#ffcc00',
  height = 300,
  feature;

function setHeight(el) {
  height = parseInt(el.value);
  Code.update({ height:height });
  setGeoJson();
}

function setGeoJson() {
  if (!feature) {
    return;
  }
  feature.properties = {
    color: color,
    height: height
  };
  var geoJson = {
    type: 'FeatureCollection',
    features: [feature]
  };
  osmb.setData(geoJson);
}

document.addEventListener('DOMContentLoaded', function() {
  var drawControl = new L.Control.Draw({
    draw: {
      polyline: false,
      polygon: {
        allowIntersection: false,
        shapeOptions: { color:color }
      },
      rectangle: {
        shapeOptions: { color:color }
      },
      circle: false,
      marker: false
    }
  });
  map.addControl(drawControl);

  map.on('draw:created', function (e) {
    feature = e.layer.toGeoJSON();
    setGeoJson();
  });
});

document.addEventListener('DOMContentLoaded', function() {
  Code.update({ height:height });
});
</script>

<?pageFooter()?>