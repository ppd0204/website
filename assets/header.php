<!DOCTYPE html>
<html>
<head>
<title>
<?php echo ($title ? $title.' - OSM Buildings' : 'OSM Buildings - A JavaScript library for visualizing 3D building geometry on interactive maps')?></title>
<meta property="title" content="OSM Buildings - A JavaScript library for visualizing 3D building geometry on interactive maps">
<meta property="description" content="OSM Buildings is a leightweight JavaScript library for visualizing 3D building geometry on interactive maps.">
<meta property="keywords" content="<?php
$keywords = "
OSMBuilding
OSMBuildings
OSM-Building
OSM-Buildings
OSM Building
OSM Buildings
3D Buildings
3D Building
Extruded Building
Extruded Buildings
Elevated Building
Elevated Buildings
OSM-3D
3D
Building
Buildings
Leaflet
LeafletJS
Leaflet.js
OpenLayers
Jan Marsch
Berlin
Map
Maps
Anaglyph
OSM
OpenStreetMap
OpenStreetMaps
JS
JavaScript
Library
WebGL
Example
Examples
Indoor
fly.js
FlyJS
Layer
BuildingLayer
BuildingsLayer
Footprint
Coordinates
Geometry
JSON
GeoJSON
Height
Extract
node
nodeJS
node.js
PostGIS
Geo
GPS
GIS
Visualization
Latitude
Longitude
Mercator
Projection
Panning
Zooming
API";

echo implode(", ", array_unique(explode("\n", trim($keywords))));
?>">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" type="image/png" href="<?php echo ROOT?>/assets/favicon.png">
<link rel="stylesheet" href="<?php echo ROOT?>/assets/styles.css">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.css">
<!--[if lte IE 8]><link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.ie.css" /><![endif]-->
<script src="http://cdn.leafletjs.com/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.js"></script>
<script src="<?php echo ROOT?>/js/L.BuildingsLayer.js"></script>
<script src="<?php echo ROOT?>/js/piwik.js"></script>
</head>

<body>
<div class="layout">
    <div class="header"><div class="center">
        <a href="<?php echo ROOT?>/"><img src="<?php echo ROOT?>/assets/images/logo.png" alt="Home" title="OSM Buildings - A JavaScript library for visualizing 3D building geometry on interactive maps" class="logo"></a>

        <ul class="navigation">
            <li><a href="<?php echo ROOT?>/examples.php">Examples</a></li>
            <li><a href="<?php echo ROOT?>/download.php">Download</a></li>
            <li><a href="<?php echo ROOT?>/documentation/index.html">Documentation</a></li>
            <li><a href="<?php echo ROOT?>/questions.php">Questions</a></li>
            <li><a href="javascript:UserVoice.showPopupWidget();">Feedback</a></li>
        </ul>

    </div></div>

    <div class="content"><div class="center">
        <?php if($title):?><h1><?php echo $title?></h1><?php endif?>
