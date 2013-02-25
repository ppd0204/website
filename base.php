<?php

define('OSMB_SIZE_MINIFIED', 11.5);
define('OSMB_SIZE_GZIPPED',  5.3);
define('OSMB_VERSION_LATEST', '0.1.8a');
define('LEAFLET_VERSION_LATEST', '0.5.1');

define('ROOT', isset($root) ? $root : '.');

function pageHeader($title = '') {
    header('Content-Type: text/html; charset=utf-8');
    require_once(ROOT.'/assets/header.php');
}

function pageFooter() {
    require_once(ROOT.'/assets/footer.php');
}

?>