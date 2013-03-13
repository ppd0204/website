<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Examples");
?>

<ul>
    <li><a href="Leaflet-integration.html">Leaflet integration</a> - Show how it works with layer control and attribution</li>
	<li><a href="OpenLayers-integration.html">OpenLayers integration</a> - Show how it works with layer control and attribution</li>
    <li><a href="../darkside/">Building shadows</a> - These shadows are date and time dependent, according to sun position</li>
    <li><a href="Data-visualization.html">Data visualization</a> - No buildings at all: showing US census data on a map</li>
    <li><a href="Draw.html">Draw</a> - Draw polygons on the map and get them extruded</li>
    <li><a href="Styles.html">Styling</a> - Set colors for walls, roofs and stroke roofs</li>
    <li><a href="GeoJSON-load.html">GeoJSON load</a> - Show GeoJSON data from CartoDB</li>
    <li><a href="GeoJSON-set.html">GeoJSON set</a> - Put custom GeoJSON on the map</li>
</ul>

<h2>Projects using OSM Buildings</h2>

<p style="display:block;height:75px;vertical-align:top;">
<a href="http://metropolis.business-geografic.com/osmb/"><img style="width:150px;height:75px;float:left;margin-right:10px;" src="<?php echo ROOT?>/assets/images/screenshots/Paris.jpg"></a>
<b><a href="http://metropolis.business-geografic.com/osmb/">OSM Buildings Experiment</a></b><br>
Paris, France<br>
by Fabien Nicollet (<a href="https://twitter.com/fnicollet">@fnicollet</a>)
</p>

<p style="display:block;height:75px;vertical-align:top;">
<a href="http://gmaps-utility-gis.googlecode.com/svn/trunk/agsjs/examples/extrudedlayer.html"><img style="width:150px;height:75px;float:left;margin-right:10px;" src="<?php echo ROOT?>/assets/images/screenshots/Charlotte.jpg"></a>
<b><a href="http://gmaps-utility-gis.googlecode.com/svn/trunk/agsjs/examples/extrudedlayer.html">ArcGIS Maps API Test</a></b><br>
Charlotte, U.S.<br>
by Nianwei Liu<br>
&nbsp;
</p>

<p style="display:block;height:75px;vertical-align:top;">
<a href="http://osmbuildings.ru/"><img style="width:150px;height:75px;float:left;margin-right:10px;" src="<?php echo ROOT?>/assets/images/screenshots/Moscow.jpg"></a>
<b><a href="http://osmbuildings.ru/">osmbuildings.ru</a></b><br>
Moscow, Russia<br>
by Sergey Leschina (<a href="https://twitter.com/putnik">@putnik</a>)
</p>

<p style="display:block;height:75px;vertical-align:top;">
<a href="http://tomholderness.wordpress.com/2012/12/12/3DLondon/"><img style="width:150px;height:75px;float:left;margin-right:10px;" src="<?php echo ROOT?>/assets/images/screenshots/London.jpg"></a>
<b><a href="http://tomholderness.wordpress.com/2012/12/12/3DLondon/">3D London</a></b><br>
London, UK<br>
by Tom Holderness (<a href="https://twitter.com/iHolderness ">@iHolderness</a>)
</p>

<h2>Test projects based on OSM Buildings engine</h2>

<ul>
    <li><a href="../anaglyph3d/">Anaglyph 3D mode</a> - Put your 3D glasses on! It requires more than 3x rendering effort - slow!</li>
	<li><a href="http://osmbuildings.org/indoor/">OSM Buildings indoor</a> - A quick test for turning an SVG floor plan into 3D</li>
</ul>

<?php pageFooter()?>