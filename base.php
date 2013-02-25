<?php

define('OSMB_SIZE_MINIFIED', 9.2);
define('OSMB_SIZE_GZIPPED',  4.3);
define('OSMB_VERSION_LATEST', '0.1.7a');
define('LEAFLET_VERSION_LATEST', '0.4.5');

define('ROOT', isset($root) ? $root : '.');

function pageHeader($title = '') {
    header('Content-Type: text/html; charset=utf-8');
    require_once(ROOT.'/assets/header.php');
}

function pageFooter() {
    require_once(ROOT.'/assets/footer.php');
}

?>