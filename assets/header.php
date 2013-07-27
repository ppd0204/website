<?php
header("Content-Type: text/html; charset=utf-8");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title><?=($title ? "$title - " : "")?><?=$config["site"]["title"]?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="title" content="<?=$config["site"]["title"]?>">
<meta property="description" content="<?=$config["site"]["description"]?>">
<meta property="keywords" content="<?=$config["site"]["keywords"]?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" type="image/png" href="favicon.png">
<link rel="stylesheet" href="js/leaflet-<?=$config["osmb"]["leaflet_version"]?>/leaflet.css">



<link rel="stylesheet" href="<?=ROOT?>/assets/styles.css">
<script src="<?=ROOT?>/js/L.BuildingsLayer.js"></script>
</head>

<body>
<div class="layout">
    <div class="header"><div class="center">
        <a href="<?=ROOT?>/"><img src="<?=ROOT?>/logo.png" alt="Home" title="<?=SITE_TITLE?>" class="logo"></a>
        <?php require_once(ROOT."/assets/navigation.php")?>
    </div></div>

    <div class="content"><div class="center">
        <?php if($title):?><h1><?=$title?></h1><?php endif?>
