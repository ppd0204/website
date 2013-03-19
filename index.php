<?php
$root = ".";
require_once("$root/base.php");

// pageHeader();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo ($title ? "$title - " : "")?><?php echo SITE_TITLE?></title>
	<meta property="title" content="<?php echo SITE_TITLE?>">
	<meta property="description" content="<?php echo SITE_DESCRIPTION?>">
	<?php require_once(ROOT."/assets/keywords.php")?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="<?php echo ROOT?>/favicon.png">
	<link rel="stylesheet" href="<?php echo ROOT?>/assets/styles.css">

	<link rel="stylesheet" href="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.css">
	<script src="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.js"></script>
	<script src="<?php echo ROOT?>/js/L.BuildingsLayer.js"></script>
</head>

<body>
    <div class="header">
        <a href="<?php echo ROOT?>/"><img src="<?php echo ROOT?>/logo.png" alt="Home" title="<?php echo SITE_TITLE?>" class="logo"></a>
        <?php $navKey = "home"?>
        <?php require_once(ROOT."/assets/navigation.php")?>
    </div>

    <div id="map" class="map"></div>

    <div class="sidebar">
        <div class="scroll">
            <h1>Welcome to OSM Buildings</h1>
            <ul class="intro">
                <li><img src="<?php echo ROOT?>/assets/images/screenshots/Berlin - Alex.jpg" onclick="mapPosition(52.52111,13.40988)">Berlin<br>Alexanderplatz</li>
                <li><img src="<?php echo ROOT?>/assets/images/screenshots/Berlin - Zoo.jpg" onclick="mapPosition(52.50440,13.33522)">Berlin<br>Zoo</li>
                <li><img src="<?php echo ROOT?>/assets/images/screenshots/Berlin - Potsdamer Platz.jpg" onclick="mapPosition(52.50983,13.37455)">Berlin<br>Potsdamer Platz</li>
                <li><img src="<?php echo ROOT?>/assets/images/screenshots/Frankfurt.jpg" onclick="mapPosition(50.11356, 8.66289)">Frankfurt<br>&nbsp;</li>
                <li><img src="<?php echo ROOT?>/assets/images/screenshots/Rostock.jpg" onclick="mapPosition(54.09047, 12.13820)">Rostock<br>&nbsp;</li>
                <li><img src="<?php echo ROOT?>/assets/images/screenshots/Bremen.jpg" onclick="mapPosition(53.07643, 8.80723)">Bremen<br>&nbsp;</li>
            </ul>

            <p>Click one of the locations above for some taller buildings. Pan the map to see the perspective effect.</p>

            <p>Map engine base is <a href="http://leafletjs.com">Leaflet</a>, map tiles are provided by <a href="http://mapbox.com">MapBox</a>.</p>

            <p>Building geometry is extracted from <a href="http://openstreetmap.org">OpenStreetMap</a> files. The examples here contain about 250k building footprints
            from Berlin and about 50k footprints from Frankfurt, Germany.</p>

            <p>OSM Buildings is using Canvas 2D operations only - <strong>this is not WebGL</strong>.<br>
            Overall size of the minified library is <?php printf("%.1Fk", OSMB_SIZE_MINIFIED)?> (<?php printf("%.1Fk", OSMB_SIZE_GZIPPED)?> gzipped).</p>
        </div>
    </div>

    <script>
    var map = new L.Map('map', { zoomControl: false }).setView([52.52111, 13.40988], 17);

    new L.TileLayer(
        'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
        {
            attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>',
            maxZoom: 17
        }
    ).addTo(map);

    new L.BuildingsLayer({ url: '<?php echo ROOT?>/server/?w={w}&n={n}&e={e}&s={s}&z={z}' }).addTo(map);

    function mapPosition(lat, lon) {
        map.setView(new L.LatLng(lat, lon), 17)
    }
    </script>

    <script src="<?php echo ROOT?>/js/piwik.js"></script>
</body>
</html>