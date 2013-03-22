<?php
$root = "..";
require_once("$root/base.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>OSM Buildings - Building shadows</title>
	<meta property="title" content="<?php echo SITE_TITLE?>">
	<meta property="description" content="<?php echo SITE_DESCRIPTION?>">
	<?php require_once(ROOT."/assets/keywords.php")?>
	<link rel="icon" type="image/png" href="<?php echo ROOT?>/favicon.png">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/fullscreen.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.css">
    <style>
    .datetime {
        position: relative;
        bottom: 140px;
        width: 300px;
        margin: auto;
        background-color: rgba(255,255,255,0.4);
        font-size: 10pt;
        font-family: Helvetica, Arial, sans-serif;
        padding: 10px;
    }
    .datetime label {
        display: block;
        width: 100%;
        height: 20px;
    }
    .datetime input {
        width: 100%;
        height: 30px;
        margin-bottom: 10px;
        background-color: transparent;
    }

    @media screen and (orientation: portrait) and (max-device-width: 960px) {
        .datetime {
            -webkit-transform: scale(2);
            bottom: 320px;
        }
        .datetime input {
            height: 50px;
        }
    }
    </style>
    <script src="<?php echo ROOT?>/js/Fly.js"></script>
    <script src="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.js"></script>
    <script src="<?php echo ROOT?>/js/L.BuildingsLayer.js"></script>
    <script src="<?php echo ROOT?>/js/scripts.js"></script>
</head>

<body>
    <div id="map"></div>
    <a href="http://osmbuildings.org/"><img src="<?php echo ROOT?>/logo.png" class="logo"></a>

    <div class="datetime">
        <label for="time">Time: </label>
        <input id="time" type="range" min="0" max="95">

        <label for="date">Date: </label>
        <input id="date" type="range" min="0" max="23">
    </div>

    <script>
    Fly.on('ready', function() {
        initMap();

        var timeRange = document.querySelector('#time');
        var timeRangeLabel = document.querySelector('*[for=time]');

        var dateRange = document.querySelector('#date');
        var dateRangeLabel = document.querySelector('*[for=date]');

        var date = new Date();

        var timeScale = 4,
            dateScale = 2,
            Y = date.getFullYear(),
            M = date.getMonth(),
            D = date.getDate() < 15 ? 1 : 15,
            h = date.getHours(),
            m = date.getMinutes() % 4 * 15;

        timeRange.value = h * timeScale;
        dateRange.value = M * dateScale;
        changeDate();

        function pad(v) {
            return (v < 10 ? '0' : '') + v;
        }

        function changeDate() {
            timeRangeLabel.innerText = 'Time: ' + pad(h) + ':' + pad(m);
            dateRangeLabel.innerText = 'Date: ' + Y + '-' + pad(M+1) + '-' + pad(D);
            osmb.setDate(new Date(Y, M, D, h, m));
        }

        timeRange.addEventListener('change', function () {
            h = this.value / timeScale <<0;
            m = this.value % timeScale * 15;
            changeDate();
        }, false);

        dateRange.addEventListener('change', function () {
            M = this.value / dateScale <<0;
            D = this.value % dateScale ? 15 : 1;
            changeDate();
        }, false);
    });
    </script>

	<script src="<?php echo ROOT?>/js/piwik.js"></script>
</body>
</html>