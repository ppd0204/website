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

<p>Add some 3D to GeoJSON! Select a color below and start drawing a Polygon in the map.<br>
Once you're done, extrude it by using the height slider</p>

<p>
Height: <input name="height" type="range" min="10" max="500" step="10" value="100">
</p>

<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map);
</script>
")?></code>

<script>
//function setHeight(el) {
//  height = parseInt(el.value) || 50;
//}

//    .datetime label {
//        display: block;
//        width: 100%;
//        height: 20px;
//    }
//    .datetime input {
//        width: 100%;
//        height: 30px;
//        margin-bottom: 10px;
//        background-color: transparent;
//    }


//    <label for="time">Time: </label>
//    <input id="time" type="range" min="0" max="95">

var range = getElement('#time');
var rangeLabel = getElement('*[for=time]');

range.addEventListener('change', function () {
    h = this.value / timeScale <<0;
    m = this.value % timeScale * 15;
    changeDate();
}, false);















var color = '#ffcc00',
  height = 300;

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

  hljs.highlightBlock(getElement('CODE'));
});
</script>

<?pageFooter()?>
