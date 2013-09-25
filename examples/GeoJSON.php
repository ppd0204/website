<?php
$root = "..";
require_once("$root/_base.php");

pageHeader("GeoJSON");
?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<h1>GeoJSON</h1>

<p>Objects on the map above are build from custom GeoJSON.<br>
Feel free to edit the data or paste your own examples here.</p>

<p>
<textarea>
{
  "type": "FeatureCollection",
  "features": [{
    "type": "Feature",
    "geometry": {
      "type": "Polygon",
      "coordinates": [[
        [13.42634, 52.49533],
        [13.42660, 52.49524],
        [13.42619, 52.49483],
        [13.42583, 52.49495],
        [13.42590, 52.49501],
        [13.42611, 52.49494],
        [13.42640, 52.49525],
        [13.42630, 52.49529],
        [13.42634, 52.49533]
      ]]
    },
    "properties": {
      "color": "rgb(255,200,150)",
      "height": 150
    }
  }, {
    "type": "Feature",
    "geometry": {
      "type": "Polygon",
      "coordinates": [[
        [13.42706, 52.49535],
        [13.42675, 52.49503],
        [13.42694, 52.49496],
        [13.42678, 52.49480],
        [13.42657, 52.49486],
        [13.42650, 52.49478],
        [13.42686, 52.49466],
        [13.42714, 52.49494],
        [13.42692, 52.49501],
        [13.42717, 52.49525],
        [13.42741, 52.49516],
        [13.42745, 52.49520],
        [13.42745, 52.49520],
        [13.42706, 52.49535]
      ]]
    },
    "properties": {
      "color": "rgb(180,240,180)",
      "height": 130
    }
  }, {
    "type": "Feature",
    "geometry": {
      "type": "MultiPolygon",
      "coordinates": [
        [[
          [13.42746, 52.49440],
          [13.42794, 52.49494],
          [13.42799, 52.49492],
          [13.42755, 52.49442],
          [13.42798, 52.49428],
          [13.42846, 52.49480],
          [13.42851, 52.49478],
          [13.42800, 52.49422],
          [13.42746, 52.49440]
        ]],
        [[
          [13.42803, 52.49497],
          [13.42800, 52.49493],
          [13.42844, 52.49479],
          [13.42847, 52.49483],
          [13.42803, 52.49497]
        ]]
      ]
    },
    "properties": {
      "color": "rgb(200,200,250)",
      "height": 120
    }
  }, {
    "type": "Feature",
    "geometry": {
      "type": "Polygon",
      "coordinates": [[
        [13.42857, 52.49480],
        [13.42853, 52.49476],
        [13.42863, 52.49473],
        [13.42821, 52.49428],
        [13.42837, 52.49423],
        [13.42882, 52.49469],
        [13.42896, 52.49465],
        [13.42850, 52.49419],
        [13.42867, 52.49412],
        [13.42918, 52.49465],
        [13.42857, 52.49480]
      ]]
    },
    "properties": {
      "color": "rgb(150,180,210)",
      "height": 140
    }
  }]
}
</textarea><br>

<button onclick="setGeoJson()">Apply changes</button>
</p>

<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map).setData(geoJSON);
</script>
")?></code>

<script>
var geoJsonBlock;

function getCenter(geoJson) {
  var geometry, len = 0, lat = 0, lon = 0;

  for (var i = 0, il = geoJson.features.length; i < il; i++) {
    geometry = geoJson.features[i].geometry.coordinates[0];
    if (geometry[0][0][0]) {
      geometry = geometry[0];
    }

    len += geometry.length-1;
    for (var j = 0, jl = geometry.length-1; j < jl; j++) {
      lat += geometry[j][1];
      lon += geometry[j][0];
    }
  }

  return { lat:lat/len, lon:lon/len };
}

function setGeoJson() {
  try {
    var geoJson = JSON.parse(geoJsonBlock.value);
    osmb.setData(geoJson);
    var center = getCenter(geoJson);
    map.setView([center.lat, center.lon], 17)
  } catch(e) {
  }
}

document.addEventListener('DOMContentLoaded', function() {
  geoJsonBlock = document.getElementsByTagName('TEXTAREA')[0];
  setGeoJson();
  hljs.highlightBlock(document.getElementsByTagName('CODE')[0]);
});
</script>

<?pageFooter()?>