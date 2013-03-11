<?php

define("OSMB_SIZE_MINIFIED", 13.1);
define("OSMB_SIZE_GZIPPED",  5.7);
define("OSMB_VERSION_LATEST", "0.1.8a");
define("LEAFLET_VERSION_LATEST", "0.5.1");

define("INCLUDES", ROOT."/includes");

define("META_NAME", "OSM Buildings");
define("META_TITLE", "OSM Buildings - A JavaScript library for visualizing 3D building geometry on interactive maps");

$metaKeywords = "
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

define("META_KEYWORDS", implode(", ", array_unique(explode("\n", trim($metaKeywords)))));

?>