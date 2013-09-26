<?php
define("ROOT", "../..");
require_once(ROOT."/_config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Indoor 3D &laquo; <?=$config["site"]["title"]?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="title" content="<?=$config["site"]["title"]?>">
<meta property="description" content="<?=$config["site"]["description"]?>">
<meta property="keywords" content="<?=$config["site"]["keywords"]?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" type="image/png" href="<?=ROOT?>/favicon.png">
<script src="xyz.js"></script>
<style>
html {
  height: 100%;
}

body {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  background-color: #ffffff;
  font-family: Arial, Helvetica, sans-serif;
  line-height: 140%;
  font-size: 11pt;
  overflow: hidden;
}

.logo {
  position: absolute;
  left: 15px;
  width: 100px;
  height: 47px;
  opacity: 0.75;
  z-index: 1000; /* just for IE and for OpenLayers */
  bottom: 15px;
  border: 0;
}
</style>
</head>

<body>
<a href="<?=$config["site"]["url"]?>"><img src="<?=ROOT?>/logo.png" alt="Home" title="<?=$config["site"]["title"]?>" class="logo"></a>

<canvas id="map"></canvas>

<script>
document.addEventListener('DOMContentLoaded', function() {
  xyz.init(document.querySelector('#map'));
  xyz.load('indoor.svg');
  xyz.translate(-200, -200, 100);
  xyz.rotate(45, 0, 0);
  xyz.render();
});
</script>

<script src="<?=ROOT?>/js/piwik.js"></script>
</body>
</html>