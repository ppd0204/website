<?php

$config = array(
    "osmb" => array(
        "size_minified" => 22.5,
        "size_gzipped" =>  7.3,
        "version" => "0.1.8a",
        "leaflet_version" => "0.6.4"
    ),
    "site" => array(
        "title" => "OSM Buildings",
        "description" => "OSM Buildings - A JavaScript library for visualizing 3D building geometry on interactive maps",
        "url" => "http://osmbuildings.org/",
        "email" => "mail@osmbuildings.org"
    ),
    "twitter" => array(
        "screen_name" => "osmbuildings",
        "referrer_url" => "http://osmbuildings.org/"
    )
);

$configSiteKeywords = "
OSM Building
OSM Buildings
OSMBuilding
OSMBuildings
OSM-Building
OSM-Buildings
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
MapBox
Perspective
Polygon
Polygons
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

$config["site"]["keywords"] = implode(", ", array_unique(explode("\n", trim($configSiteKeywords))));
?>