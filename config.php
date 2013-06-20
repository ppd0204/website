<?php

define("OSMB_SIZE_MINIFIED", 13.1);
define("OSMB_SIZE_GZIPPED",  5.7);
define("OSMB_VERSION_LATEST", "0.1.8a");
define("LEAFLET_VERSION_LATEST", "0.5.1");

define("SITE_TITLE", "OSM Buildings");
define("SITE_DESCRIPTION", SITE_TITLE." - A JavaScript library for visualizing 3D building geometry on interactive maps");
define("SITE_URL", "http://osmbuildings.org/");
define("SITE_SHORT_URL", "http://bld.gs/");

define("GITHUB_URL", "https://github.com/kekscom/osmbuildings/");

//*** NEW CONFIG STARTS HERE **************************************************

$config = array(
    "osmb" => array(
        "size_minified" => 13.1,
        "size_gzipped" =>  5.7,
        "version" => "0.1.8a",
        "leaflet_version" => "0.5.1"
    ),
    "site" => array(
        "title" => "OSM Buildings",
        "description" => "OSM Buildings - A JavaScript library for visualizing 3D building geometry on interactive maps",
        "url" => "http://osmbuildings.org/"
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