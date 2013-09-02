<?php

define("ROOT", isset($root) ? $root : ".");
require_once(ROOT."/_config.php");

//*****************************************************************************

function pageHeader($title = NULL, $isFullscreen = FALSE) {
    global $config;

    $pageTitle = ($title ? "$title &laquo; " : "").$config["site"]["title"];

    $cssFiles = implode(",", array(
        "js/leaflet-".$config["osmb"]["leaflet_version"]."/leaflet.css",
        "style.css"
    ));

    $jsFiles = implode(",", array(
        "js/leaflet-".$config["osmb"]["leaflet_version"]."/leaflet.js",
        "js/OSMBuildings-Leaflet.js",
        "js/xhr.js",
        "js/GeoSearch.js",
        "js/main.js"
    ));

    $cssClass = $isFullscreen ? "fullscreen" : "scroll";

    require_once(ROOT."/_header.php");
}

function pageFooter() {
    global $config;
    require_once(ROOT."/_footer.php");
}

?>