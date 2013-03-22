<?php
$root = "..";
require_once("$root/base.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>OSM Buildings - Sketch style</title>
	<meta property="title" content="<?php echo SITE_TITLE?>">
	<meta property="description" content="<?php echo SITE_DESCRIPTION?>">
	<?php require_once(ROOT."/assets/keywords.php")?>
	<link rel="icon" type="image/png" href="<?php echo ROOT?>/favicon.png">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="<?php echo ROOT?>/assets/fullscreen.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.css">
    <script src="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.js"></script>
    <script src="<?php echo ROOT?>/js/Fly.js"></script>
    <script src="L.BuildingsLayer-sketch.js"></script>
    <script src="<?php echo ROOT?>/js/scripts.js"></script>
</head>

<body>
    <div id="map"></div>
    <a href="http://osmbuildings.org/"><img src="<?php echo ROOT?>/logo.png" class="logo"></a>
    <script>Fly.on('ready', initMap)</script>
	<script src="<?php echo ROOT?>/js/piwik.js"></script>
</body>
</html>