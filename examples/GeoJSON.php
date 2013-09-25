<?php
$root = "..";
require_once("$root/_base.php");

pageHeader("GeoJSON");
?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map).loadData();
</script>
")?></code>

<script id="src">
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
document.addEventListener('DOMContentLoaded', function() {
  hljs.highlightBlock(document.getElementsByTagName('CODE')[0]);
});
</script>

<?pageFooter()?>