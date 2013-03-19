<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Examples", "examples");
?>

<style>
ul.boxample {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.boxample li {
    margin: 0 10px 10px 0;
    padding: 15px;
    vertical-align: top;
    width: 450px;
    min-height: 105px;
    -webkit-box-shadow: 0 0 10px #999999;
    -moz-box-shadow: 0 0 10px #999999;
    -o-box-shadow: 0 0 10px #999999;
    box-shadow: 0 0 10px #999999;
}

.boxample h3 {
    margin: 0;
    text-decoration: none;
    color: #000000;
}

.boxample img {
    width: 150px;
    height: 75px;
    float: left;
    margin-right: 15px;
    border: 0;
}
</style>

<ul>
    <li><a href="Leaflet-integration.php">Leaflet integration</a> - Show how it works with layer control and attribution</li>
	<li><a href="OpenLayers-integration.php">OpenLayers integration</a> - Show how it works with layer control and attribution</li>
    <li><a href="<?php echo ROOT?>/darkside/">Building shadows</a> - These shadows are date and time dependent, according to sun position</li>
    <li><a href="Data-visualization.php">Data visualization</a> - No buildings at all: showing US census data on a map</li>
    <li><a href="Draw.php">Draw</a> - Draw polygons on the map and get them extruded</li>
    <li><a href="Styles.php">Styling</a> - Set colors for walls, roofs and stroke roofs</li>
    <li><a href="GeoJSON-load.php">GeoJSON load</a> - Show GeoJSON data from CartoDB</li>
    <li><a href="GeoJSON-set.php">GeoJSON set</a> - Put custom GeoJSON on the map</li>
</ul>

<h2>Test projects based on OSM Buildings</h2>

<ul>
    <li><a href="<?php echo ROOT?>/sketch/">Sketch style</a> - Buildings rendered like drawn by hand</li>
    <li><a href="<?php echo ROOT?>/anaglyph3d/">Anaglyph 3D mode</a> - Put your 3D glasses on! Apologies, it's not optimized yet</li>
	<li><a href="<?php echo ROOT?>/indoor/">OSM Buildings indoor</a> - A quick test for turning an SVG floor plan into 3D</li>
</ul>

<h2>Projects using OSM Buildings</h2>

<ul class="boxample">
<li><a href="http://metropolis.business-geografic.com/osmb/"><img src="<?php echo ROOT?>/assets/images/screenshots/Paris.jpg"></a>
    <h3>OSM Buildings Experiment</h3>
    Paris, France<br>
    by Fabien Nicollet (<a href="https://twitter.com/fnicollet">@fnicollet</a>)
</li>

<li><a href="http://gmaps-utility-gis.googlecode.com/svn/trunk/agsjs/examples/extrudedlayer.html"><img src="<?php echo ROOT?>/assets/images/screenshots/Charlotte.jpg"></a>
    <h3>ArcGIS Maps API Test</h3>
    Charlotte, U.S.<br>
    by Nianwei Liu<br>
</li>

<li><a href="http://osmbuildings.ru/"><img src="<?php echo ROOT?>/assets/images/screenshots/Moscow.jpg"></a>
    <h3>osmbuildings.ru</h3>
    Moscow, Russia<br>
    by Sergey Leschina (<a href="https://twitter.com/putnik">@putnik</a>)
</li>

<li><a href="http://tomholderness.wordpress.com/2012/12/12/3DLondon/"><img src="<?php echo ROOT?>/assets/images/screenshots/London.jpg"></a>
    <h3>3D London</h3>
    London, UK<br>
    by Tom Holderness (<a href="https://twitter.com/iHolderness">@iHolderness</a>)
</li>
</ul>

<?php pageFooter()?>