<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Integration with Leaflet", "docs");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>

<h2>1. Link Leaflet and OSM Buildings files</h2>

<p>Your HTML head section should look like this.</p>

<pre><code>
&lt;head&gt;
	&lt;link rel=&quot;stylesheet&quot; href=&quot;http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css&quot;&gt;
	&lt;script src=&quot;http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js&quot;&gt;&lt;/script&gt;
	&lt;script src=&quot;dist/L.BuildingsLayer.js&quot;&gt;&lt;/script&gt;
&lt;/head&gt;
</code></pre>

<h2>2. Initialize the map engine and add a map tile layer</h2>

<p>Position is set to Berlin at zoom level 17<br>
I'm using MapBox tiles here.</p>

<pre><code>
var map = new L.Map('map').setView([52.52020, 13.37570], 17);
new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: 17 }
).addTo(map);
</code></pre>

<h2>3.a Add the buildings layer, database</h2>

<p>Attach this to the map as well.<br>
Here we are using a database + PHP backend which has to be hosted on the same server.
Otherwise you are running into cross origin security issues. Adapt the url parameter to your needs.<br>
Right now, the library's backend provides sample data for cities Berlin and Frankfurt, Germany.
For your city of choice, you need to convert OSM data yourself.</p>

<pre><code>
new L.BuildingsLayer({ url: '<?php echo ROOT?>/server/?w={w}&n={n}&e={e}&s={s}&z={z}' }).addTo(map);
</code></pre>

<h2>3.b Add the buildings layer, GeoJSON</h2>

<p>As a very popular alternative, you could add <a href="http://www.geojson.org/geojson-spec.html">GeoJSON</a> data.<br>
Just pass a data object to the engine, it doesn't need to be real buildings.
Ensure it's coordinates are set as lon/lat[/alt] and the properties section is set as shown below.</p>

<pre><code>
var data = {
    "type": "FeatureCollection",
    "features": [{
        "type": "Feature",
        "geometry": {
            "type": "Polygon",
            "coordinates": [[
                [13.37356, 52.52064],
                [13.37350, 52.51971],
                [13.37664, 52.51973],
                [13.37594, 52.52062],
                [13.37356, 52.52064]
            ]]
        },
        "properties": {
            "wallColor": "rgb(255,0,0)",
            "height": 500
        }
    }]
};

new L.BuildingsLayer().addTo(map).geoJSON(data);
</code></pre>

<script>
hljs.tabReplace = '  ';
hljs.initHighlightingOnLoad();
</script>

<?php pageFooter()?>