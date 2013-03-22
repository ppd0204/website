<?php
$root = "..";
require_once("$root/base.php");

pageHeader("GeoJSON set", "examples");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/assets/example.css">
<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/scripts.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>

<div id="map"></div>

<pre><code id="code"></code></pre>

<script id="src">
var map = new L.Map('map').setView([52.49480, 13.42857], 17);

new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: 17 }
).addTo(map);

var geoJSONData = {
    "type": "FeatureCollection",
    "features": [{
        "type": "Feature",
        "geometry": {
            "type": "Polygon",
            "coordinates": [
                [
                    [13.42634, 52.49533, 150],
                    [13.42660, 52.49524, 150],
                    [13.42619, 52.49483, 150],
                    [13.42583, 52.49495, 150],
                    [13.42590, 52.49501, 150],
                    [13.42611, 52.49494, 150],
                    [13.42640, 52.49525, 150],
                    [13.42630, 52.49529, 150],
                    [13.42634, 52.49533, 150]
                ]
            ]
        },
        "properties": {
            "color": "rgb(255,200,150)"
        }
    }, {
        "type": "Feature",
        "geometry": {
            "type": "Polygon",
            "coordinates": [
                [
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
                ]
            ]
        },
        "properties": {
            "height": 130,
            "color": "rgb(180,240,180)"
        }
    }, {
        "type": "Feature",
        "geometry": {
            "type": "MultiPolygon",
            "coordinates": [
                [
                    [
                        [13.42746, 52.49440, 120],
                        [13.42794, 52.49494, 120],
                        [13.42799, 52.49492, 120],
                        [13.42755, 52.49442, 120],
                        [13.42798, 52.49428, 120],
                        [13.42846, 52.49480, 120],
                        [13.42851, 52.49478, 120],
                        [13.42800, 52.49422, 120],
                        [13.42746, 52.49440, 120]
                    ]
                ],
                [
                    [
                        [13.42803, 52.49497, 130],
                        [13.42800, 52.49493, 130],
                        [13.42844, 52.49479, 130],
                        [13.42847, 52.49483, 130],
                        [13.42803, 52.49497, 130]
                    ]
                ]
            ]
        },
        "properties": {
            "color": "rgb(200,200,250)"
        }
    }, {
        "type": "Feature",
        "geometry": {
            "type": "Polygon",
            "coordinates": [
                [
                    [13.42857, 52.49480, 140],
                    [13.42853, 52.49476, 140],
                    [13.42863, 52.49473, 140],
                    [13.42821, 52.49428, 140],
                    [13.42837, 52.49423, 140],
                    [13.42882, 52.49469, 140],
                    [13.42896, 52.49465, 140],
                    [13.42850, 52.49419, 140],
                    [13.42867, 52.49412, 140],
                    [13.42918, 52.49465, 140],
                    [13.42857, 52.49480, 140]
                ]
            ]
        },
        "properties": {
            "color": "rgb(150,180,210)"
        }
    }]
};

new L.BuildingsLayer().addTo(map).geoJSON(geoJSONData);
</script>

<script>
Fly.on('ready', function () {
    var src = Fly.wrap('#src');
    setCode('#code', src.innerText);
});
</script>

<?php pageFooter()?>