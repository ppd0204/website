<?php
$root = "..";
require_once("$root/base.php");

pageHeader("API", "docs");
?>

<style>
table {
	border-collapse: collapse;
    width: 100%;
	empty-cells: show;
	border: 0;
    margin: 10px 0 20px 0;
}

th {
	text-align: left;
	vertical-align: top;
	background-color: #eeeeee;
	border: 1px solid #cccccc;
	font-size: 10pt;
	font-weight: normal;
	padding: 4px 8px;
    line-height: 150%;
}

td {
	vertical-align: top;
	border: 1px solid #cccccc;
	font-size: 10pt;
	padding: 4px 8px;
    line-height: 150%;
}

.code {
    white-space: pre;
    background-color: #f8f8ff;
    white-space: pre;
    font-family: monospace;
}
</style>

<a name="constructors"><h2>Constructors</h2></a>

<table>
<tr>
<th>Constructor</th>
<th>Example</th>
<th>Description</th>
</tr>

<tr>
<td>L.BuildingsLayer(<a href="#options">Options</a> {Object})</td>
<td class="code">new L.BuildingsLayer({ url: '…' })</td>
<td>Initializes the buildings layer for Leaflet.</td>
</tr>

<tr>
<td>OpenLayers.Layer.Buildings(<a href="#options">Options</a> {Object})</td>
<td class="code">new OpenLayers.Layer.Buildings({ url: '…' })</td>
<td>Initializes the buildings layer for OpenLayers.</td>
</tr>
</table>

<a name="options">Options</a>

<table>
<tr>
<th>Option</th>
<th>Type</th>
<th>Example</th>
<th>Description</th>
</tr>

<tr>
<td>url</td>
<td>String</td>
<td class="code">'server/?w={w}&n={n}&e={e}&s={s}&z={z}'</td>
<td>URL pointing to a server backend, which should be hosted on the same domain as your frontend.<br>
The schema defines a bounding box + zoom level pattern.</td>
</tr>
</table>

<a name="constants"><h2>Constants</h2></a>

<table>
<tr>
<th>Option</th>
<th>Type</th>
<th>Example</th>
<th>Description</th>
</tr>

<tr>
<td>VERSION</td>
<td>String</td>
<td class="code">'0.1.7a'</td>
<td>Holds current version information.</td>
</tr>
</table>

<a name="methods"><h2>Methods</h2></a>

<table>
<tr>
<th>Method</th>
<th>Example</th>
<th>Description</th>
</tr>

<tr>
<td>setStyle(<a href="#styles">Styles</a> {Object})</td>
<td class="code">setStyle({ color: 'rgb(255,200,200)' })</td>
<td>Set default styles.</td>
</tr>

<tr>
<td>setDate(Date {Object})</td>
<td class="code">setDate(new Date(2013, 15, 1, 10, 30)))</td>
<td>Set date / time for shadow projection.</td>
</tr>

<tr>
<td>geoJSON(<a href="#styles">url</a> {String} | <a href="http://www.geojson.org/geojson-spec.html">GeoJSON</a> {Object}, isLatLon? {Boolean})</td>
<td class="code">geoJSON({
"type": "FeatureCollection",
"features": [{
    "type": "Feature",
    "geometry": {
        "type": "Polygon",
        "coordinates": [[
            [13.38913,52.51670],
            [13.38919,52.51626],
            [13.39031,52.51643],
            [13.39028,52.51664],
            [13.38913,52.51670],
            [13.38913,52.51670]
        ]]
    },
    "properties": {
        "color": "rgba(200,255,200,0.9)",
        "height": 500
    }
}]
})</td>
<td>The method accepts either a string which is handled as JSONP URL for retrieving GeoJSON data from it.<br>
Or you can pass a common GeoJSON object to it. Supported shape types are Polygon and MultiPolygon.<br>
The isLatLon parameter forces the method to swap coordinates Lon/Lat order.</td>
</tr>
</table>

<a name="styles">Styles</a>

<table>
<tr>
<th>Option</th>
<th>Type</th>
<th>Example</th>
<th>Description</th>
</tr>

<tr>
<td>color or <br>
wallColor:</td>
<td>String</td>
<td class="code">'#ffcc00'
'rgb(255,200,200)'
'rgba(255,200,200,0.9)'</td>
<td>Define the objects primary color.<br>
Default color is rgb(200,190,180).
If setStyle() has been used to set different global colors, these will be applied.
If color is set in GeoJSON, this will be used with highest priority.
</td>
</tr>

<tr>
<td>roofColor:</td>
<td>String</td>
<td class="code">'#ffcc00'
'rgb(255,200,200)'
'rgba(255,200,200,0.9)'</td>
<td>Define the objects alternate color.<br>
By default, wallColor will be adapted by some different brightness.
If setStyle() has been used used to set a different global wallColor, this will be applied.
If roofColor is set in GeoJSON, this will be used with highest priority.
</td>
</tr>

<tr>
<td>shadows:</td>
<td>Boolean</td>
<td class="code">true</td>
<td>Enable or disable shadow rendering.<br>
    By default, it's enabled and depends on viewer's current local time.
</td>
</tr>
</table>

<?php pageFooter()?>