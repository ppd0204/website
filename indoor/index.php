<?php
$root = "..";
require_once("$root/base.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>OSM Buildings - Indoor 3D</title>
	<meta property="title" content="<?php echo SITE_TITLE?>">
	<meta property="description" content="<?php echo SITE_DESCRIPTION?>">
	<?php require_once(ROOT."/assets/keywords.php")?>
	<link rel="icon" type="image/png" href="<?php echo ROOT?>/favicon.png">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/fullscreen.css">
    <script src="xyz.js"></script>
</head>

<body>
    <canvas id="map"></canvas>
    <a href="http://osmbuildings.org/"><img src="<?php echo ROOT?>/logo.png" class="logo"></a>

    <script>
    xyz.init(document.querySelector('#map'));
    xyz.load('indoor.svg');
    xyz.translate(-200, -200, 100);
    xyz.rotate(45, 0, 0);
    xyz.render();
    </script>
    <script src="<?php echo ROOT?>/js/piwik.js"></script>
</body>
</html>