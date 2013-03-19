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
    <?php require_once(ROOT."/assets/navigation.php")?>
</div>

<div class="content">
    <?php if ($title):?><h1><?php echo $title?></h1><?php endif?>
