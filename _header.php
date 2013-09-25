<!DOCTYPE html>
<html class="<?=$cssClass?>">
<head>
<title><?=$pageTitle?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="title" content="<?=$config["site"]["title"]?>">
<meta property="description" content="<?=$config["site"]["description"]?>">
<meta property="keywords" content="<?=$config["site"]["keywords"]?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" type="image/png" href="<?=ROOT?>/favicon.png">
<link rel="stylesheet" href="<?=ROOT?>/js/leaflet-<?=$config["osmb"]["leaflet_version"]?>/leaflet.css">
<link rel="stylesheet" href="<?=ROOT?>/combine.php?css=<?=$cssFiles?>">
<script src="<?=ROOT?>/js/leaflet-<?=$config["osmb"]["leaflet_version"]?>/leaflet.js"></script>
<script src="<?=ROOT?>/combine.php?js=<?=$jsFiles?>"></script>
<script>
var osmb;
document.addEventListener('DOMContentLoaded', function() {
  osmb = Map.setType('Leaflet', 'map');

  Map.onInteraction = function() {
    Navigation.hideMenu();
  };

  Search.onResult = function(item) {
    Map.setState({ lat:item.lat, lon:item.lng, zoom:15 });
	};

  Search.onInteraction = function() {
    Navigation.hideMenu();
  };

  Search.onUrlEntered = function(url) {
//    customUrl = url;
//    osmb.loadData(customUrl);
//    Map.saveState();
  };

});
</script>
</head>

<body>
<div id="map"></div>
<a href="<?=$config["site"]["url"]?>"><img src="<?=ROOT?>/logo.png" alt="Home" title="<?=$config["site"]["title"]?>" class="logo"></a>

<div class="header">
  <form><input type="search" id="search" name="search" autocorrect="off"></form>

  <img src="<?=ROOT?>/assets/options.png" id="options" alt="Options">

  <ul id="navigation">
  <li><a href="<?=ROOT?>/examples/">Examples</a></li>
  <li><a href="<?=ROOT?>/download.php">Download</a></li>
  <li><a href="<?=ROOT?>/questions.php">Questions</a></li>
  <li title="Follow @<?=$config["twitter"]["screen_name"]?> on Twitter"><a href="https://twitter.com/intent/follow?original_referer=<?=$config["site"]["url"]?>&screen_name=<?=$config["twitter"]["screen_name"]?>">Follow <img src="<?=ROOT?>/assets/twitter.png"></a></li>
  <li><a href="mailto:<?=$config["site"]["email"]?>">Email</a></li>
  <li title="Donate via PayPal"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RNF2QFZN96JA8">Donate!</a></li>
  </ul>
</div>

<div class="content">