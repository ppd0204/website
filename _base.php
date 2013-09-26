<?php

define("ROOT", isset($root) ? $root : ".");
require_once(ROOT."/_config.php");

//*****************************************************************************

function pageHeader($title = NULL, $isFullscreen = FALSE) {
  global $config;

  $pageTitle = ($title ? "$title &laquo; " : "") . $config["site"]["title"];

  $cssFiles = implode(",", array(
    "style.css"
  ));

  $jsFiles = implode(",", array(
    "js/OSMBuildings-Leaflet.js",
    "js/util.js",
    "js/Code.js",
    "js/State.js",
    "js/Search.js",
    "js/Map.js",
    "js/Navigation.js"
   ));

  $cssClass = $isFullscreen ? "fullscreen" : "scroll";

  require_once(ROOT . "/_header.php");
}

function pageFooter() {
  global $config;
  require_once(ROOT . "/_footer.php");
}

?>